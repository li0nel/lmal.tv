<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Votre conférence en direct, avec votre caméra ou par un professionnel</title>
	<meta name="description" content="Votre conférence en direct sur internet! Utilisez votre propre matériel ou engagez un de nos réalisateurs partenaires pour prendre en main la captation et la diffusion.">
	<meta name="keywords" content="conférence, direct, live, live streaming, retransmission, congrès, invitation privée, conférence payante, captation professionnelle, captation multicaméras, multi-caméras, La Machine A Liver" />
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
<body screen_capture_injected="true" class="pricing">
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
		<h2 class="heading header" style="font-weight: 500;margin-bottom: 4px;">Payez à l'usage (pas d'abonnement requis)</h2>
		<h3 class="lead sub-title" style="margin-bottom: 33px;text-align:center;margin-top:0px;font-weight:400">Diffusez depuis votre propre caméra ou engagez un de nos réalisateurs professionnels</h3>
		<div class="row plans text-center">
		<table class="table table-hover">
		<thead>
			<tr>
				<th class="span4"></th>
				<th class="span4 diy top" style="text-align:center">
					<p></p>
					<h2 style="margin-bottom: 30px;">Avec votre matériel</h2>
					<h4>100€ HT par heure</h4>
				</th>
				<th class="span4 pro top" style="text-align:center">
					<p></p>
					<h2>Par un réalisateur professionnel</h2>
					<h4>à partir de 450€ HT</h4>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="features">Stockage <i class="icon-info-sign givetooltip" style="float:right;" rel="tooltip" data-original-title="&lt;strong&gt;La quantité de stockage pour vos archives dans votre compte LMAL&lt;/strong&gt;"></i></td>
				<td class="diy" style="padding: 5px;"><h4>50 GB</h4></td>
				<td class="pro" style="padding: 5px;"><h4>illimité</h4></td>
			</tr>
			<tr>
				<td class="features">Nombre de spectateurs <i class="icon-info-sign givetooltip" style="float:right;" rel="tooltip" data-original-title="&lt;strong&gt;Le nombre maximum de spectateurs simultanés.&lt;/strong&gt;"></i></td>
				<td class="diy" style="padding: 5px;"><h4>jusqu'à 1000 simultanés</h4></td>
				<td class="pro" style="padding: 5px;"><h4>illimité</h4></td>
			</tr>
			<tr>
				<td class="features">Qualité HD <i class="icon-info-sign givetooltip" style="float:right;" rel="tooltip" data-original-title="&lt;strong&gt;Diffusion en H264 720p @ 1.5Mbps et AAC 128 Kbps&lt;/strong&gt;"></i></td>
				<td class="diy"><img src="<?php echo base_url('assets/images/check.png');?>"/></td>
				<td class="pro"><img src="<?php echo base_url('assets/images/check.png');?>"/></td>
			</tr>
			<tr>
				<td class="features">Intégration Facebook <i class="icon-info-sign givetooltip" style="float:right;" rel="tooltip" data-original-title="&lt;strong&gt;Exportez votre player LMAL sur votre page Facebook en quelques clicks&lt;/strong&gt;"></i></td>
				<td class="diy"><img src="<?php echo base_url('assets/images/check.png');?>"/></td>
				<td class="pro"><img src="<?php echo base_url('assets/images/check.png');?>"/></td>
			</tr>
			<tr>
				<td class="features">Replay et téléchargement <i class="icon-info-sign givetooltip" style="float:right;" rel="tooltip" data-original-title="&lt;strong&gt;Votre conférence disponible en replay ou en téléchargement automatiquement, dès la fin du direct.&lt;/strong&gt;"></i></td>
				<td class="diy"><img src="<?php echo base_url('assets/images/check.png');?>"/></td>
				<td class="pro"><img src="<?php echo base_url('assets/images/check.png');?>"/></td>
			</tr>
			<tr>
				<td class="features">Accès libre, privé ou payant <i class="icon-info-sign givetooltip" style="float:right;" rel="tooltip" data-original-title="&lt;strong&gt;Choisissez les conditions d'accès à votre conférence.&lt;/strong&gt;"></i></td>
				<td class="diy"><img src="<?php echo base_url('assets/images/check.png');?>"/></td>
				<td class="pro"><img src="<?php echo base_url('assets/images/check.png');?>"/></td>
			</tr>
			<tr>
				<td class="features">Statistiques <i class="icon-info-sign givetooltip" style="float:right;" rel="tooltip" data-original-title="&lt;strong&gt;Statistiques en temps réel + statistiques détaillées archivées dans votre compte LMAL.&lt;/strong&gt;"></i></td>
				<td class="diy"><img src="<?php echo base_url('assets/images/check.png');?>"/></td>
				<td class="pro"><img src="<?php echo base_url('assets/images/check.png');?>"/></td>
			</tr>
			<tr>
				<td class="features">Réalisation professionnelle <i class="icon-info-sign givetooltip" style="float:right;" rel="tooltip" data-original-title="&lt;strong&gt;Votre conférence filmée par un professionnel, en configuration multi-caméras.&lt;/strong&gt;"></i></td>
				<td class="diy"><img src="<?php echo base_url('assets/images/cross.png');?>"/></td>
				<td class="pro"><img src="<?php echo base_url('assets/images/check.png');?>"/></td>
			</tr>
			<tr class="nohover">
				<td></td>
				<td class="diy bottom">
					<a href="<?php echo base_url('app');?>" id="signupbtn">
						<button class="btn btn-block btn-large btn-success">Essayez gratuitement</button>
					</a>
				</td>
				<td class="pro bottom">
					<a href="#contactmodal" data-toggle="modal" role="button" >
						<button class="btn btn-block btn-large btn-success">Demandez un devis</button>
					</a>				
				</td>
			</tr>
			</tbody>
		</table>
		<h4 class="learn-more" style="margin-top:50px">
			<strong>Vous avez des besoins récurrents?</strong>
			<span>Nous proposons également des abonnements sur devis. </span>
			<a href="#contactmodal" data-toggle="modal" role="button">Contactez-nous &#8594;</a>
		</h4>
		</div></div>
		<section id="pricing" class="module light">
			<div class="container">
				<h2 class="header">Nos clients</h2>
					<ul class="guide-list row" style="padding-top: 5px;margin-top: 43px;">
				        <li class="four columns">
				  <a href="#" class="guide-card" id="guide_for-me">
				    <div class="guide-card-image client">
