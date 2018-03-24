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
	$('#rate').val(replayRate);
});