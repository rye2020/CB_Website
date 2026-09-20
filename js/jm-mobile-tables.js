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
		} else {
			if (!myDiv) {
				myWrap.innerHTML = savedFilterHTML;
			}
			if (myTopDiv) myTopDiv.style.paddingLeft = '40px';
		}
	}

	updateFilterPanel(); // run once immediately

	if (screen.orientation && screen.orientation.addEventListener) {
		screen.orientation.addEventListener('change', updateFilterPanel);
	} else {
		window.addEventListener('resize', updateFilterPanel);
	}
}

// Guard against the DOMContentLoaded event having already fired
// before this script executed (happens with async/defer script loading).
if (document.readyState === 'loading') {
	document.addEventListener('DOMContentLoaded', initFilterPanel);
} else {
	initFilterPanel();
}