<img src="<?php echo base_url('assets/images/member.png');?>"/>
				    </div>
				    <h3 class="guide-name">CCI Lyon</h3> 
				</a></li>
				        <li class="four columns" style="width:60%">
				        <div class="arrow" style="border-right-color: #000;top: 50%;margin-top: -5px;border-width: 15px 15px 15px 0;position: absolute;border-color: transparent #F8F8F8;border-style: solid;z-index: 999;"></div>
				        <div style="background-color: #f8f8f8;
color: rgb(34, 34, 34);height:247px;border-radius:8px;margin-left:15px">
<div class="quote seven columns offset-two">
											<blockquote style="margin-top: 20px;">“ Avec LMAL.TV, nous permettons à nos adhérents de suivre nos conférences, même lorsqu'ils ne peuvent pas se déplacer! ”</blockquote>
											<div class="attribution">
												<img class="avatar showing" src="<?php echo base_url('assets/pictures/ccilyon.png');?>">
												<div class="quote-info">
													<h4 style="margin-top: 5px;margin-bottom: 2px;">Anne-Marie</h4>
													<p>Chambre de commerce de Lyon</p>
												</div>
											</div>
										</div>
				        </div>
				        </li>
				</ul>
			</div>	
		</section>
<!--		<section id="share" class="module">
			<div class="container">
				<h2 class="header">Qui sommes-nous?</h2>
				<ul class="guide-list row">
        <li class="four columns">
  <div class="guide-card">
    <div class="guide-card-image">
	    <div class="contenthover">
		    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum pulvinar ante quis augue lobortis volutpat.</p>
		</div>
	    <img class="member" src="<?php echo base_url('assets/images/member.png');?>"/>    
	</div>
    <h3 class="guide-name">TODO</h3> 
</div></li>

        <li class="four columns">
  <div class="guide-card">
    <div class="guide-card-image">
	    <div class="contenthover">
		    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum pulvinar ante quis augue lobortis volutpat.</p>
		</div>
	    <img class="member" src="<?php echo base_url('assets/images/member.png');?>"/>    
	</div>
    <h3 class="guide-name">TODO</h3> 
</div></li>

        <li class="four columns">
  <div class="guide-card">
    <div class="guide-card-image">
	    <div class="contenthover">
		    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum pulvinar ante quis augue lobortis volutpat.</p>
		</div>
	    <img class="member" src="<?php echo base_url('assets/images/member.png');?>"/>    
	</div>
    <h3 class="guide-name">TODO</h3> 
</div></li>
    </ul>
				<h2 class="header">Nos réalisateurs:</h2>
				<ul class="guide-list row">
        <li class="four columns">
  <div class="guide-card">
    <div class="guide-card-image">
	    <div class="contenthover">
	    <p style="margin:0px">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum pulvinar ante quis augue lobortis volutpat.</p>
	    <p style="margin-top:20px;align:left"><a href="http://lmaltv.wordpress.com" class="mybutton">Voir les réalisations</a></p>
		</div>
	    <img class="member" src="<?php echo base_url('assets/images/member.png');?>"/>
</div>
    <h3 class="guide-name">TODO</h3> 
</div></li>

        <li class="four columns">
  <div class="guide-card">
    <div class="guide-card-image">
	    <div class="contenthover">
	    	<p style="margin:0px">Vous êtes réalisateur?</p>
	    	<p style="margin:0px">Si vous voulez diffuser vos captations en direct ou participer aux réalisations des conférences LMAL, écrivez-nous.</p>
	    	<p style="margin-top:20px;align:left"><a href="#contactmodal" data-toggle="modal" role="button" class="mybutton">Devenir partenaire de LMAL</a></p>
		</div>
	    <img class="member" src="<?php echo base_url('assets/images/you.png');?>"/>
	</div>
    <h3 class="guide-name">Vous?</h3> 
</div></li>
    </ul>

			</div>	
		</section>-->

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
	<div style="display:none">La Machine A Liver</div>
	<div style="display:none">La Machine A Liver Lyon France</div>
	<div style="display:none">Retransmission de vos conférences en direct</div>
	<div style="display:none">Retransmission de vos conférences en live streaming</div>
	<div style="display:none">congrès, invitation privée, conférence payante</div>
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
	    
	    /*$('.member').contenthover({
		    overlay_background:'#FFF',
		    overlay_opacity:0.8
		});*/
		
		$(".guide-card-image:not(.client)").hover(
        function() {
            $(this).children("img").fadeTo(200, 0.1).end().children(".contenthover").show();
        },
        function() {
            $(this).children("img").fadeTo(200, 1).end().children(".contenthover").hide();
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