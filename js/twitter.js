$(document).ready(function() {

	function getTweets() {

		var url = "http://api.twitter.com/1/statuses/user_timeline.json?screen_name=laureninspace&count=3&include_rts=false&exclude_replies=true&callback=?";

		$.getJSON(url, function(data) {
			$.each(data, function(i, item) {
				var tweetId = item.id_str;
				var tweetText = item.text;
				var tweetRawTime = item.created_at;
				var tweetHandle = item.user.screen_name;
				var tweetPic = item.user.profile_image_url;
				var tweetTime = moment(tweetRawTime, "ddd MMM DD HH:mm:ss Z YYYY").fromNow();
				console.log(tweetText, tweetHandle, tweetPic);
				console.log(tweetTime);
				$('#twitter-feed').append(
					"<img src=\"" + tweetPic + "\" class=\"tweetphoto\" />\n<p class=\"tweet\">" + tweetText + "</p>\n<p class=\"tweetlink\"><a href=\"http://twitter.com/" + tweetHandle + "/status/" + tweetId + "\">" + tweetTime + "</a></p>"
				);

			});

		});

	}

	getTweets();

});