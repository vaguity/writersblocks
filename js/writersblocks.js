$(document).ready( function() {

	function getTallestHeight() {
		
		// get heights of #footer-left, -center, and -right

		var hLeft = $('#footer-left').height();
		var hCenter = $('#footer-center').height();
		var hRight = $('#footer-right').height();
		var minHeight = hLeft;

		// compare to see which is tallest; possible to do this in two conditionals?

		if (minHeight < hCenter) {
			minHeight = hCenter;
		}
		if (minHeight < hRight) {
			minHeight = hRight;
		}

		return minHeight;

	}

	// set heights to the tallest

	$('#footer-left, #footer-center, #footer-right').css("min-height", parseInt(getTallestHeight()) + 'px');
	//console.log(getTallestHeight());

});