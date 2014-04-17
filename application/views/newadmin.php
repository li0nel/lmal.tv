<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
	<title><?php echo ucfirst($title);?></title>

    <!-- Le styles -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css');?>" rel="stylesheet">
	<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.4/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet">
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
			<a href="<?php echo base_url('logout');?>">Déconnexion</a>
		</div>
<?php if ($uploaderror!='') {?>
		<div class="alert alert-error">
			<button style="top: 2px;" type="button" class="close" data-dismiss="alert">&times;</button>
			<i class="icon-warning-sign" style="font-size:26px;margin-right:10px"></i><strong><?php echo $uploaderror;?></strong>
		</div>
<? } ?>
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
								<h1 class="edittitle">
									<a href="#" id="title" data-emptytext="(cliquez pour éditer)" data-type="text" data-pk="1" data-url="<?php echo base_url('metadatas/channel/'.$channel);?>" data-original-title="(cliquez pour éditer)"><?php echo ucfirst($title);?></a>
								</h1>
								<blockquote class="product-description">
									<p class="editdescription">
										<a href="#" id="description" data-type="textarea" data-pk="1" data-url="<?php echo base_url('metadatas/channel/'.$channel);?>" data-original-title="(cliquez pour éditer)" data-emptytext="(cliquez pour éditer)"><?php echo nl2br(ucfirst($description));?></a>
									</p>
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
						<div id="avatarupload" class="redonhover">
							<form action="<?php echo base_url('metadatas/channel/'.$channel.'/picture');?>" method="post" accept-charset="utf-8" id="pictureform" enctype="multipart/form-data" class="form-search">
								<input type="file" id="picture" name="userfile" size="20" style="position: fixed; top: -100px; left: -100px;">
							</form>
						</div>
						<img alt="Profile picture" id="profile_picture" src="<?php echo $picture;?>">
					</div>
					<h2 class="editname">
						<a href="#" id="name" data-emptytext="(cliquez pour éditer)" data-type="text" data-pk="1" data-url="<?php echo base_url('metadatas/channel/'.$channel);?>" data-original-title="Votre nom (cliquez pour éditer)"><?php echo ucfirst($ownername);?></a>
					</h2>
					<div id="bio">
						<p class="editbio">
							<a href="#" id="userbio" data-type="textarea" data-pk="1" data-url="<?php echo base_url('metadatas/channel/'.$channel);?>" data-emptytext="(cliquez pour éditer)" data-original-title="(cliquez pour éditer)"><?php echo nl2br(ucfirst($ownerbio));?></a>
						</p>
					</div>
				</div>
			</div>
			<div id="powered-by-footer">
				<a href="<?php echo base_url('terms');?>" class="security-link" target="_blank">CGV</a> — <a href="http://blog.lmal.tv" class="security-link" target="_blank">BLOG</a> — Powered by  <a href="<?php echo base_url();?>" target="_blank">LMAL.TV</a>
			</div>
		</div> <!-- /container -->
	</div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.4/bootstrap-editable/js/bootstrap-editable.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-filestyle.min.js');?>"></script>

    <script type="text/javascript">
	    $.fn.editable.defaults.mode = 'inline';
	    $('#title').editable();
	    $('#description').editable();
	    $('#name').editable();
	    $('#userbio').editable();
	    
		$(":file").filestyle({ 
			textField: false
		});

		$("#picture").change(function() {
			$('#pictureform').submit();
		});
		$('#pictureform .btn').removeClass('btn').css({ 'opacity' : 0 }).css({'width':'128px'}).css({'height':'128px'});

	</script>
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