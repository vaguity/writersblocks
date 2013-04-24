$(document).ready(function() {

	// Linkify JS function from <http://recurial.com/programming/javascript-snippet-replace-urls-with-hyperlinks/>
	function replaceURLWithHTMLLinks(text) {
	// this looks for urls in html and makes them links
	// I apologize in advance
		var exp = /(\b(https?|ftp):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
		return text.replace(exp, "<a href='$1'>$1</a>");
	}

	function getTweets() {

		var url = "http://api.twitter.com/1/statuses/user_timeline.json?screen_name=laureninspace&count=2&include_rts=true&exclude_replies=false&callback=?";

		$.getJSON(url, function(data) {
			$.each(data, function(i, item) {
				var tweetId = item.id_str;
				var tweetText = replaceURLWithHTMLLinks(item.text);
				var tweetRawTime = item.created_at;
				var tweetHandle = item.user.screen_name;
				var tweetTime = moment(tweetRawTime, "ddd MMM DD HH:mm:ss Z YYYY").fromNow();
				var tweetFinal = "<p class=\"tweet\">" + tweetText + "</p>\n<p class=\"tweetlink\"><a href=\"http://twitter.com/" + tweetHandle + "/status/" + tweetId + "\">" + tweetTime + "</a></p>";

				$('#twitter-feed').append(tweetFinal);

			});

		});

	}

	getTweets();

});


//var tweetPic = item.user.profile_image_url;
// "<img src=\"" + tweetPic + "\" class=\"tweetphoto\" />\n"