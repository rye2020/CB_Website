    //----------------- Responsive tables---------------------------->
	// Detect mobile device and change to single column

	screen.orientation.addEventListener('change', jmInsert);

function jmInsert() {
	var myWrap = document.getElementById('jmWrap');
	if (myWrap !== null) {
		var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
		var myDiv = document.getElementById('jm-filter');
		var myTopDiv = document.getElementById('top');
		let orientationType = screen.orientation.type; // e.g., "portrait-primary", "landscape-secondary"
		if (isMobile) {
			if (orientationType.includes("portrait")) {
				if (myDiv !== null) {myDiv.remove();}
				myTopDiv.style.paddingLeft = "10px";
			} else {
				if (!myDiv) {
					myTopDiv.style.paddingLeft = "40px";
					myWrap.innerHTML = `
<div id="jm-filter" style="width:250px; ">
	<br><br><br><br>
<?php include ( get_stylesheet_directory() . '/includes/FilterAGGform.php'); ?>
<?php include ( get_stylesheet_directory() . '/includes/RecentPosts_inc.php');?>
</div>
`;
				}
			}
		}
	};
}

$(document).ready(function () {
	// Initialize DataTable
	var table = $('#tbl-table').DataTable({
		// Your DataTable options here
		paging: true,
		searching: true
	});

	// Fires once when DataTable is fully initialized
	table.on('init.dt', function () {
		alert("✅ DataTable initialization complete.");
		// Place your code here that must run after table is ready
		var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
		var myDiv = document.getElementById('jm-filter');
		var myTopDiv = document.getElementById('top');
		var tbHead = document.querySelector('.t1CanadianCBD');
		const jmWidth = window.innerWidth;

		alert("width: " + jmWidth + "");
		alert("isMobile: " + isMobile + "");
		alert("Size: " + (jmWidth < 768) + "");
		alert(myDiv);
		alert(myTopDiv);
		alert(tbHead);
		if (isMobile && (jmWidth < 768)) {
			if (myDiv !== null) {myDiv.remove();}         // Remove filters and recent posts
			myTopDiv.style.paddingLeft = "10px";
			tbHead.style.width = "100%";
			alert(jmWidth);
		}
		if (isMobile) {
			tbHead.style.width = "100%";
			alert(jmWidth);
		}
})
})
