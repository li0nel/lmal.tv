<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Diffusez vos conférences en direct sur votre site web ou votre page Facebook</title>
	<meta name="description" content="Votre conférence en direct! Intégrez le player LMAL sur votre site web ou votre page Facebook en quelques clicks. Utilisez seulement le player LMAL ou engagez un de nos réalisateurs partenaires.">
	<meta name="keywords" content="conférence, direct, live, live streaming, retransmission, congrès, invitation privée, conférence payante, captation professionnelle, captation multi-caméras" />
	<meta name="author" content="La Machine A Liver">
	<meta name="robots" content="index, follow" />
	<meta name="revisit-after" content="7 days" />
	<!-- Le styles -->
	<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/style.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/bootstrap/css/font-awesome.min.css');?>" rel="stylesheet">
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="../assets/js/html5shiv.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico');?>">
</head>
<body screen_capture_injected="true" class="bridges">
	<div class="lmal-nav">
		<div class="color-bar"></div>
		<nav class="navbar container">
			<div class="span3">
				<a href="<?php echo base_url();?>">
					<h3 id="givetooltip" rel="tooltip" data-original-title="&lt;strong&gt;LMAL.TV&lt;/strong&gt; est un service innovant pour &lt;strong&gt;diffuser vos conférences en direct&lt;/strong&gt;!">
						<img src="<?php echo base_url('assets/images/header_logo.png');?>">LMAL.TV
					</h3>
				</a>
			</div>
			<div class="nav-right">
				<ul class="nav">
					<li>
						<a href="<?php echo base_url();?>">Accueil</a>
					</li>
					<li>
						<a href="<?php echo base_url('pricing');?>">Tarif</a>
					</li>
					<li>
						<a href="<?php echo base_url('faq');?>">FAQ</a>
					</li>
					<li>
						<a href="#contactmodal" data-toggle="modal" role="button" >Contact</a>
					</li>
					<li>
						<a href="<?php echo base_url('login');?>">Connexion</a>
					</li>
<!--					<li>
						<a href="<?php echo base_url('signup');?>" id="signupbtn">
							<button class="button-primary">Essayez gratuitement</button>
						</a>
					</li>						-->
				</ul>
			</div>
		</nav>
	</div>
	<div>
<!--		<section id="setup" class="module">
			<div class="container">
				<h2 class="header">Diffusez vos évènements live en HD</h2>
				<div id="setup-product">
					<img src="<?php echo base_url('assets/images/channel_image.png');?>"/>
				</div>
				<ul id="setup-features">
					<div class="row">
						<li class="preview three columns">
							<h4>Votre évènement en live sur internet</h4>
							<p>Une page web est dédiée à votre évènement, en ligne rapidement, en quelques clicks</p>
						</li>
						<li class="pricing three columns offset-half">
							<h4>Votre captation en HD</h4>
							<p>Video en 720p / 1.5Mbps / 30fps<br>Audio à 256Kbps</p>
						</li>
					</div>
					<div class="row">
						<li class="name three columns">
							<h4>Vendez des tickets virtuels</h4>
							<p>Rendez l'accès à votre live payant, ou ouvert au public</p>
						</li>
						<li class="upload three columns offset-half">
							<h4>Personnalisez votre page</h4>
							<p>Téléchargez votre affiche, insérez un titre et une description<br>Incrustez votre logo dans l'image</p>
						</li>
					</div>
				</ul>
			</div>
		</section>-->
		<section id="setup" class="module">
			<div class="container">
				<h2 class="header" style="font-weight: 500;margin-bottom: 4px;">Vos conférences en direct sur votre site web</h2>
				<h3 style="margin-bottom: 33px;text-align:center;margin-top:0px;font-weight:400">en accès libre, privé ou payant</h3>
<!--				<div id="setup-product" style="top:175px">
					<img src="<?php echo base_url('assets/images/channel_image.png');?>"/>
				</div>-->
				<ul id="setup-features" style="margin-left:30%;width:45%;list-style-image:url('<?php echo base_url('assets/images/check.png')?>');">
<!--					<div class="row" style="margin-bottom: 0px;margin-bottom:10px">
						<li class="preview three columns">
							<h4>Avec votre caméra:</h4>
							<p>Intégrez le player LMAL à votre site web et diffusez votre conférence avec votre propre matériel et équipe technique.</p>
						</li>
						<li class="pricing three columns offset-half">
							<h4>Par un réalisateur LMAL:</h4>
							<p>Un de nos réalisateurs professionnels prend en charge la captation de votre conférence et sa diffusion en direct sur votre site web.</p>
						</li>
						</div>-->
						<li>Intégrez facilement le player LMAL <strong>sur votre site web</strong><br/>ou <strong>sur votre page Facebook</strong></li>
						<li>Diffusion en <strong>haute qualité</strong>, jusqu'à 720p</li>
						<li><strong>Faites payer l'accès</strong> à votre conférence ou laissez l'accès libre</li>
						<li>Invitation par email pour vos <strong>conférences privées</strong></li>
