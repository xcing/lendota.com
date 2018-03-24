var action;

function setHeroValue(heroId) {
    switch (action) {
        case 1:
            appendHeroId('#team1Bans', heroId);
            break;
        case 2:
            appendHeroId('#team2Bans', heroId);
            break;
        case 3:
            appendHeroId('#team1Picks', heroId);
            break;
        case 4:
            appendHeroId('#team2Picks', heroId);
            break;
        case 5:
        	addHeroId('#heroId', heroId);
            break;
    }
}
function appendHeroId(inputId, heroId) {
    // choose many replay for replay dota2 
	var value = $.trim($(inputId).val());
    if (value) {
        value += ',';
    }
    $(inputId).val(value + heroId);
    $('#popupHeroId').val(value + heroId);
}
function addHeroId(inputId, heroId){
	$(inputId).val( heroId);
}
function setHeroValueImg(heroId, heroImg) {
	$('#heroId').val( heroId);
    appendHeroImg('#heroImg', heroId, heroImg);
}
function appendHeroImg(inputId, heroId, heroImg) {
	$(inputId).attr('heroId', heroId);
	$(inputId).attr('src', heroImg);
}
function popupHeroOfAction(value) {
    action = value;
    $('#heroModal').modal();
    return false;
}

$(function () {
    $('#team1BanHeroBtn').click(function () {
        $('#popupHeroId').val($('#team1Bans').val());
        return popupHeroOfAction(1);
    });
    $('#team2BanHeroBtn').click(function () {
        $('#popupHeroId').val($('#team2Bans').val());
        return popupHeroOfAction(2);
    });
    $('#team1PickHeroBtn').click(function () {
        $('#popupHeroId').val($('#team1Picks').val());
        return popupHeroOfAction(3);
    });
    $('#team2PickHeroBtn').click(function () {
        $('#popupHeroId').val($('#team2Picks').val());
        return popupHeroOfAction(4);
    });
    $('#heroBtn').click(function () {
        $('#popupHeroId').val($('#heroId').val());
        return popupHeroOfAction(5);
    });
    $('#heroBtnImg').click(function () {
        return popupHeroOfAction(6);
    });
});