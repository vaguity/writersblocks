$(document).ready( function() {

	function getTallestHeight() {
		
		// get heights of #footer-left, -center, and -right


		var hLeft = $('#footer-left').height();
		var hCenter = $('#footer-center').height();
		var hRight = $('#footer-right').height();
		var minHeight = 0;

		// compare to see which is tallest

		if (hLeft >= hCenter) {
			minHeight = hLeft;
		}
		else if (hCenter >= hRight) {
			minHeight = hCenter;
		}
		else {
			minHeight = hRight;
		}

		return minHeight;
	}

	// set heights to the tallest

	$('#footer-left, #footer-center, #footer-right').css("min-height", parseInt(getTallestHeight()) + 'px');

});