<!--							<p style="margin-top: 14px;"><i style="font-size:15px">A partir de 340€ HT par heure</i></p>-->
<!--							<p><i style="color:#62830D" class="icon-ok"></i> <strong>Toutes les fonctionnalités du player LMAL</strong> ci-contre</p>-->
							<li>Option : faites appel à un de nos réalisateurs pour une captation de <strong>qualité professionnelle</strong> en multi-caméras</li>
<!--							<p><i style="color:#62830D" class="icon-ok"></i> Incrustation des <strong>Powerpoint</strong>, des <strong>noms des intervenants</strong> et de <strong>vos logos</strong> en temps réel</p> -->
<!--							<p style="margin-top: 144px;"><i style="font-size:15px">Sur devis</i></p> -->
<!--							<p><i style="color:#62830D" class="icon-ok"></i> Votre <strong>enregistrement</strong> est <strong>re-travaillé</strong> après-coup pour éliminer les temps morts</p>
							<p><i style="color:#62830D" class="icon-ok"></i> Diffusion par <strong>réseau mobile</strong> ou <strong>satellite</strong> (vous ne vous souciez pas de la connexion à internet sur place)</p>-->
<!--					<div class="row" style="text-align:center;margin-top:25px">
						<p style="float:left;font-size:18px;color:#444;margin-right:40px;margin-top:14px;font-weight:400"><i>Diffusez votre conférence en direct pour les absents et archivez-la pour tous les autres!</i></p> <a href="#wtf"><button class="button-primary" style="font-size: 15px;float:left">Comment ça marche?</button></a>
					</div>-->
				</ul>
			</div>
		</section>
		<section id="wtf" class="module light" style="color:#333;height:300px;font-size:18px">
			<div class="container">
				<div id="wtf-before">
					<img src="<?php echo base_url('assets/images/before_mockup.png');?>">
				</div>
				<div class="row" style="padding-left:600px;font-weight:400;font-size:15px">
				<p style="margin-top:40px">Le player LMAL est facile à intégrer à votre site web.</p>
				<p>Vous pouvez le personnaliser avec le titre de votre conférence et une affiche.</p>
				<p>Définissez l'heure de démarrage pour activer le compte à rebours.</p>
				</div>

				<!--<div class="row">
					<h2 class="header full-column">Comment ça marche?</h2>
				</div>
				<ul class="row feature-list">
					<li class="feature four columns">
						<div class="img how-illustration wtf1"></div>
						<h3>Créez un compte LMAL</h3>
						<p>Comme par exemple www.lmal.tv/monconcert.<br/>Ensuite, diffusez-là auprès de votre audience</p>
					</li>
					<li class="feature four columns">
						<div class="img how-illustration wtf2"></div>
						<h3>Personnalisez le player</h3>
						<p>avec une affiche, un titre, une description. Définissez la date de l'évènement pour activer le compte à rebours</p>
					</li>
					<li class="feature four columns">
						<div class="img how-illustration wtf3"></div>
						<h3>Connectez vos caméras</h3>
						<p>... à un ordinateur et publiez votre captation dans votre player LMAL.TV</p>
					</li>
				</ul>-->
			</div>
		</section>
		<section id="share" class="module" style="height:300px;color:#333">
			<div class="container">
				<div id="wtf-live" style="top: -32px;margin-left:156px;z-index: 99;">
					<img src="<?php echo base_url('assets/images/live_mockup.png');?>">
				</div>
				<div class="row" style="width:360px;font-weight:400;font-size:15px">
				<p style="margin-top:80px">Au démarrage de la conférence, la vidéo s'affiche en direct, sur votre site web!</p>
				</div>
