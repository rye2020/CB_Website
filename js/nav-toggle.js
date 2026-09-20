document.addEventListener('DOMContentLoaded', function () {
	var access = document.getElementById('access');
	var toggle = access ? access.querySelector('.nav-toggle') : null;

	if (!access || !toggle) {
		return;
	}

	// Main hamburger: show/hide the whole menu
	toggle.addEventListener('click', function () {
		var isOpen = access.classList.toggle('nav-open');
		toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
		document.body.classList.toggle('nav-menu-open', isOpen);
	});

	// Items with children: on small screens, first tap opens the submenu
	// instead of following the '#' link. Tapping again (or tapping a real
	// link inside) navigates normally.
	var parentLinks = access.querySelectorAll('li.menu-item-has-children > a');

	parentLinks.forEach(function (link) {
		link.addEventListener('click', function (e) {
			// Only intercept on small screens where the menu is collapsed
			if (window.innerWidth > 781) {
				return;
			}

			var parentLi = link.parentElement;
			var isOpen = parentLi.classList.contains('submenu-open');

			// Close sibling open submenus at the same level for a cleaner accordion
			var siblings = Array.prototype.filter.call(
				parentLi.parentElement.children,
				function (el) { return el !== parentLi; }
			);
			siblings.forEach(function (sib) {
				sib.classList.remove('submenu-open');
			});

			if (!isOpen) {
				e.preventDefault();
				parentLi.classList.add('submenu-open');
			} else if (link.getAttribute('href') === '#') {
				// Placeholder links with no real destination: just close it back up
				e.preventDefault();
				parentLi.classList.remove('submenu-open');
			}
			// If it's already open and has a real href, let the click through
		});
	});
});
