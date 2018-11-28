<?php $subtitle = $_GET['subtitle'];
$link = $_GET['id'];?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>player</title>
		<script src="./resources/js/subtitles-octopus.js"></script>>
		<style type="text/css">
		html, body {
			margin: 0;
			padding: 0;
		}
		#video {
			position: absolute;
			width: 100% !important;
			height: 100% !important;
		}
		</style>
	</head>
	<body>
		<video id="video" class="video-js" controls preload="auto" width="840" height="460" data-setup="{}">
            <source src="https://www.googleapis.com/drive/v3/files/<?php echo $link?>?alt=media&key=AIzaSyD739-eb6NzS_KbVJq1K8ZAxnrMfkIqPyw" type='video/mp4'>
            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a web browser that
                <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
            </p>
        </video>


        <link href="https://vjs.zencdn.net/7.0.5/video-js.css" rel="stylesheet">
        <script src="https://vjs.zencdn.net/7.0.5/video.js"></script>

        <script>
            var player = videojs('#video');
            player.ready(function () {
                // This would look more nice as a plugin but is's just as showcase of using with custom players
                var video = this.tech_.el_;
                window.SubtitlesOctopusOnLoad = function () {
                    var options = {
                        video: video,
                        subUrl: '<?php echo $subtitle?>',
                        fonts: ['/gdplayer/resources/fonts/Arial.ttf', '/gdplayer/resources/fonts/TimesNewRoman.ttf'],
                        //onReady: onReadyFunction,
                        debug: true,
                        workerUrl: '/gdplayer/resources/js/subtitles-octopus-worker.js'
                    };
                    window.octopusInstance = new SubtitlesOctopus(options); // You can experiment in console
                };
                if (SubtitlesOctopus) {
                    SubtitlesOctopusOnLoad();
                }
            });
        </script>
        </body>
</html>
<?php
exit;
?>