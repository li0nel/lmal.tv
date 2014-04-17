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
	<link href="<?php echo base_url('assets/bootstrap/css/bootstrap-timepicker.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/bootstrap/css/bootstrap-datetimepicker.min.css');?>" rel="stylesheet">

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
<?php if ($channel=='') {?>
						<a href="<?php echo base_url('login');?>">Connexion</a>
<?php } else { ?>
						<a href="<?php echo base_url('logout');?>">Déconnexion</a>

<?php } ?>


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
<div class="container text-center module" id="camerabg" style="
    background: url('<?php echo base_url('assets/images/bg_connect.png');?>'); 
    background-size: 940px; background-repeat: no-repeat; background-position: center 136px;background-z-index: +1;
    height: 496px;
">
		<h2 class="heading header" style="font-weight: 500;margin-bottom: 4px;">Essayez gratuitement!</h2>
		<h3 class="lead sub-title" style="margin-bottom: 33px;text-align:center;margin-top:0px;font-weight:400">Connectez votre caméra, commencez le streaming et exportez votre player</h3>
		<div class="span4" style="text-align: left;float: right;margin-top: 119px;width: 326px;color: #333;font-size: 15px;">
		<p id="softdesc">Utilisez votre <i>clé de streaming LMAL</i> depuis votre logiciel de streaming (Adobe Flash Media Live Encoder, Wirecast, etc...)</p>
		<p id="harddesc" style="display:none">Utilisez votre <i>clé de streaming LMAL</i> depuis votre Teradek VidiU<br>(ou autre encodeur équivalent)</p>
<?php if ($channel=='') {?>
		<p style="color:#D44012"><a href="#loginmodal" data-toggle="modal" role="button" >Cliquez ici</a> pour obtenir votre clé de streaming.</p>
<?php } else { ?>
		<pre style="opacity:0.9"><b>URL:</b> rtmp://push.lmal.tv/live<br><b>Stream:</b> <?php echo $streamkey;?></pre>
<?php } ?>
		</div>
		<div style="text-align:center;float:left;margin-top:275px;margin-left:248px;color:#333;font-size:15px">
		<p>fonctionne également avec un <a href="#" id="showhard">encodeur hardware</a><a href="#" id="showsoft" style="display:none">logiciel de streaming</a></p>
		</div>
</div>				<section id="pricing2" class="module light" style="height:450px">
			<div class="container" style="
    background: url('<?php echo base_url('assets/images/bg_export.png');?>'); 
    background-size: 940px; background-repeat: no-repeat; background-position: center -20px;height:100%">
    
    <div class="span4" style="text-align: left;float: left;margin-top: 84px;width: 200px;color: #333;font-size: 15px;">
		<p style="font-weight:bold">Sur votre site web:</p>
		<p><a href="#embedinstructions" <?php if ($channel=='') {?>onclick="javascript:alert('Connectez-vous ci-dessus pour exportez votre player');return false;"<?php } else { ?>  data-toggle="modal" <?php }?>>Cliquez ici</a> pour obtenir le code HTML d'intégration.</p>
<p>Pas de site web? Pas de souci! Nous vous <?php if ($channel=='') {?>générerons un site web automatiquement<?php } else {?>avons généré <a target="_blank" href="<?php echo base_url($channel);?>">un site web</a><?php } ?>.</p>
		<p style="font-weight:bold;margin-top:0px">Sur votre page Facebook:</p>
		<p>Intégrez votre player LMAL sur une de vos pages Facebook en <a <?php if ($channel=='') {?> onclick="javascript:alert('Connectez-vous ci-dessus pour exportez votre player');return false;" <?php } ?> target="_blank" href="<?php if ($channel!='') {?> https://www.facebook.com/dialog/pagetab?app_id=539471056115540&amp;redirect_uri=https://lmal.tv/fb/return_tab <?php } else { ?>#<?php } ?>">cliquant ici</a>.</p>

		</div>
    <div class="span4" style="text-align: left;float: right;margin-top: 60px;width: 200px;color: #333;font-size: 15px;">
		<p>Dites-en plus sur votre prochaine retransmission!<br><br/><i>(facultatif)</i></p>
		<div class="metadatas">