<!--				<h2 class="header">Promouvez votre page</h2>
				<ol class="feature-list row">
					<li class="feature web half column">
						<h3>Sur les réseaux sociaux</h3>
						<p>Utilisez notre application Facebook et notre Twitter card pour intégrer votre live sur vos pages sociales</p>
						<p>
							<i class="icon-twitter icon-4"></i>
							<i class="icon-facebook icon-3"></i>
						</p>
					</li>
					<li class="feature personal half column">
						<h3>Sur votre site web</h3>
						<p>Exportez le player LMAL.TV sur votre site web ou votre blog par quelques lignes de code HTML</p>
						<p class="rediframe">&lt;/iframe&gt;</p>
					</li>
				</ol>-->
			</div>
		</section>
		<section id="pricing" class="module light" style="height:420px">
			<div class="container">
				<!--<i class="icn price-separator"></i>
				<h2 class="header">Payez à l'usage</h2>
				<ul class="row">
					<li class="feature payments half column">
						<i class="icon-shopping-cart icon-3"></i>
						<p class="content-group">Essayez gratuitement, <br/>puis payez pour supprimer le watermark du mode gratuit</p>
					</li>
					<li class="feature pricing half column">
						<div class="pricing-terms">
							<div class="pricing-terms-inner">
								<h2>340€</h2>
								<p><span>+</span> 8%</p>
							</div>
							<p class="transaction">Par heure, Tarif HT</p>
						</div>
						<p class="content-group">Pas d'abonnement: payez quand vous l'utilisez.<br>Le pourcentage s'applique seulement si vous faites payer l'accès à votre retransmission</p>
					</li>
				</ul>-->
				<div id="wtf-after" style="top: -32px;z-index: 99">
					<img src="<?php echo base_url('assets/images/after_mockup.png');?>">
				</div>
				<div class="row" style="padding-left:600px;font-weight:400;font-size:15px;color:#333">
				<p style="margin-top:80px">Dès la fin de la conférence, la vidéo est accessible en replay et en téléchargement.</p>
				</div>

			</div>	
			<div id="signup">
						<div class="footer-signup container" style="margin-top:70px;border-top: 1px dashed #DDD;padding-top: 30px;">
				<a id="signupbtn" href="<?php echo base_url('pricing');?>">
					<button class="button-primary">Voir les tarifs</button>
				</a>
				<p>ou 
					<a href="#contactmodal" data-toggle="modal" role="button" >contactez-nous</a>
				</p>
			</div>
					</section>
		<!--<section id="signup" class="module">
			<div id="myCarousel" class="carousel slide">
				<div class="carousel-inner">
					<div class="active item">
						<div class="container">
							<div class="quote-slider">
								<ol id="quotes" class="row">
									<li>
										<div class="product popped" style="position:relative">
											<a href="<?php echo base_url('ccilyon');?>" target="_blank"><span class="clickablediv"></span></a>
											<div class="product-main product-main-mini">
												<div id="preview-container" data-preview="true">
													<div id="image-preview-container-mini">
														<img src="<?php echo base_url('assets/posters/jqnZt.png?1774436152');?>" class="preview" itemprop="image">
													</div>
												</div>
												<div class="product-information">
													<div class="product-content">
														<h1 itemprop="name">
															<strong>Conférence en direct</strong> 
														</h1>
													</div>
												</div>
											</div>
										</div>
										<div class="quote seven columns offset-two">
											<span class="hang-quote">“</span>
											<blockquote>Avec LMAL.TV, nous permettons à nos adhérents de suivre nos conférences, même lorsqu'ils ne peuvent pas se déplacer! ”
											</blockquote>
											<div class="attribution">
												<img class="avatar showing" src="<?php echo base_url('assets/pictures/ccilyon.png');?>">
												<div class="quote-info">
													<h4>Anne-Marie</h4>
													<p>Chambre de commerce de Lyon</p>
												</div>
											</div>
										</div>
									</li>
								</ol>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="container">
							<div class="quote-slider">
								<ol id="quotes" class="row">
									<li>
										<div class="product popped" style="position:relative">
											<a href="<?php echo base_url('ccilyon');?>" target="_blank"><span class="clickablediv"></span></a>
											<div class="product-main product-main-mini">
												<div id="preview-container" data-preview="true">
													<div id="image-preview-container-mini">
														<img src="<?php echo base_url('assets/posters/jqnZt.png?1774436152');?>" class="preview" itemprop="image">
													</div>
												</div>
												<div class="product-information">
													<div class="product-content">
														<h1 itemprop="name">
															<strong>Conférence en direct</strong> 
														</h1>
													</div>
												</div>
											</div>
										</div>
										<div class="quote seven columns offset-two">
											<span class="hang-quote">“</span>
											<blockquote>Avec LMAL.TV, nous permettons à nos adhérents de suivre nos conférences, même lorsqu'ils ne peuvent pas se déplacer! ”
											</blockquote>
											<div class="attribution">
												<img class="avatar showing" src="<?php echo base_url('assets/pictures/ccilyon.png');?>">
												<div class="quote-info">
													<h4>Anne-Marie</h4>
													<p>Chambre de commerce de Lyon</p>
												</div>
											</div>
										</div>
									</li>
								</ol>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="container">
							<div class="quote-slider">
								<ol id="quotes" class="row">
									<li>
										<div class="product popped" style="position:relative">
											<a href="<?php echo base_url('ccilyon');?>" target="_blank"><span class="clickablediv"></span></a>
											<div class="product-main product-main-mini">
												<div id="preview-container" data-preview="true">
													<div id="image-preview-container-mini">
														<img src="<?php echo base_url('assets/posters/jqnZt.png?1774436152');?>" class="preview" itemprop="image">
													</div>
												</div>
												<div class="product-information">
													<div class="product-content">
														<h1 itemprop="name">
															<strong>Conférence en direct</strong> 
														</h1>
													</div>
												</div>
											</div>
										</div>
										<div class="quote seven columns offset-two">
											<span class="hang-quote">“</span>
											<blockquote>Avec LMAL.TV, nous permettons à nos adhérents de suivre nos conférences, même lorsqu'ils ne peuvent pas se déplacer! ”
											</blockquote>
											<div class="attribution">
												<img class="avatar showing" src="<?php echo base_url('assets/pictures/ccilyon.png');?>">
												<div class="quote-info">
													<h4>Anne-Marie</h4>
													<p>Chambre de commerce de Lyon</p>
												</div>
											</div>
										</div>
									</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
				<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>
		</section>-->
	</div>
	<footer class="lohp">
		<div id="footer-terminal">
			<div class="container">
				<p id="crafted">LMAL.TV est développé à Lyon, France</p>
				<ul class="pull-right">
					<li class="footer-item"><a target="_blank" href="http://blog.lmal.tv">Blog</a></li>
					<li class="footer-item"><a href="<?php echo base_url('terms');?>">Conditions générales de vente</a></li>
					<li id="copyright">© 2013 LMAL.TV</li>
				</ul>
			</div>
		</div>
	</footer>
	<div id="contactmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="gr-modals">
			<div id="hp-auth-modal" class="showing">
				<div id="hp-login" style="display: block;">
					<div class="form-title">
						<h2>Ecrivez-nous! Ici, ou à <strong>contact@lmal.tv</strong></h2>
						<a href="#" class="button button-close close-modal js-close-modal-trigger" data-dismiss="modal">
							<i class="icon-remove"></i>
						</a>
					</div>
					<div class="modal-body">
