//YouTube playlist player
//set video src, type and class in previewVideo modal on open  
$('#previewVideo').on('show.bs.modal', function (element) {
  var iframe = document.getElementById('previewVideo_iframe');
  //console.log('ONE ' + iframe.src);
  iframe.src = element.relatedTarget.getAttribute('data-klrn-src');
  //console.log('TWO ' + iframe.src);
  iframe.type = element.relatedTarget.getAttribute('data-klrn-type');
  iframe.className = element.relatedTarget.getAttribute('data-klrn-class');
});

function displayYouTubeVideosColSizes(data) {
  displayYouTubeVideos(data, { xs: '6', sm: '6', md: '3', lg: '3' });
}

//parse and display YouTube videos
function displayYouTubeVideos(data, col) {
  //console.log(data);
  //console.log(col);  
  var target = document.getElementById('you_tube_videos');
  var col = col || {},
      xs = col.xs || '6',
      sm = col.sm || '4',
      md = col.md || '3',
      lg = col.lg || '3';
  var i, length = data.items.length;
  var thePlayer, listID, title, thumbnail, description,
      totalSeconds, seconds, minutes, time;
  var output = '';
  for (i = 0; i < length; i++) {
    title = data.items[i].snippet.title;
    thumbnail = data.items[i].snippet.thumbnails.high.url;
    description = data.items[i].snippet.description;
    videoID = data.items[i].snippet.resourceId.videoId;

    //totalSeconds = data.items[i].media$group.yt$duration.seconds;
    //minutes = Math.floor(parseInt(totalSeconds) / 60);
    //seconds = parseInt(totalSeconds) % 60;
    //time = minutes.toString() + ':' + (seconds < 10 ? '0' : '') + seconds.toString();

    //console.log(seconds);

    output += '<div class="col-xs-' + xs + ' '
              + 'col-sm-' + sm + ' '
              + 'col-md-' + md + ' '
              + 'col-lg-' + lg + ' ' + 'add_bottom_margin">'
		            + '<a '
		              + 'data-target="#previewVideo" '
		              + 'class="btn_video" '
		              + 'data-toggle="modal" '
		              + 'data-klrn-src="http://www.youtube.com/embed/' + videoID
		              + '/?rel=0&enablejsapi=1&version=3&autohide=1&showinfo=0&html5=1" '
		              + 'data-klrn-type="text/html" '
		              + 'data-klrn-class="youtube-player">'
		              	+ '<img width="100%" height="auto" class="img-responsive" '
		              	+ 'src="http://img.youtube.com/vi/' + videoID + '/mqdefault.jpg" '
		              	+ 'alt="Coming Back Video ' + i + 1 + '" >'
		            + '</a>'
		            + '<a '
		            + 'data-target="#previewVideo" '
	              + 'class="title_video" '
		            + 'data-toggle="modal" '
		            + 'data-klrn-src="http://www.youtube.com/embed/' + videoID
		            + '/?rel=0&enablejsapi=1&version=3&autohide=1&showinfo=0&html5=1" '
		            + 'data-klrn-type="text/html" '
		            + 'data-klrn-class="youtube-player">'
		            		+ '<h4>' + title + '</h4>'
		          + '</a>'
            + '</div>';

    if ((i + 1) % (12 / +xs) === 0) { output += '<div class="clearfix visible-xs"></div>'; }
    if ((i + 1) % (12 / +sm) === 0) { output += '<div class="clearfix visible-sm"></div>'; }
    if ((i + 1) % (12 / +md) === 0) { output += '<div class="clearfix visible-md"></div>'; }
    if ((i + 1) % (12 / +lg) === 0) { output += '<div class="clearfix visible-lg"></div>'; }
  }
  target.innerHTML = output;

  setTimeout(function () {
    $("#you_tube_videos").collapse('show');
  }, 1000);

}

//IE10 viewport hack for Surface/desktop Windows 8 bug
//Copyright 2014-2015 Twitter, Inc.
//Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
//See the Getting Started docs for more information:
//http://getbootstrap.com/getting-started/#support-ie10-width
(function() {
	if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
		var msViewportStyle = document.createElement('style');
		msViewportStyle.appendChild(document.createTextNode('@-ms-viewport{width:auto!important}'));
		document.querySelector('head').appendChild(msViewportStyle);
	}
}());	

//reset video in modal on close
(function() {	
	$('.modal').on('hidden.bs.modal', function () {
	    var iframe = this.getElementsByTagName('iframe')[0];
	    if (iframe) {
	        var src = iframe.src;
	        iframe.src = '';
	        iframe.src = src;
	    }
	});
}());	