<?php echo form_open(base_url('metadatas/nextevent/'.$channel), array('id' => 'loginform', 'class' => 'form-signin'));?>
			<p style="float:left"><b>Titre:</b></p>
			<input type="text" <?php if ($channel=='') {?>disabled="disabled"<?php } ?> name="title" style="-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;width: 126px;margin-bottom:12px;height:30px;float:right;border-width: 1px;" value="<?php echo $nextevent_title;?>">
			<p style="float:left"><b>Date:</b></p>
			<div id="datetimepicker4" class="input-append" style="float:right">
			    <input <?php if ($channel=='') {?>disabled="disabled"<?php } ?> data-format="yyyy-MM-dd" type="text" value="<?php echo $nextevent_date;?>" name="date" class="input-no-style">
			    <span class="add-on">
			      <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
			    </span>
			</div>
			<p style="float:left"><b>Heure:</b></p>
	        <div class="input-append bootstrap-timepicker" style="float:right">
	            <input <?php if ($channel=='') {?>disabled="disabled"<?php } ?> id="timepicker1" type="text" name="time" class="input-small input-no-style" value="<?php echo $nextevent_time;?>">
	            <span class="add-on"><i class="icon-time"></i></span>
	        </div>
	        <input type="submit" class="button button-embed button-plain button-small" <?php if ($channel=='') {?>disabled="disabled"<?php } ?> value="Sauvegarder" style="margin-left:45px">
		</form>
		</div>		
	</div>
		
<?php if ($channel=='') {?>
    <div style="margin-left:230px;margin-top:60px;width:480px;height:270px;background-color:#000">
    <p style="color: #FFF;font-size: 15px;text-align: center;padding-top: 130px;"><i class="icon-spinner icon-spin icon-2" style="font-size:18px; color:#FFF;padding:0;margin: 0px 0px 0px 100px;float:left;"></i><span style="float:left;margin-left:10px">Connectez votre caméra pour voir l'image</span></p>
    </div>
<?php } else { ?>
    <div style="margin-left:230px;margin-top:60px">
    <iframe width="480" height="276" src="<?php echo base_url($channel.'/embed');?>" frameborder="0" allowfullscreen></iframe>
    </div>
<?php } ?>
			</div>
		</section>
		
		<section id="" class="module" style="color:#333">
			<div class="container" style="background: url('<?php echo base_url('assets/images/bg_archives.png');?>');background-size: 940px; background-repeat: no-repeat; background-position: center -20px;height:100%;font-size:15px">
    <div class="span8" style="margin-top:40px">
    <table class="table table-striped">
        <thead>
          <tr>
            <th style="text-align:center">ID</th>
            <th style="text-align:center">Date</th>
            <th style="text-align:center">Durée</th>
            <th style="text-align:center">Stats</th>
            <th style="text-align:center">Télécharger</th>
            <th style="text-align:center">Supprimer</th>
          </tr>
        </thead>
        <tbody>
        
