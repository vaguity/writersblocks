$(document).ready(function() {

	function getTweets() {

		var url = "http://api.twitter.com/1/statuses/user_timeline.json?screen_name=laureninspace&count=3&include_rts=false&exclude_replies=true";

		$.getJSON(url, function(data) {

		});

	}

});