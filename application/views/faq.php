<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Vos conférences en live streaming sur votre site web ou votre page Facebook, avec La Machine A Liver</title>
	<meta name="description" content="LMAL.TV est un service simple, utile et innovant. Contrôlez parfaitement la retransmission de votre conférence en live avec les fonctionnalités d'invitation privée et de billeterie électronique de La Machine A Liver">
	<meta name="keywords" content="conférence, direct, live, live streaming, retransmission, congrès, invitation privée, conférence payante, captation professionnelle, captation multicaméras, multi-caméras" />
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
<body screen_capture_injected="true" class="faq">
	<div class="lmal-nav">
		<div class="color-bar"></div>
		<nav class="navbar container">
			<div class="span3">
				<a href="<?php echo base_url();?>">
					<h3 class="givetooltip" rel="tooltip" data-original-title="&lt;strong&gt;LMAL.TV&lt;/strong&gt; est un service innovant pour &lt;strong&gt;diffuser vos conférences en direct&lt;/strong&gt;!">
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
		<div class="container text-center module">
			<h2 class="heading header" style="font-weight: 500;margin-bottom: 4px;">Puis-je réellement diffuser mes conférences aussi facilement?</h2>
			<h3 class="lead sub-title" style="margin-bottom: 0px;text-align:center;margin-top:0px;font-weight:400">Nous vous proposons un service utile, innovant et accessible</h3>
		</div>
		<div class="content">
			<div class="tape"></div>
			<div class="box">
			    <div class="rules">
			      <h1>La réponse est</h1>
			      <ul style="font-size:24px;color:#333">
			        <li>Est-ce que je peux intégrer le player sur ma page Facebook?</li>
			        <li>Est-ce que je peux utiliser LMAL même si je n'ai pas de site web?</li>
			        <li>Ni de page Facebook?</li>
			        <li>Est-ce que LMAL fonctionne sur les iPads?</li>
			        <li>Et les tablettes Androïd?</li>
			        <li>Est-ce que je peux essayer LMAL sans engagement?</li>
			        <li>Est-ce que je peux essayer LMAL gratuitement?</li>
			        <li>La mise en ligne du replay est-elle automatique?</li>
			        <li>Est-ce que LMAL fournit une image en HD?</li>
			        <li>Est-ce que je pourrai télécharger ma conférence en HD?</li>
			        <li>Puis-je modifier la date de ma conférence après paiement?</li>
			        <li>Je peux vraiment vendre ma conférence en ligne si facilement?</li>
			        <li>Est-ce que je peux en verrouiller l'accès par un mot de passe?</li>
			        <li>Est-ce que je peux en verrouiller l'accès à ma seule entreprise?</li>
			        <li>Est-ce que je peux utiliser LMAL pour créer une webTV?</li>
			        <li>Est-ce que LMAL va m'aider à fidéliser mon audience?</li>
			        <li>Est-ce que LMAL va me permettre de booster ma communication?</li>
			      </ul>
			      <p><img src="<?php echo base_url('assets/images/img-stamp-yes.png');?>" style="margin-left:165px" width="371" height="200" alt="YES" border="0"></p>
			    </div>
			</div>
		</div>
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
<?php if (@$ty) {?>
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
    <script src="<?php echo base_url('assets/js/jquery.contenthover.js');?>"></script>
    <script type="text/javascript">
        $(".navbar .givetooltip").tooltip({
          'placement': 'right',
          'html':'true',
          'delay': { 'hide': '3000' }
        });
         $(".givetooltip.icon-info-sign").tooltip({
          'placement': 'right',
          'html':'true',
          'delay': { 'hide': '300' }
        });
        $(".navbar .givetooltip").hover(function() {
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

        $(".givetooltip.icon-info-sign").hover(function() {
        	$('.tooltip-inner').css('margin-top','0px');
            $('.tooltip-inner').css('background-color', '#ff6b3d');
            $('.tooltip-inner').css('color','#222');
            $('.tooltip-inner').css('max-width','250px');
            $('.tooltip-inner').css('font-size','14px');
		    $('.tooltip-arrow').css('border-right-color', '#ff6b3d');
	    });
	    
	    $('.member').contenthover({
		    overlay_background:'#FFF',
		    overlay_opacity:0.8
		});

<?php if (@$contact) {?>
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