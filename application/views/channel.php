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
	<script src="<?php echo base_url('jwplayer/jwplayer.js');?>"></script>
	<script>jwplayer.key="z85kJxIwqqk1YoY0yqu8JDQ4EdFUl1bwcQEX+WH6LhE="</script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">
		google.load("visualization", "1", {packages:["corechart"]});
	</script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src=".assets/js/html5shiv.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico');?>">    <!-- Fav and touch icons -->
</head>
<body screen_capture_injected="true" class="bridges <?php if ($fb) echo 'fbembed';?>" id="product_page">
	<div class="color-bar"></div>
	<div class="channelcontainer">
		<div id="sharing" >
			<a href="https://twitter.com/share" class="twitter-share-button" data-lang="fr">Tweeter</a>
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url($channel);?>" target="_blank" class="facebook_share button button-social-facebook button-w-i button-plain button-small" data-description="" data-message="Shared!" data-name="" data-preview="" data-url="">
				<i class="icon-facebook"></i>Partager
			</a>
<?php if ($status=='onair') {?>
			<span id="statstxt"><i class="icon-eye-open"></i><span id="nbviewers">1</span> <span id="viewers">spectateur</span> en ligne</span>
<?php } ?>
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
							<div id="paymentslide">
								<div class="gr-modals" id="payment-module">
									<div id="hp-auth-modal" style="max-width:1024px;height:100%" class="showing">
										<div id="hp-login" style="display: block;">
											<div class="form-title">
												<h2>Votre commande:</h2>
												<a href="#" id="closepayment" class="button button-close close-modal">
													<i class="icon-remove"></i>
												</a>
											</div>
											<div class="modal-body">
												<div id="cart">
													<p>1 accès à cette retransmission en direct, le 27/06/2013 à 21h00</p>
													<p>Vous recevrez un email de confirmation, avec un code d'accès personnel vous permettant de voir ce direct sur un autre ordinateur, sans repayer.</p>
													<a href="#" class="button button-embed button-plain close-modal smallscreenonly">
														<i class="icon-shopping-cart"></i>Continuer
													</a>
													<form method="post" accept-charset="utf-8" id="loginform" class="form-signin" style="margin-top:20px">
														<label for="id_full_name">Votre email:</label>
														<input id="id_full_name" type="text" name="email" maxlength="255" value="">
														<label for="password" style="margin-top:20px">Confirmez votre email:</label>
														<input type="password" id="password" name="password" maxlength="255">
													</form>
												</div>
												<div id="creditcard">
													<section>
														<form action="https://lmal.tv/ccilyon/pay/eventid/6WZZA" method="post" accept-charset="utf-8" id="loginform" class="edit_payment">
												        	<input type="radio" name="test" id="payment-stripe" value="hop" checked="checked" style="display:none;">
													        <div class="stripe-fields">
														        <div class="card-number">
																	<label for="card-number">Numéro de carte
																		<img src="https://lmal.tv/assets/images/visa_ico.png" class="card_ico">
																		<img src="https://lmal.tv/assets/images/mastercard_ico.png" class="card_ico">
																		<img src="https://lmal.tv/assets/images/paypal_ico.png" class="card_ico">
																	</label>													        
																	<input type="text" class="text" accept="" size="20" maxlength="24" autocomplete="off" id="card-number" placeholder="0000 0000 0000 0000" value="">
															    </div>
															    <div class="card-expiry">
																    <label for="card-expiry-month">Expiration <strong>MM YYYY</strong></label>
																    <input type="text" class="text" size="2" maxlength="2" id="card-expiry-month" value="">
																    <input type="text" class="text" size="4" maxlength="4" id="card-expiry-year" value="">
																</div>
																<div class="card-cvc">
																	<label for="card-cvc">CVC</label>
																	<input type="text" class="text" size="4" maxlength="4" autocomplete="off" id="card-cvc" value="">
																</div>
															</div>
															<footer>
																<fieldset class="submit-fields">
																	<a id="submit-btn" href="#" onclick="$(this).closest('form').submit()" class="button button-embed button-plain">Payer <i class="icon-arrow-right"></i></a>
																	<h3 id="total-price">
																		<span style="font-weight: bold;">
																		<span id="amount_cmd">3</span>€</span> Paiement total
																	</h3>
																</fieldset>
																<div id="secure">
																	<i class="icon-lock"></i> Paiement par <span style="font-weight:bold">LMAL.TV</span>
																</div>
															</footer>
														</form>
													</section>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<img id="posterimg" src="<?php echo $poster;?>">
						</div>
					</div>
					<div class="product-information two-column">