<?php if ($ty) {?>
						<p class="ty">Merci! Votre message a bien été reçu.<br/>Nous vous répondrons dans les meilleurs délais.</p>
<?php } else { ?>
						<p>N'hésitez pas à nous contacter pour vos questions relatives à la mise en place de votre live streaming.</p>
<?php echo form_open(base_url(), array('id' => 'loginform', 'class' => 'form-contact'));?>
				            <label style="margin-top:20px" for="id_full_name">Votre email:    <?php echo form_error('email'); ?></label>
					        <input id="id_full_name" type="text" name="email" maxlength="255" value="<?php echo set_value('email'); ?>">
					        <label style="margin-top:20px" for="message">Votre message:  <?php echo form_error('message'); ?></label>
						    <textarea style="width:486px;height:140px;resize:none" type="text" id="message" name="message" maxlength="255"><?php echo set_value('message'); ?></textarea>
						    <div class="row controls user-avatar" style="margin-left:0px;">
							    <button type="submit" class="button-primary">Envoyer</button>
							</div>
						</form>
<?php } ?>
			        </div>
			    </div>
			</div>
		</div>
	</div>
	<div style="display:none">La Machine A Liver</div>
	<div style="display:none">La Machine A Liver Lyon France</div>
	<div style="display:none">Retransmission de vos conférences en direct</div>
	<div style="display:none">Retransmission de vos conférences en live streaming</div>
	<a style="display:none" href="https://plus.google.com/113474469735835226377" rel="publisher">Find us on Google+</a>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/bootstrap/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-transition.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-alert.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-modal.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-dropdown.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-scrollspy.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-tab.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-tooltip.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-popover.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-button.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-collapse.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-carousel.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-typeahead.js');?>"></script>
    <script type="text/javascript">
        $("#givetooltip").tooltip({
          'placement': 'right',
          'html':'true',
          'delay': { 'hide': '3000' }
        });
        $("#givetooltip").hover(function() {
        	$('.tooltip').css('top','25.5px');
        	$('.tooltip').css('margin-top','0px');
        	$('.tooltip-inner').css('margin-top','0px');
        	$('.tooltip-inner').css('opacity', '0.9');
            $('.tooltip-inner').css('background-color', '#efefe9');
            $('.tooltip-inner').css('color','#222');
            $('.tooltip-inner').css('max-width','250px');
            $('.tooltip-inner').css('font-size','14px');
		    $('.tooltip-arrow').css('border-right-color', '#efefe9').css('opacity', '0.9');
	    });
<?php if ($contact) {?>
	    $('#contactmodal').modal('show')
<?php } ?>
	</script>
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