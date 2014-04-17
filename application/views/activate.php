<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>LMAL.TV - Diffusez vos évènements en HD</title>
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
<body screen_capture_injected="true" class="login">
	<div class="color-bar"></div>
    <div class="container">
<?php if ($result=='success') {?>
	    <div class="form-horizontal span8 offset2">
		    <img src="<?php echo base_url('assets/images/lmal7.png');?>"/>
			<h2 style="float:left;margin-left:20px">Votre mot de passe a été mis à jour!</h2>
            <a href="<?php echo base_url($channel);?>">
	            <button style="margin-top:12px;margin-left: 20px;" class="button-primary signup_button">
	            	<i class="icon-arrow-right"></i>
	            </button>
            </a>
<?php } else { ?>
	    <div class="form-horizontal span6 offset3">
		    <img src="<?php echo base_url('assets/images/lmal7.png');?>"/>
<?php	 echo form_open(base_url($channel.'/activate/'.$token), array('id' => 'loginform', 'class' => 'form-signin'));?>
	 			<h2>Choisissez un mot de passe:</h2>
	 			<label for="id_full_name">Mot de passe <?php echo form_error('password'); ?></label>
                <input id="id_full_name" type="password" name="password" maxlength="255" value="">
                <label for="password">Confirmez le mot de passe <?php echo form_error('passwordconf'); ?></label>
                <input type="password" id="password" name="passwordconf" maxlength="255">
                <div class="row controls user-avatar">
                	<button type="submit" class="button-primary">Valider</button>
                </div>
            </form>
<?php } ?>
        </div>
    </div> <!-- /container -->
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