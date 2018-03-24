function setHeroIdAndName(heroId, heroName) {
	document.getElementById('heroId').value = heroId;
	document.getElementById('searchHero').value = heroName;
	document.getElementById('heroName').value = heroName;
}
function displayHeroesType(type) {
	var strHeroDisplay = '';
	var agiHeroDisplay = '';
	var intHeroDisplay = '';
	var strHeroStyle = '';
	var agiHeroStyle = '';
	var intHeroStyle = '';
	if (type == 1) {
		agiHeroDisplay = 'none';
		intHeroDisplay = 'none';
		strHeroStyle = 'selected';
	} else if (type == 2) {
		strHeroDisplay = 'none';
		intHeroDisplay = 'none';
		agiHeroStyle = 'selected';
	} else if (type == 3) {
		strHeroDisplay = 'none';
		agiHeroDisplay = 'none';
		intHeroStyle = 'selected';
	}
	document.getElementById('heroType').value = type;
	document.getElementById('strHeroes').style.display = strHeroDisplay;
	document.getElementById('agiHeroes').style.display = agiHeroDisplay;
	document.getElementById('intHeroes').style.display = intHeroDisplay;
	document.getElementById('strHeroType').className = strHeroStyle;
	document.getElementById('agiHeroType').className = agiHeroStyle;
	document.getElementById('intHeroType').className = intHeroStyle;
}