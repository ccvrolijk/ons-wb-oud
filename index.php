<?php /*Niet meer gebruikt tot dat er weer content op de uitzending gemist pagina komt te staan
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$ug_url = 'https://onswestbrabant.nl/uitzending-gemist/';
$ug_content = file_get_contents($ug_url);
$ug_first_step = explode( '<div class="entry-content">' , $ug_content );
$ug_second_step = explode( '</div><!-- .entry-content -->' , $ug_first_step[1] );
$ug_third_step = explode( 'toggleDuration: true,' , $ug_second_step[0] );
$ug_fourth_step = explode( '</script>' , $ug_third_step[1] );
$uitzendinggemist = $ug_fourth_step[1];*/
?>
<!doctype html>
	<html>
		<head>
			<link href="/index/javascript/video-js-7.2.3/video-js.css" rel="stylesheet">
			<link href="/index/javascript/video-js-7.2.3/videojs-airplay.css" rel="stylesheet">
			<link href="/index/javascript/video-js-7.2.3/videojs-chromecast.css" rel="stylesheet">
			
		 	<title>Ons - WB</title>
		 	<link rel="apple-touch-icon" sizes="57x57" href="/index/images/favicon/apple-icon-57x57.png">
		 	<link rel="apple-touch-icon" sizes="60x60" href="/index/images/favicon/apple-icon-60x60.png">
		 	<link rel="apple-touch-icon" sizes="72x72" href="/index/images/favicon/apple-icon-72x72.png">
		 	<link rel="apple-touch-icon" sizes="76x76" href="/index/images/favicon/apple-icon-76x76.png">
		 	<link rel="apple-touch-icon" sizes="114x114" href="/index/images/favicon/apple-icon-114x114.png">
		 	<link rel="apple-touch-icon" sizes="120x120" href="/index/images/favicon/apple-icon-120x120.png">
		 	<link rel="apple-touch-icon" sizes="144x144" href="/index/images/favicon/apple-icon-144x144.png">
		 	<link rel="apple-touch-icon" sizes="152x152" href="/index/images/favicon/apple-icon-152x152.png">
		 	<link rel="apple-touch-icon" sizes="180x180" href="/index/images/favicon/apple-icon-180x180.png">
		 	<link rel="icon" type="image/png" sizes="192x192"  href="/index/images/favicon/android-icon-192x192.png">
		 	<link rel="icon" type="image/png" sizes="32x32" href="/index/images/favicon/favicon-32x32.png">
		 	<link rel="icon" type="image/png" sizes="96x96" href="/index/images/favicon/favicon-96x96.png">
			<link rel="icon" type="image/png" sizes="16x16" href="/index/images/favicon/favicon-16x16.png">
			<link rel="manifest" href="/index/images/favicon/manifest.json">
			<meta name="msapplication-TileColor" content="#ffffff">
			<meta name="msapplication-TileImage" content="/index/images/favicon/ms-icon-144x144.png">
			<meta name="theme-color" content="#ffffff">
			
		 	<script>


			function volumeSlider(player, slider) {
				document.getElementById(slider).addEventListener('input', function() {
  				document.getElementById(player).volume = this.value / 100;
				}, false);
				document.getElementById(slider).addEventListener('volumechange', function() {
				document.getElementById(player).volume = this.value / 100;
			}, false);
			}
			
			var video = document.getElementById("player");
		

				function controlPlayer(player, playPause) {
				var myAudio = document.getElementById(player);
  				var myControl = document.getElementById(playPause);
				function switchState() {
    				if (myAudio.paused == true) {
    							myAudio.play();
     							myControl.innerHTML = '';
								myControl.innerHTML = '<img class="image" src="./index/images/player/pause1.png"></img>';
								//Below :: Code makes seekbar visible when video/audio is playing ::
								//document.getElementById('seekbar').style.visibility="visible";
    							} else {
      							myAudio.pause();
     							myControl.innerHTML = '';
								myControl.innerHTML = '<img class="image" src="./index/images/player/play1.png"></img>';
								//Below :: Code makes seekbar hidden when video/audio is paused ::
								//document.getElementById('seekbar').style.visibility="hidden";
   					}
  				}
				myControl.addEventListener('click', function() {
    			switchState();
  				}, false);
  
			}

			function changeContent(source) {
			var myPlayer = document.getElementById('player');
			var myTitle = document.getElementById('title');
			var playpause = document.getElementById('playpause');
			var myLogo = document.getElementById('logo');
			myPlayer.src = source;
			if ( myPlayer.paused || myPlayer.ended || 0 < myPlayer.currentTime) {
   					playpause.innerHTML = '<img class="image" src="./index/images/player/play1.png"></img>';
				}
			}

			function load_nowplaying()
				{
					var axel = Math.random() + "";
					var num = axel * 1000000000000000000
					var client = new XMLHttpRequest();
					client.open('GET', './index/php/nowplaying/index.php');
					client.onreadystatechange = function() {
  						document.getElementById("music_now").innerHTML = client.responseText;
					}
					client.send();
				}
			/*	
			function load_uitzending_gemist()
				{
					var axel = Math.random() + "";
					var num = axel * 1000000000000000000
					var client = new XMLHttpRequest();
					client.open('GET', './index/php/uitzending-gemist/index.php');
					client.onreadystatechange = function() {
  						document.getElementById("uitzending_gemist").innerHTML = client.responseText;
					}
					client.send();
				}*/
				
			function load_nieuws(soortNieuws)
				{
					var axel = Math.random() + "";
					var num = axel * 1000000000000000000
					var client = new XMLHttpRequest();
					client.open('GET', soortNieuws);
					client.onreadystatechange = function() {
  						document.getElementById("middleR").innerHTML = client.responseText;
					}
					client.send();
				}
									
			setInterval(function(){
			if (document.visibilityState == "visible") {
					load_nieuws('./index/php/nieuws/laatste-nieuws/index.php');
					}
					},60000);
			
			setInterval(function(){
			if (document.visibilityState == "visible") {
					load_nowplaying();
					}
					},10000);
			
			window.addEventListener("load", myInit, true);
			function myInit(){
				load_nieuws('/index/php/nieuws/laatste-nieuws/index.php')
				//load_uitzending_gemist();
				load_nowplaying();
				controlPlayer('player','playpause','loadTimeOut');
				volumeSlider('player','volume');
			 };

		</script>
		 </head>
		 <body>
		 <?php //include_once("./index/analytics/analyticstracking.php") ?>

		 	<style>
				/* Global Styles */
		 		@font-face { font-family: 'Roboto'; src: url('./index/fonts/roboto.woff2') format('woff'); }
		 		html { width:100%; }
				body { overflow:scroll; font-family: Roboto, sans-serif; padding:0; margin:0; font-size:14px; height:auto; width:1802px;}
				#progress, #logo, #container, #playlist, #playlist-ul, #rightad, #playpause, #mute-img, #volume-img, #tracktime, #volume,
					.totaltime, #player, #tvplayer, #seekbar, #titleyt, #youtube, #twitter, #sitelogo, #header, .middle, #bottom, .frame, #nowonradio,
					 #uitzending_gemist, #titleug, #nieuws, #nwsA, #nwsEL, #nwsH, #nwsM #nwsZ, #nws112, #nwsS, #middleRHeader, #tvdiv, #titletv, #titletw {position:absolute; }
				/* Global Styles END */
				/* Styles for the containers */
				#header { left:0; top:0; background-color:#0e71b8; height:29px; width:1802px; border-bottom:1px solid black; }
				//.middle { height:3000px;}
				#middleL { top:30px; left:0; border-right:1px solid #076633; width:600px; height:1580px; }
				#middleR { top:50px; left:601px; width:600px; height:1560px; z-index:-1; border-right:1px solid black; }
				#middleRHeader { left:601px; top:30px; width:600px; height:20px; border-right:1px solid black; }
				.frame { top:30px; left:1202px; width:600px; height:1580px; overflow:hidden; } 
					//width:calc(100%4 - 802px)
				//.frame { display:none; }
				#bottom { top:1610px; background-color:#185c36; width:1802px; height:29px; border-top:1px solid black; }
				/* Styles for the containers END */
				#sitelogo { left:100px; top:5px; width:212px; height:52px; padding:0; }
				#container {left:10px; top:65px; height:55px; width:175px; padding:5px; border:1px solid #076633; }
				#playpause { top:5px; left:5px; }
				#mute-img {top:5px; left:30px; }
				#volume { margin:0; top:5px; left:55px; width:100px; }
				#volume-img {top:5px; right:5px; }
				#tracktime { left:5px; top:26px; height:20px; }
				.totaltime { right:10px; top:26px; height:20px; }
				#nowonradio { top:65px; left:220px; width:375px; height:100px; border:1px solid #076633; }
				#title { text-decoration:underline; margin: 3px;}
				.nowplaying, .nowplaying img { width:16px; height:16px; padding:0; margin:0; }
				#music_now {font-weight:bold; margin:3px; }
				#logo, #logo-a { left:10px; top:140px; width:200px; height:80px; padding:0; }
				.image { width:15px; height:15px; padding:3px; }
				.icecast { width:10px; height:10px; padding:0; margin:0; }
				#playlist { left:240px; top:160px; width:210px; }
				#playlist-ul { padding-left:0; }
				li { list-style-type: none; }
				#titletv { top:220px; left:15px; border:0; text-decoration:underline; }
				#titleyt { top:593px; left:15px; border:0; text-decoration:underline; }
				#titleyt a , #titletw a { color:black; }
				#youtube { top:637px; left:15px; padding:0; margin:0; width:580px; height:327px; }
				#twitter { display:block; top:995px; left:15px; height:580px; width:580px; }
				#titletw { top:964px; left:15px; border:0; text-decoration:underline; }
				/* Heeft geen content op onswestbrabant.nl #uitzending_gemist { top:1123px; left:15px; height:750px; width:580px; } */ #uitzending_gemist { display:none; }
				#titleug { top:1108px; left:15px; border:0; text-decoration:underline; }
				.alink {text-decoration:none; color:#0e71b8; }
				//#rightad { top:5px; left:415px; min-height:100px; height:auto; width:auto; }
         		iframe { display:block; width:100%; height:100%; border:0; }
         		#tvdiv { z-index:100; width:580px; height:327px; left:15px; top:265px; padding:0; }
         		#tvplayer { width:580px; height:327px; }
         		#player { display:none; }
			 	//#seekbar::-webkit-slider-runnable-track { display:none !important; }
				#progress { top:45px; left:5px; width:175px; }
				/*#seekbar { top:62px; left:5px; width:175px; margin:0; padding:0; }*/
				/* Styles voor Nieuws */
				.hNieuws { margin:6px; font-style:normal; font-weight:bold; }
				.spanNieuws { font-size:10px; margin-left:10px; }
				.pNieuws { margin: 6px 10px 14px 10px; }
				a { display:none; color:#0e71b8; }
				a.alink { display:inline; }
				a.alink:visited { color:#0e71b8; font-weight:bold; }
				.sr-only { display:none; }
				/* Styles voor Nieuws END */
				/* Styles voor Uitzending Gemist */
				a.mp3Trigger { display:inline; }
				h2 { margin:6px; font-size:16px; }
				/* Styles voor Uitzending Gemist END */
				/* Onderstaande code zorgt voor het menu in #middleRHeader */
				nav { background-color:orange; }
				nav ul { padding: 0; margin: 0; list-style: none; position: relative; }
				nav ul li { display:inline-block; background-color: orange;}
				nav a { display:block; padding:2px; color:#ffffff; text-decoration:none; vertical-align:middle; }
				nav a:hover { background-color: blue; }
			/* Hide Dropdowns by Default */
				nav ul ul { display: none; position: absolute; top: 20px; /* the height of the main nav */ }
			/* Display Dropdowns on Hover */
				nav ul li:hover > ul { display:inherit; }	
			/* First Tier Dropdown */
				nav ul ul li { width:100px; float:none; display:list-item; position: relative; }
			/* Second, Third and more Tiers	*/
				nav ul ul ul li { position: relative; top:-60px; left:100px;}
				nav li > a:after { content:  ' \2193'; }
				nav li > a:only-child:after { content: ''; }
				nav li > a:hover:only-child:after { content: ' \2192'; }
			</style>
		
		 	<div id="header">
				<audio id="player" src="/media2/index.php" metadata type="audio/mpeg"></audio>
				
		 	</div>
		 	
		 	<div id="middleL" class="middle">
		 		<img id="sitelogo" src="./index/images/logos/ons-wb-212x52.png">
		 		
				<div id="container" class="player">
		 			<span id="playpause"><img class="image" src="./index/images/player/play1.png"></span>
					<img id="mute-img" class="image" src="./index/images/player/volume_mute1.png">
					<input id="volume" type="range" min="0" max="100" step="1" value="100">
					<img id="volume-img" class="image" src="./index/images/player/volume_max1.png">
					<span id="tracktime">00:00</span> 
					<span class="totaltime" id="totaltime">00:00</span>
					<progress id="progress" value="0" min="0">
						<span id="progress-bar"></span>
					</progress>
					<!--<input type="range" id="seekbar" value="0">-->
				</div>

				<div id="nowonradio">
				<p id="title">Nu op Ons West Brabant:</p>
				<p id="music_now">De beste muziek uit Nederland en ver daar buiten</p>
				</div>
				
				<a id="logo-a" class="alink" href="http://onswestbrabant.nl" target="external">
					<img id="logo" src="/index/images/logos/onswestbrabant_logo_trans.png">
				</a>
				<div id="playlist">
		 		<ul id="playlist-ul">
		 			<li>
		 				<a class="alink" href="/index/php/streams/stats1.php"  onClick = "document.getElementById('external').src = '/index/php/streams/stats1.php?' + Date.now()'; return false" target="external">
		 					<img class="icecast" src="/index/images/logos/icecast.png">
		 				</a>
		 				<a class="alink" id="lia1">Ons West Brabant - Stream 1</a>
		 			</li>
		 			<li>
		 				<a class="alink" href="/index/php/streams/stats2.php" onClick = "document.getElementById('external').src = '/index/php/streams/stats2.php?' + Date.now()'; return false" target="external">
		 					<img class="icecast" src="/index/images/logos/icecast.png">
		 				</a>
		 				<a class="alink" id="lia2">Ons West Brabant - Stream 2</a>
		 			</li>
		 		</ul>
		 		</div>
		 		
		 		<p id="titletv">Ons West Brabant - Televisie Kanaal</p>
		 		<div id="tvdiv">
		 			<video id="tvplayer" class="video-js" preloaded="auto" controls data-setup="{}">
						<source src="https://ms2.mx-cd.net/tv/177-710139/Ons_West_Brabant.smil/playlist.m3u8" type="application/x-mpegURL">
					</video>
					<script src="/index/javascript/video-js-7.2.3/video.js"></script>
					<script src="/index/javascript/video-js-7.2.3/videojs-contrib-hls.js"></script>
					<script src="/index/javascript/video-js-7.2.3/videojs-airplay.js"></script>
					<script src="/index/javascript/video-js-7.2.3/videojs-chromecast.js"></script>
					<script>
						videojs('tvplayer', plugins: { airplayButton: {} });
					</script>
				</div>
				
		 		<p id="titleyt"><a class="alink" target="_new" href="https://www.youtube.com/channel/UCWhENtE0Z9LEXy-4oDfiBDQ/videos">Ons West Brabant - YouTube Kanaal</a></p>
		 		<div id="youtube">
		 			<iframe src="//www.youtube.com/embed/videoseries?list=UUWhENtE0Z9LEXy-4oDfiBDQ" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		 		</div>
		 		
		 		<p id="titletw"><a class="alink" target="_new" href="https://twitter.com/OnsWestBrabant">Ons West Brabant - Twitter Feed</a></p>
		 		<div id="twitter">
					<a class="twitter-timeline alink" data-lang="nl" data-width="580" data-height="580" href="https://twitter.com/OnsWestBrabant?ref_src=twsrc%5Etfw"></a>
					<script src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				</div>
				<!-- Niet meer gebruikt tot dat er weer content op de uitzending gemist pagina komt te staan
				<p id="titleug">Ons West Brabant - Uitzending Gemist</p>
				<div id="uitzending_gemist">
					<?php // echo $uitzendinggemist; ?>
				</div>-->

		 	</div>

		<div id="middleRHeader">
			<nav id="middleRHeaderNav">
				<ul>
					<li><a href="/index/php/nieuws/laatste-nieuws/index.php" onClick="load_nieuws('/index/php/nieuws/laatste-nieuws/index.php'); return false;">Nieuws</a>
						<ul>
							<li><a href="/index/php/nieuws/algemeen/index.php" onClick="load_nieuws('/index/php/nieuws/algemeen/index.php'); return false;">Algemeen</a></li>
							<li><a href="/index/php/nieuws/etten-leur/index.php" onClick="load_nieuws('/index/php/nieuws/etten-leur/index.php'); return false;">Etten - Leur</a></li>
							<li><a href="/index/php/nieuws/halderberge/index.php" onClick="load_nieuws('/index/php/nieuws/halderberge/index.php'); return false;">Halderberge</a></li>
							<li><a href="/index/php/nieuws/moerdijk/index.php" onClick="load_nieuws('/index/php/nieuws/moerdijk/index.php'); return false;">Moerdijk</a></li>
							<li><a href="/index/php/nieuws/zundert/index.php" onClick="load_nieuws('/index/php/nieuws/zundert/index.php'); return false;">Zundert</a></li>
							<li><a href="/index/php/nieuws/112/index.php" onClick="load_nieuws('/index/php/nieuws/112/index.php'); return false;">112</a></li>
							<li><a href="/index/php/nieuws/sport/index.php" onClick="load_nieuws('/index/php/nieuws/sport/index.php'); return false;">Sport</a></li>
						</ul>        
					</li>
				</ul>
			</nav>
		</div>	
		 	<div id="middleR" class="middle">
				
		 	</div>
		 	
		 	<div class="frame">
		 		<iframe name="external" id="external" src="//onswestbrabant.nl"></iframe>
		 	</div>
		 	
		 	<div id="bottom">
				<span class="copyright" style="line-height:30px;">&copy; Ons-WB, 2018 &amp; &copy; Stichting Streekomroep voor West Brabant, 2018 || Op deze website worden geen cookies misbruikt</span><span>
		 	</div>
		 	
			<script>	 
				var video = document.getElementById("player");
				document.getElementById("player").addEventListener('timeupdate', 
				function() { 
					var us = parseInt(document.getElementById("player").currentTime % 60);
					var um = parseInt((document.getElementById("player").currentTime / 60) % 60);
    				us = (us >= 10) ? us : "0" + us;
					um = (um >= 10) ? um : "0" + um;
    				document.getElementById("tracktime").innerHTML = um + ':' + us;   
					}
				);
			
				document.getElementById("player").addEventListener('timeupdate',
				function() {
					var progress = document.getElementById('progress');
					var progressBar = document.getElementById('progress-bar');
       				progress.setAttribute('max', video.duration);
        			progress.value = video.currentTime;
       				progressBar.style.width = Math.floor((video.currentTime / video.duration) * 100) + '%';
   				});
		
				//var visSeekbar = document.getElementById("seekbar").style;
				document.getElementById("player").addEventListener("loadedmetadata", 	
					function() { 
					var us = parseInt(document.getElementById("player").duration % 60);
    				var um = parseInt((document.getElementById("player").duration / 60) % 60);
    				us = us || 00 ;
    				um = um || 00 ;
    				us = (us >= 10) ? us : "0" + us;
					um = (um >= 10) ? um : "0" + um;
					var umus = um + ':' + us ;
					if ( umus == "00:00") { umus = "&nbsp;&nbsp;&nbsp;&infin;";}
					//  visSeekbar.visibility = "hidden" } else {visSeekbar.visibility = "visible"};
    				document.getElementById("totaltime").innerHTML = umus ;
 					}
				);
				
			document.getElementById("lia1").addEventListener("click", function() {
				changeContent('/media1/index.php');
				document.getElementById('player').style.display='none';
				})

			document.getElementById("lia2").addEventListener("click", function() {
				changeContent('/media2/index.php');
				document.getElementById('player').style.display='none';
				})

			var mp3Trigger = document.getElementsByClassName("mp3Trigger");
			var imT;
			for (imT = 0; imT < mp3Trigger.length; imT++) {
				mp3Trigger[imT].setAttribute("href", mp3Trigger[imT].getAttribute("value"));
			}

			/*	
				var seekBar = document.getElementById("seekbar");
				seekBar.addEventListener("change", function() {
  				var time = video.duration * (seekBar.value / 100);
 				video.currentTime = time;
				});
			
				video.addEventListener("timeupdate", function() {
 				var value = (100 / video.duration) * video.currentTime;
  				seekBar.value = value;
				});
			
				seekBar.addEventListener("mousedown", function() {
  				video.pause();
				});

				seekBar.addEventListener("mouseup", function() {
 				video.play();
				});
			*/
			/*
			video.addEventListener('dblclick', function(){ 
				 if (video.requestFullscreen) {
                        video.requestFullscreen();
                    }
                    else if (video.msRequestFullscreen) {
                        video.msRequestFullscreen();
                    }
                    else if (video.mozRequestFullScreen) {
                        video.mozRequestFullScreen();
                    }
                    else if (video.webkitRequestFullScreen) {
                        video.webkitRequestFullScreen();
                    }
			});
			*/
	/*
				var musicNow = document.getElementById("music_now");
				var nowPlaying = document.getElementById("now_playing");
				var currentlyPlayingSong = nowPlaying.innerText;
				function searchCurrentlyPlaying() {
					var currentlyPlayingSong = nowPlaying.innerText;
					//nowPlaying.style.display="none";
					musicNow.innerHTML = '<a id="now_playing" href="https://duckduckgo.com/?q=' + currentlyPlayingSong + '">' + currentlyPlayingSong + '</a>';
  				};
*/
		</script>

	</body>
<html>
