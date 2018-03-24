<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Service_TournamentService
{
    const SINGLE_ELIMINATION = 1;
    const TEAM_1_WIN = 1;
    const TEAM_2_WIN = 2;
    
    public function generateTournamentBracket($tournamentId)
    {
        $teams = $this->findTeamInTournament($tournamentId);
        $teamAmount = count($teams);
        if ($teamAmount == 0) {
            return;
        }
        $tournament = $this->findTournament($tournamentId);
        if ($tournament->getType() == self::SINGLE_ELIMINATION) {
            $roundAmount = $this->findRoundAmount($teamAmount);
            $this->createMatchesForTournament($tournament, $roundAmount, $teams);
            $this->updateTournamentRoundAmount($tournament, $roundAmount);
			
			$this->generateRoundSchedule($tournament, $roundAmount);
        }
    }
    
    public function readTournamentData($tournamentId, $tournament)
    {
        $teams = $this->findTeamInTournament($tournamentId);
        $teamIdNameMap = $this->createTeamIdNameMap($teams);
        $matches = $this->findMatchesInTournament($tournamentId);
        
        $tournamentBracket = new Application_Model_Dto_TournamentBracket();
        if ($tournament->getType() == self::SINGLE_ELIMINATION) {
            $versusTeams = $this->getVersusTeamNames($matches, $teamIdNameMap);
            $results = $this->getTournamentResults($matches, $tournament);

			$tournamentBracket->setName($tournament->getName());
            $tournamentBracket->setTeams($versusTeams);
            $tournamentBracket->setResults($results);
            $tournamentBracket->setGameAmount($tournament->getGameAmount());
            $tournamentBracket->setFinalGameAmount($tournament->getFinalGameAmount());
			$tournamentBracket->setThirdPlaceFlag($tournament->getThirdPlace());
        }
        return $tournamentBracket;
    }
    
    private function findTeamInTournament($tournamentId)
    {
        $teamMapper = new Application_Model_TeamMapper();
        return $teamMapper->findTeamInTournament($tournamentId);
    }
    
    public function findTournament($tournamentId)
    {
        $tournamentMapper = new Application_Model_TournamentMapper();
        return $tournamentMapper->find($tournamentId);
    }
    
    private function findRoundAmount($teamAmount)
    {
        return ceil(log($teamAmount, 2));
    }
    
    private function findFirstRoundMatchesAmount($roundAmount)
    {
        return pow(2, $roundAmount) / 2;
    }
    
    private function createMatchesPerRound($tournamentId, $matchAmount, $round)
    {
        $matches = array();
        for ($i = 1; $i <= $matchAmount; $i++) {
            $match = new Application_Model_Match();
            $match->setRound($round);
            $match->setTournamentId($tournamentId);
            $match->setOrdinal($i);
            $match->setTeamSide(mt_rand(1, 2));
            
            $matches[] = $match;
        }
        return $matches;
    }
    
    private function createMatchesOtherRound(Application_Model_Tournament $tournament, $firstRoundMatchAmount, $roundAmount)
    {
        $matches = array();
        $matchAmount = $firstRoundMatchAmount;
        for ($round = 2; $round <= $roundAmount; $round++) {
            $matchAmount /= 2;
			if ($tournament->getThirdPlace() == 1 && $matchAmount == 1) {
				// for creating third place match
				$matchAmount++;
			}
            $matchesPerRound = $this->createMatchesPerRound($tournament->getTournamentId(), $matchAmount, $round);
            $matches = array_merge($matches, $matchesPerRound);
        }
        return $matches;
    }
    
    private function putTeamIntoFirstRoundMatches($teams, $firstRoundMatches)
    {
        shuffle($teams);
        $this->putTeam1($teams, $firstRoundMatches);
        $this->putTeam2($teams, $firstRoundMatches);
    }
    
    private function putTeam1(&$teams, $firstRoundMatches)
    {
        foreach ($firstRoundMatches as $match) {
            $team = array_pop($teams);
            $match->setTeam1Id($team->getId());
        }
    }
    
    private function putTeam2($teams, $firstRoundMatches)
    {
        foreach ($firstRoundMatches as $match) {
            if (count($teams) > 0) {
                $team = array_pop($teams);
                $match->setTeam2Id($team->getId());
            } else {
                $match->setResult(self::TEAM_1_WIN);
            }
        }
    }
    
    private function createMatchesForTournament(Application_Model_Tournament $tournament, $roundAmount, $teams)
    {
        $firstRoundMatchAmount = $this->findFirstRoundMatchesAmount($roundAmount);
        $firstRoundMatches = $this->createMatchesPerRound($tournament->getTournamentId(), $firstRoundMatchAmount, 1);
        $this->putTeamIntoFirstRoundMatches($teams, $firstRoundMatches);
        $allMatches = $this->createMatchesOtherRound($tournament, $firstRoundMatchAmount, $roundAmount);
        $allMatches = array_merge($firstRoundMatches, $allMatches);
        
        $this->saveMatchesAndUpdateParentId($allMatches);
    }
    
    private function saveMatchesAndUpdateParentId($allMatches)
    {
        $matchMapper = new Application_Model_MatchMapper();
        $matchMapper->saveAll($allMatches);
        
        $this->setMatchesParentId($allMatches);
        $this->setTeamWinByeToNextRound($allMatches);
        $matchMapper->saveAll($allMatches);
    }
    
    private function setMatchesParentId($allMatches)
    {
        $lastMatch = array_pop($allMatches);
        $parentId = $lastMatch->getMatchId();
        $nextRoundParentIds = array();
        $parentIdUsedCount = 0;
        $childAmountPerParent = 2;
        
        for ($i = count($allMatches) - 1; $i >= 0; $i--) {
            $parentIdUsedCount++;
            $nextRoundParentIds[] = $allMatches[$i]->getMatchId();
            if ($parentIdUsedCount > $childAmountPerParent) {
                $parentId = array_shift($nextRoundParentIds);
                $parentIdUsedCount = 1;
            }
            $allMatches[$i]->setParentId($parentId);
        }
    }
    
    private function setTeamWinByeToNextRound($allMatches)
    {
        $winByeMatches = array();
        foreach ($allMatches as $match) {
            if ($match->getRound() == 1 && $match->getTeam2Id() == null) {
                $winByeMatches[] = $match;
            } else if ($match->getRound() == 2 && count($winByeMatches) > 0) {
                for ($i = 0; $i < 2; $i++) {
                    if (count($winByeMatches) > 0 && $match->getMatchId() == $winByeMatches[0]->getParentId()) {
                        $winByeMatch = array_shift($winByeMatches);
                        if ($winByeMatch->getOrdinal() % 2 == 0) {
                            $match->setTeam2Id($winByeMatch->getTeam1Id());
                        } else {
                            $match->setTeam1Id($winByeMatch->getTeam1Id());
                        }
                    }
                }
            } else if ($match->getRound() > 2) {
                break;
            }
        }
    }
    
    private function updateTournamentRoundAmount($tournament, $roundAmount)
    {
        $tournament->setRoundAmount($roundAmount);
        $tournamentMapper = new Application_Model_TournamentMapper();
        $tournamentMapper->save($tournament);
    }
    
    private function findMatchesInTournament($tournamentId)
    {
        $matchMapper = new Application_Model_MatchMapper();
        return $matchMapper->findMatchesInTournament($tournamentId);
    }
    
    private function createTeamIdNameMap($teams)
    {
        $idNameMap = array();
        foreach ($teams as $team) {
            $idNameMap[$team->getId()] = $team->getShortName();
        }
        return $idNameMap;
    }
    
    private function getVersusTeamNames($matches, $teamIdNameMap)
    {
        $versusTeams = array();
        foreach ($matches as $match) {
            if ($match->getRound() == 1) {
                $versusTeam = array();
                $versusTeam[] = $teamIdNameMap[$match->getTeam1Id()];
                if ($match->getTeam2Id()) {
                    $versusTeam[] = $teamIdNameMap[$match->getTeam2Id()];
                } else {
                    $versusTeam[] = '-';
                }
                $versusTeams[] = $versusTeam;
            } else {
                break;
            }
        }
        return $versusTeams;
    }
    
    private function getTournamentResults($matches, $tournament)
    {
        $results = array();
        $roundResults = array();
        $previousRound = 0;
        foreach ($matches as $match) {
            if ($previousRound != $match->getRound()) {
                $roundResults = array();
                $previousRound = $match->getRound();
            } else {
                $roundResults = array_pop($results);
            }
            $matchResult = $this->getMatchScore($match, $tournament);
            $roundResults[] = $matchResult;
            $results[] = $roundResults;
        }
        return $results;
    }
    
    private function getMatchScore(Application_Model_Match $match, $tournament)
    {
        $matchScore = null;
        $matchResults = $match->getMatchResults();
        if ($match->getRound() == 1 && !$match->getTeam2Id()) {
            $winScore = ceil($tournament->getGameAmount() / 2);
            $matchScore = array($winScore, 0);
        } else if ($matchResults) {
            $team1Score = 0;
            $team2Score = 0;
            foreach ($matchResults as $matchResult) {
                if ($matchResult->getResult() == self::TEAM_1_WIN) {
                    $team1Score++;
                } else if ($matchResult->getResult() == self::TEAM_2_WIN) {
                    $team2Score++;
                }
            }
            $matchScore = array($team1Score, $team2Score);
        } else {
            $matchScore = array(0, 0);
        }
        
        if ($match->getTeam1Id() && $match->getTeam2Id()) {
            $matchScore[] = '/tournament/match/matchId/' . $match->getMatchId();
            if ($match->getRound() == $tournament->getRoundAmount() && $match->getOrdinal() == 1) {
                $matchScore[] = 'final';
            }
        }
        return $matchScore;
    }
	
	public function getRoundSchedules($tournamentId)
	{
		$roundScheduleMapper = new Application_Model_RoundScheduleMapper();
		return $roundScheduleMapper->findRoundsInTour($tournamentId);
	}
	
	private function generateRoundSchedule(Application_Model_Tournament $tournament, $roundAmount)
	{
		$rounds = array();
		$raceDate = date('Y-m-d H:i:s', strtotime($tournament->getStartDate() . ' 20:00:00'));
		for ($roundNo = 1; $roundNo <= $roundAmount; $roundNo++) {
			$roundSchedule = new Application_Model_RoundSchedule();
			$roundSchedule->setTournamentId($tournament->getTournamentId());
			$roundSchedule->setRound($roundNo);
			$roundSchedule->setDate($raceDate);
			$raceDate = date('Y-m-d H:i:s', strtotime($raceDate . '+1 days'));
			$rounds[] = $roundSchedule;
		}
		$roundScheduleMapper = new Application_Model_RoundScheduleMapper();
		$roundScheduleMapper->saveAll($rounds);
	}
	
	public function findRoundSchedule($tournamentId, $round)
	{
		$roundScheduleMapper = new Application_Model_RoundScheduleMapper();
		return $roundScheduleMapper->findRoundSchedule($tournamentId, $round);
	}
}