<?php if ($archives!=null) { foreach ($archives as $row) { ?>
	 <tr>
            <td style="text-align:center"><?php echo $row['eventid'];?></td>
            <td style="text-align:center"><?php echo $row['startdate'];?></td>
            <td style="text-align:center"><?php echo $row['duration'];?> minutes</td>
            <td style="text-align:center"><?php echo $row['nbviewers'].($row['nbviewers']>1?' vues':' vue');?></td>
            <td style="text-align:center"><?php if($row['archive']=='') {?>pas d'archive<?php } else {?><a target="_blank"href="<?php echo $row['archive'];?>"><i class="icon-download-alt"></i></a><?php } ?></td>
            <td style="text-align:center"><a href="<?php echo base_url('delete/eventid/'.$row['eventid']);?>"><i class="icon-trash"></i></a></td>
        </tr>
<?php } } else if ($channel==''){?>
	 <tr>
            <td colspan="6">Connectez-vous ci dessus pour voir vos archives.</td>
        </tr>
<?php } else {?>
	 <tr>
            <td colspan="6">Pas d'archives.</td>
        </tr>
<?php } ?>
        </tbody>
      </table>
    </div>
    <div class="span1"></div>
    <div class="span3" style="margin-top:110px">
	    <p>Pour télécharger vos archives, faites un click droit sur le lien et sélectionner "Sauvegarder".</p><p>Pour voir les archives dans votre navigateur, faites un click simple.</p>
    </div>
				
				

			</div>
		</section>

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
	<div id="loginmodal" class="login modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="border:none">
		<div class="gr-modals">
			<div id="hp-auth-modal" class="showing" style="width:430px">
				<div id="hp-login" style="display: block;">
					<div class="form-title">
						<h2>Connexion:</h2>
						<a href="#" class="button button-close close-modal js-close-modal-trigger" data-dismiss="modal">
							<i class="icon-remove"></i>
						</a>
					</div>
					<div class="loginform">
						<div class="modal-body" style="padding:0px 34px 0px 34px">
							<div class="form-horizontal span4" style="margin-top:0px">
<?php echo form_open(base_url('app'), array('id' => 'loginform', 'class' => 'form-signin'));?>
				<label for="id_full_name">Email    <?php echo form_error('email'); ?>
<?php if ($wrong=='email') {?>
					<span>email non reconnu</span>
<?php } ?>
				</label>
				<input id="id_full_name" type="text" name="email" maxlength="255" value="<?php echo set_value('email'); ?>">
				<label for="password">Mot de passe <?php echo form_error('password'); ?>
<?php if ($wrong=='password') {?>
					<span>mot de passe invalide</span>
<?php } ?>
				</label>
					                <input type="password" id="password" name="password" maxlength="255">
					                <div class="row controls user-avatar">
						                <button type="submit" class="button-primary" style="margin-bottom: 0px;">Connexion</button>
						                <a href="https://lmal.tv/forgotpwd">Mot de passe oublié?</a>
						            </div>
						        </form>
						    </div>
						</div>
						<div class="switch-to" style="clear: both;padding: 22px 0 25px;border-top: 1px solid #e8e8e8;text-align: center;">
							<p style="font-size: 14px;color: #afafaf;">Vous n'avez <a href="#" class="showsignup">pas de compte</a>?</p>
						</div>
					</div>
					<div class="loginform" style="display:none">
						<div class="modal-body" style="padding:0px 34px 0px 34px">
							<div class="form-horizontal span4" style="margin-top:0px">
<?php echo form_open(base_url('getkey'), array('id' => 'loginform', 'class' => 'form-signin'));?>
									<label for="id_full_name">Email    				</label>
									<input id="id_full_name" type="text" name="email" maxlength="255" value="">
									<label for="id_name">Nom et prénom    				</label>
									<input id="id_name" type="text" name="channel" maxlength="255" value="">
									<label for="password">Mot de passe 				</label>
					                <input type="password" id="password" name="password" maxlength="255">
					                <div class="row controls user-avatar">
						                <button type="submit" style="margin-bottom: 0px;" class="button-primary">Valider</button>
						            </div>
						        </form>
						    </div>
						</div>
						<div class="switch-to" style="clear: both;padding: 22px 0 25px;border-top: 1px solid #e8e8e8;text-align: center;">
							<p style="font-size: 14px;color: #afafaf;">Vous avez déjà <a href="#" class="showsignup">un compte</a>?</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="embedinstructions" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="gr-modals">
			<div id="hp-auth-modal" class="showing">
				<div id="hp-login" style="display: block;">
					<div class="form-title">
						<h2>Intégrer le player LMAL.TV:</h2>
						<a href="#" class="button button-close close-modal js-close-modal-trigger" data-dismiss="modal">
							<i class="icon-remove"></i>
						</a>
					</div>
					<div class="modal-body">
						<p>Pour intégrer le player <i>live</i> de LMAL.TV sur votre site web,<br>collez ce code HTML:</p>
						<p><strong>Affichage en taille XL:</strong></p>
						<pre>&lt;iframe width="1024" height="576"<br>src="<?php echo base_url($channel.'/embed');?>"<br>frameborder="0" allowfullscreen&gt;&lt;/iframe&gt;</pre>
						<p><strong>Affichage en taille L:</strong></p>
						<pre>&lt;iframe width="853" height="480"<br>src="<?php echo base_url($channel.'/embed');?>"<br>frameborder="0" allowfullscreen&gt;&lt;/iframe&gt;</pre>
						<p><strong>Affichage en taille M:</strong></p>
						<pre>&lt;iframe width="640" height="360"<br>src="<?php echo base_url($channel.'/embed');?>"<br>frameborder="0" allowfullscreen&gt;&lt;/iframe&gt;</pre>
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
    <script src="<?php echo base_url('assets/js/bootstrap-timepicker.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.min.js');?>"></script>
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
	    
		$('#showhard').click(function(){
			$('#showhard').hide();
			$('#showsoft').show();
			$('#softdesc').hide();
			$('#harddesc').show();
			$('#camerabg').css('background-image','url(<?php echo base_url('assets/images/bg_connect_vidiu.png');?>)');
		});
		$('#showsoft').click(function(){
			$('#showsoft').hide();
			$('#showhard').show();
			$('#softdesc').show();
			$('#harddesc').hide();
			$('#camerabg').css('background-image','url(<?php echo base_url('assets/images/bg_connect.png');?>)');
		});

		$('.showsignup').click(function(){
			$('.loginform').toggle();
		});
<?php if (@$contact) {?>
	    $('#contactmodal').modal('show')
<?php } ?>
<?php if ($wrong!='' || $showlogin==true) {?>
	    $('#loginmodal').modal('show')
<?php } ?>
	    $('#timepicker1').timepicker({'showSeconds':false,'showMeridian':false,'defaultTime':false});
	    $('#datetimepicker4').datetimepicker({
	      pickTime: false
	    });

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