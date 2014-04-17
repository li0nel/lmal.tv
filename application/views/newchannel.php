<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
	<title><?php echo ucfirst($title);?></title>
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:url" content="lmal.tv/<?php echo $channel;?>">
	<meta name="twitter:domain" content="lmal.tv">
	<meta name="twitter:site" content="@lamachinealiver">
	<meta name="twitter:title" content="<?php echo ucfirst($title);?>">
	<meta name="twitter:description" content="<?php echo ucfirst($description);?>">
	<meta name="twitter:creator" content="@lamachinealiver">
	<meta name="twitter:image:src" content="<?php echo $poster;?>">
	<meta name="twitter:app:name:iphone" content="">
	<meta name="twitter:app:name:ipad" content="">
	<meta name="twitter:app:name:googleplay" content="">
	<meta name="twitter:app:url:iphone" content="">
	<meta name="twitter:app:url:ipad" content="">
	<meta name="twitter:app:url:googleplay" content="">
	<meta name="twitter:app:id:iphone" content="">
	<meta name="twitter:app:id:ipad" content="">
	<meta name="twitter:app:id:googleplay" content="">
	<meta name="keywords" content="conférence, direct, live, live streaming, retransmission, congrès, invitation privée, conférence payante, captation professionnelle, captation multicaméras, multi-caméras" />
	<meta name="author" content="La Machine A Liver">
	<meta name="robots" content="index, follow" />
	<meta name="revisit-after" content="7 days" />

    <!-- Le styles -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/style.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/font-awesome.min.css');?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/bootstrap/js/jquery.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
    <script src="<?php echo base_url('jwplayer/rJzmMi1pEeKBVyIACp8kUw.js');?>"></script>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src=".assets/js/html5shiv.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico');?>">    <!-- Fav and touch icons -->
</head>
<body screen_capture_injected="true" class="bridges" id="product_page">
	<div class="color-bar"></div>
	<div class="channelcontainer">
		<div id="sharing" >
			<a href="https://twitter.com/share" class="twitter-share-button" data-lang="fr">Tweeter</a>
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url($channel);?>" target="_blank" class="facebook_share button button-social-facebook button-w-i button-plain button-small" data-description="" data-message="Shared!" data-name="" data-preview="" data-url="">
				<i class="icon-facebook"></i>Partager
			</a>
		</div>
		<div id="channel_login">
			<span>Vous êtes le propriétaire de cette page?</span>
			<a href="<?php echo base_url('login');?>">Connectez-vous</a>
		</div>
		<div class="relative">
			<div class="product">
				<div class="product-main">
					<div id="containerjw" style="display: none;"></div>
					<div id="poster">
						<div id="image-preview-container">
							<img src="<?php echo $poster;?>">
						</div>
					</div>
					<div class="product-information two-column">
						<h2 class="product-price" style="right:0px">
							<div class="channelstatus">
								<i class="countdown">...</i>
							</div>
						</h2>
						<div class="product-content">
							<div class="description-container">
								<h1><?php echo $title;?></h1>
								<blockquote class="product-description">
									<p><?php echo $description;?></p>
								</blockquote>
							</div>
							<div class="want-container">
								<button class="button" disabled="disabled" style="width:100%">Accès gratuit</button>
								<div class="product-info">
									<h4>
										Vous aurez l'accès complet à cette diffusion en HD, sur tout ordinateur ou tablette.
									</h4>
									<ul>
										<li><span>Date</span> <strong><p><?php if ($date=='') echo 'pas de date prévue'; else echo $date;?></p></strong></li>
										<li><span>Heure</span> <strong><p><?php if ($hour=='') echo 'pas d\'heure prévue'; else echo $hour;?></p></strong></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- product main -->
				<div class="seller-main">
					<span id="seller-arrow"></span>
					<div style="position:relative">
						<img alt="Profile picture" id="profile_picture" src="<?php echo $picture;?>">
					</div>
					<h2><?php echo $ownername;?></h2>
					<div id="bio">
						<p><?php echo $ownerbio;?></p>
					</div>
				</div>
			</div>
			<div id="powered-by-footer">
				<a href="<?php echo base_url('terms');?>" class="security-link" target="_blank">CGV</a> — <a href="http://blog.lmal.tv" class="security-link" target="_blank">BLOG</a> — Powered by  <a href="<?php echo base_url();?>" target="_blank">LMAL.TV</a>
			</div>
		</div> <!-- /container -->
	</div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
    	function updateStatus()
    	{
	        $.getJSON(
	        '<?php echo base_url('metadatas/getchannelstatus/'.$channel);?>'+'/'+Math.floor(Math.random()*1000000),
	        function(json){}).success(function(json) { 
	        	//console.log(json);
		        //status
		        if (json.status=='live') {
			        if (!$('#containerjw').is(':visible')) {
					    jwplayer('containerjw').setup({
						    playlist: [{
						        sources: [{ 
							        file: '<?php echo $rtmp;?>',
						        },{
						            file: '<?php echo $m3u8;?>'
						        }]
						    }],
					        width: '100%',
					        aspectratio: '16:9',
							primary: 'flash',
							autostart:true,
							skin:'<?php echo base_url('jwplayer/skins/lmal.xml');?>',
					        abouttext:'LMAL.TV',
					        aboutlink:'<?php echo base_url();?>'
					    });
					    $('#containerjw').show();
				        $('#containerjw_wrapper').show();
					    $('#poster').hide();
					    $('.product-price').hide();
			        }
		        } else if ($('#containerjw').is(':visible')) {
				        $('#containerjw').hide();
				        $('#containerjw_wrapper').hide();
					    $('#poster').show();
					    $('.product-price').show();
		        }
		        
		        if (json.timebeforebegin_days>0) {
		        	var text = 'Prochaine retransmission le ';
		        	text+=json.nextevent_date;
		        	text+=' à ';
		        	text+=json.nextevent_time;
		        	$('.countdown').text(text);
		        } else if (json.timebeforebegin_hours>0) {
		        	var text = 'Prochaine retransmission dans ';
		        	text+=json.timebeforebegin_hours%24;
		        	text+=(json.timebeforebegin_hours%24 > 1) ? ' heures et ' : ' heure et ';
		        	text+=json.timebeforebegin%60;
		        	text+=(json.timebeforebegin%60 > 1) ? ' minutes' : ' minute';
		        	$('.countdown').text(text);
		        } else if (json.timebeforebegin>0) {
		        	var text = 'Prochaine retransmission dans ';
		        	text+=json.timebeforebegin%60;
		        	text+=(json.timebeforebegin%60 > 1) ? ' minutes' : ' minute';
		        	$('.countdown').text(text);
		        } else $('.product-price').hide();
	        });
	     }

		updateStatus();
		setInterval( "updateStatus()", 5000 );
	</script>
	<script type="text/javascript">
	  var GoSquared = {};
	  GoSquared.acct = "GSN-679547-N";
	  (function(w){
	    function gs(){
	      w._gstc_lt = +new Date;
	      var d = document, g = d.createElement("script");
	      g.type = "text/javascript";
	      g.src = "//d1l6p2sc9645hc.cloudfront.net/tracker.js";
	      var s = d.getElementsByTagName("script")[0];
	      s.parentNode.insertBefore(g, s);
	    }
	    w.addEventListener ?
	      w.addEventListener("load", gs, false) :
	      w.attachEvent("onload", gs);
	  })(window);
	 </script>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='<?php echo base_url('assets/js/twitterwidget.js');?>';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-37465897-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
</body>
</html>