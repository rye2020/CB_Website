// Responsive filter panel: show on mobile landscape, hide on mobile portrait
function initFilterPanel() {
	var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
	var myWrap = document.getElementById('jmWrap');
	var myTopDiv = document.getElementById('top');

	if (!myWrap || !isMobile) return; // nothing to do on desktop or if wrapper is missing

	// Save the server-rendered filter HTML once, before we ever remove it.
	var savedFilterHTML = myWrap.innerHTML;

	function getOrientation() {
		if (screen.orientation && screen.orientation.type) {
			return screen.orientation.type; // "portrait-primary", "landscape-secondary", etc.
		}
		return window.matchMedia('(orientation: portrait)').matches ? 'portrait' : 'landscape';
	}

	function updateFilterPanel() {
		var myDiv = document.getElementById('jmfilter');
		var isPortrait = getOrientation().includes('portrait');

		if (isPortrait) {
			if (myDiv) {
				myDiv.remove();
			}
			if (myTopDiv) myTopDiv.style.paddingLeft = '10px';
			if (myTopDiv) myTopDiv.classList.remove('jm-align-menu');  // (Claude)
		} else {
			if (!myDiv) {
				myWrap.innerHTML = savedFilterHTML;
			}
			if (myTopDiv) alignTopToMenu();  // (Claude) was paddingLeft = '40px'
		}
	}

	// Left-align the table with the first word of the menu (Claude)
	function alignTopToMenu() {                                                      // (Claude)
		var link = document.querySelector('#access ul.menu > li:first-child > a');  // (Claude)
		myTopDiv.classList.add('jm-align-menu');  /* drop auto-margin centering */   // (Claude)
		myTopDiv.style.paddingLeft = '0px';                                          // (Claude)
		if (!link) { myTopDiv.style.paddingLeft = '10px'; return; }                  // (Claude)
		var textLeft = link.getBoundingClientRect().left +                           // (Claude)
			parseFloat(getComputedStyle(link).paddingLeft || 0);                     // (Claude)
		var offset = textLeft - myTopDiv.getBoundingClientRect().left;               // (Claude)
		myTopDiv.style.paddingLeft = Math.max(0, Math.round(offset)) + 'px';         // (Claude)
	}                                                                                // (Claude)

	// Re-run after the browser finishes laying out the new orientation (Claude)
	function onOrientationChange() {                // (Claude)
		updateFilterPanel();                         // (Claude)
		setTimeout(updateFilterPanel, 250);          // (Claude)
	}                                                // (Claude)

	updateFilterPanel(); // run once immediately

	if (screen.orientation && screen.orientation.addEventListener) {
		screen.orientation.addEventListener('change', onOrientationChange);  // (Claude)
	} else {
		window.addEventListener('resize', onOrientationChange);  // (Claude)
	}
}

// Guard against the DOMContentLoaded event having already fired
// before this script executed (happens with async/defer script loading).
if (document.readyState === 'loading') {
	document.addEventListener('DOMContentLoaded', initFilterPanel);
} else {
	initFilterPanel();
}