<?php if ($formatteddate=='') {?>
						<h2 class="product-price">
							<div class="channelstatus">
								<i class="countdown">La date de cette conférence n'est pas encore déterminée</i>
							</div>
						</h2>
<?php } else if ($status=='finished') {?>
						<h2 class="product-price">
							<i class="countdown">Cette conférence en direct est maintenant terminée</i>
						</h2>
						<a href="#" id="replay" style="font-weight:bold" class="button button-stream button-plain button-small"><i class="icon-play" style="margin-right:8px"></i>Lire</a>
							<a href="#" id="dl" style="font-weight:bold" class="button button-stream button-plain button-small"><i class="icon-download-alt" style="margin-right:8px"></i>Télécharger</a>

<?php } else if ($status=='upcoming') {?>
						<h2 class="product-price">
							<i class="countdown">...</i>
						</h2>
<?php } ?>
						<div class="product-content">
							<div class="description-container">
								<h1><?php echo ucfirst($title);?></h1>
								<blockquote class="product-description">
									<p><?php echo nl2br(ucfirst($description));?></p>
								</blockquote>
							</div>
							<div class="want-container">
								<button class="button" disabled="disabled" style="width:100%">Accès gratuit</button>
								<div class="product-info">
									<h4>
										Vous aurez l'accès complet à cette diffusion en HD, sur tout ordinateur ou tablette.
									</h4>
									<ul>
										<li><span>Date</span> <strong><p><?php echo $formatteddate;?></p></strong></li>
										<li><span>Heure</span> <strong><p><?php echo $formattedhour;?></p></strong></li>
										<li><span>Durée</span> <strong><p><?php echo $duration.(intval($duration)>1?' heures':' heure');?></p></strong></li>
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
					<h2><?php echo ucfirst($ownername);?></h2>
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
    <script src="<?php echo base_url('assets/bootstrap/js/jquery.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
    <script type="text/javascript">
    	function updateStatus()
    	{
	        $.getJSON(
	        '<?php echo base_url('metadatas/eventid/'.$eventidhash.'/');?>'+'/'+Math.floor(Math.random()*1000000),
	        function(json){}).success(function(json) { 
	        	//console.log(json);
		        $('#nbviewers').text(json.stats);
	        	$('#viewers').text((json.stats>1)?'spectateurs':'spectateur');
	   	        	
		        if (json.startdate=='0000-00-00 00:00:00') {
		        } else if (json.timebeforebegin_days>0) {
		        	var text = 'Cette conférence en direct démarrera dans ';
		        	text+=json.timebeforebegin_days;
		        	text+=(json.timebeforebegin_days == 1) ? ' jour, ' : ' jours, ';
		        	text+=json.timebeforebegin_hours%24;
		        	text+=(json.timebeforebegin_hours%24 > 1) ? ' heures et ' : ' heure et ';
		        	text+=json.timebeforebegin%60;
		        	text+=(json.timebeforebegin%60 > 1) ? ' minutes' : ' minute';
		        	$('.countdown').text(text);
		        } else if (json.timebeforebegin_hours>0) {
		        	var text = 'Cette conférence en direct démarrera dans ';
		        	text+=json.timebeforebegin_hours%24;
		        	text+=(json.timebeforebegin_hours%24 > 1) ? ' heures et ' : ' heure et ';
		        	text+=json.timebeforebegin%60;
		        	text+=(json.timebeforebegin%60 > 1) ? ' minutes' : ' minute';
		        	$('.countdown').text(text);
		        } else if (json.timebeforebegin>0) {
		        	var text = 'Cette conférence en direct démarrera dans ';
		        	text+=json.timebeforebegin%60;
		        	text+=(json.timebeforebegin%60 > 1) ? ' minutes' : ' minute';
		        	$('.countdown').text(text);
		        } else if (json.timebeforeend<=0) {
		        	$('.countdown').text('Cette conférence en direct est maintenant terminée');
<?php if ($status=='onair') {?>
	if ($('#containerjw').is(':visible')) location.reload();
<?php } ?>
		        } else if (json.timebeforebegin<=0) {
		        	$('.countdown').text('Cette conférence en direct est démarrée depuis '+Math.abs(json.timebeforebegin)+' minutes');
	
		        	//refresh if not done
		        	if (!$('#containerjw').is(':visible')) location.reload();
		        }
	        });
	     }
<?php if ($status=='onair') {?>
	    jwplayer('containerjw').setup({
	    file: '<?php echo $m3u8;?>',
	        width: '1024',
	        height: '576',
		primary: "flash",
		autostart:true,
		skin:'<?php echo base_url('jwplayer/skins/lmal.xml');?>',
	<?php if ($paid==0) {?>
		logo: {
        	file: '<?php echo base_url('/assets/watermark.png');?>',
        	link: '<?php echo base_url();?>',
        	position : 'top-right'
        },
    <?php } ?> 
        abouttext:'LMAL.TV',
        aboutlink:'<?php echo base_url();?>'
	    });
        $('#containerjw_wrapper').show();
	    $('#poster').hide();
<?php } else if ($status=='upcoming') {?>
        $('#containerjw').hide();
	    $('#poster').show();
<?php } else if ($url!=''){?>
		//handle replay here
  	    jwplayer('containerjw').setup({
	    file: '<?php echo $url;?>',
	        width: '1024',
	        height: '576',
		primary: "flash",
		autostart:false,
		skin:'<?php echo base_url('jwplayer/skins/bekle.xml');?>',
		image:'<?php echo $poster;?>'
	    });
        $('#containerjw_wrapper').show();
	    $('#poster').hide();
<?php } else {?>
        $('#containerjw').hide();
        $('#poster').show();
<?php } ?>

		updateStatus();
<?php if ($status!='finished') {?>
		setInterval( "updateStatus()", 30000 );
<?php } ?>

	$("#buy").click(function () {
		if ($(window).width() < 640)
			window.location = "<?php echo base_url('pay/smallscreens');?>";
		else
			$("#paymentslide").toggle('slide', {direction: 'down'});
      });
    $("#closepayment").click(function () {
		$("#paymentslide").toggle('slide', {direction: 'down'});
      });
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