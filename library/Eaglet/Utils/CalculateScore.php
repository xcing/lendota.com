<?php
class Eaglet_Utils_CalculateScore
{
	public static function getScoreWinAndLose($scoreTeam1, $scoreTeam2)
	{
		if($scoreTeam1 > $scoreTeam2){
			$dif = round(1000/($scoreTeam1-$scoreTeam2));
			if($dif < 5){
				$dif = 5;
			}
			if($dif > 10){
				$dif = 10;
			}
			$dif1Win = $dif;
			$dif2Lose = $dif;
			
			$dif = round(($scoreTeam1-$scoreTeam2)/5);
			if($dif < 10){
				$dif = 10;
			}
			if($dif > 80){
				$dif = 80;
			}
			$dif1Lose = $dif;
			$dif2Win = $dif;
		}
		else if($scoreTeam2 > $scoreTeam1){
			$dif = round(1000/($scoreTeam2-$scoreTeam1));
			if($dif < 5){
				$dif = 5;
			}
			if($dif > 10){
				$dif = 10;
			}
			$dif2Win = $dif;
			$dif1Lose = $dif;
			
			$dif = round(($scoreTeam2-$scoreTeam1)/5);
			if($dif < 10){
				$dif = 10;
			}
			if($dif > 80){
				$dif = 80;
			}
			$dif2Lose = $dif;
			$dif1Win = $dif;
		}
		else{
			$dif = 10;
			$dif1Win = $dif;
			$dif2Lose = $dif;
			$dif1Lose = $dif;
			$dif2Win = $dif;
		}
		$dif = array(
				'dif1win' => $dif1Win,
				'dif1lose' => $dif1Lose,
				'dif2win' => $dif2Win,
				'dif2lose' => $dif2Lose
				);
		return $dif;
	}
	public static function getResultScore($scoreTeamWin, $scoreTeamLose, $isCancel = false)
	{
		if($scoreTeamWin > $scoreTeamLose){
			$dif = round(1000/($scoreTeamWin-$scoreTeamLose));
			if($dif < 5){
				$dif = 5;
			}
			if($dif > 10){
				$dif = 10;
			}
			$difWinPlus = $dif;
			$difLoseMinus = $dif;
		}
		else if($scoreTeamLose > $scoreTeamWin){
			$dif = round(($scoreTeamLose-$scoreTeamWin)/5);
			if($dif < 10){
				$dif = 10;
			}
			if($dif > 80){
				$dif = 80;
			}
			$difWinPlus = $dif;
			$difLoseMinus = $dif;
		}
		else{
			$dif = 10;
			$difWinPlus = $dif;
			$difLoseMinus = $dif;
		}
		if(!$isCancel){
			$scoreTeamWin += $difWinPlus;
			$scoreTeamLose -= $difLoseMinus;
		}
		else{
			$scoreTeamWin -= $difWinPlus;
			$scoreTeamLose += $difLoseMinus;
		}
		if($scoreTeamLose < 800){
			$scoreTeamLose = 800;
		}
		$score = array(
				'scoreTeamWin' => $scoreTeamWin,
				'scoreTeamLose' => $scoreTeamLose
		);
		return $score;
	}
}
?>