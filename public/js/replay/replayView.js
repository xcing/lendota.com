var rowToggle = true;

function toggleDisplayRow(id) {
    if (!this.rowToggle) return;
    
    if (document.getElementById(id).style.display == 'none') {
        document.getElementById(id).style.display = 'block';
        document.getElementById('ih_'+id).innerHTML = 'Hide';
    } else {
        document.getElementById(id).style.display = 'none';
        document.getElementById('ih_'+id).innerHTML = 'Detail';
    }    
}

function toggleDisplay(id) {
    if (document.getElementById(id).style.display == 'none') {
        document.getElementById(id).style.display = 'block';
        document.getElementById('ih_'+id).innerHTML = 'Hide';
    } else {
        document.getElementById(id).style.display = 'none';
        document.getElementById('ih_'+id).innerHTML = 'Detail';
    }    
}

function toggleRowLink( bool ) {
    this.rowToggle = bool;  
}

function toggleDisplayedExtra(id, pid) {
    if (document.getElementById(id).style.display == 'none') {
        document.getElementById('player'+pid+'_skills').style.display = 'none';
        document.getElementById('player'+pid+'_items').style.display = 'none';
        document.getElementById('player'+pid+'_actions').style.display = 'none';

        document.getElementById(id).style.display = 'block';     
    }    
}

function fitToContent(id, maxHeight) {
   var text = id && id.style ? id : document.getElementById(id);
   if ( !text )
      return;

   var adjustedHeight = text.clientHeight;
   if ( !maxHeight || maxHeight > adjustedHeight )
   {
      adjustedHeight = Math.max(text.scrollHeight, adjustedHeight);
      if ( maxHeight )
         adjustedHeight = Math.min(maxHeight, adjustedHeight);
      if ( adjustedHeight > text.clientHeight )
         text.style.height = adjustedHeight + "px";
   }
}

function confirmDeleteReplay(url) {
	if (confirm('ต้องการลบ replay นี้หรือไม่')) {
		document.location=url; 
	}
	return false;
}

function editReplay() {
	if ($('#editReplayBtn').val() == 'Edit Replay') {
		$('#editReplayDiv').slideDown();
		$('#editReplayBtn').val('Cancel Edit');
	} else {
		$('#editReplayDiv').slideUp();
		$('#editReplayBtn').val('Edit Replay');
	}
}

$(function () {
    $("a.reveal").show();
    $("a.reveal").click(function(){
        $(this).fadeOut(600);
        $(this).next().fadeIn(2500);
    });
    
	$('#loadingIcon').hide();
	$('#viewScoreBoardBtn').css('visibility', 'visible');
	$('#rate').val(replayRate);
	if (winner == $('#sentinelTeamName').val()) {
		$('#replay_winner').val('Sentinel');
	} else if (winner == $('#scourgeTeamName').val()) {
		$('#replay_winner').val('Scourge');
	}
	fitToContent('replayDesc', document.documentElement.clientHeight);
	
	$('#viewScoreBoardBtn').click(function() {
		if (this.value == 'กดเพื่อดู Score') {
			$('#scoreBoard').slideDown();
			this.value = 'กดเพื่อซ่อน Score';
		} else if (this.value == 'กดเพื่อซ่อน Score') {
			$('#scoreBoard').slideUp();
			this.value = 'กดเพื่อดู Score';
		} else if (this.value == 'View Scoreboard') {
			$('#scoreBoard').slideDown();
			this.value = 'Hide Scoreboard';
		} else if (this.value == 'Hide Scoreboard') {
			$('#scoreBoard').slideUp();
			this.value = 'View Scoreboard';
		}
	});
});