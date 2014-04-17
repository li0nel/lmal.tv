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
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="../assets/js/html5shiv.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico');?>">
</head>
<body screen_capture_injected="true" class="login">
	<div class="color-bar"></div>
    <div class="container">
	    <div class="form-horizontal span4 offset4">
		    <img src="<?php echo base_url('assets/images/lmal7.png');?>"/>
<?php echo form_open(base_url('getkey'), array('id' => 'loginform', 'class' => 'form-signin'));?>
				<label for="id_full_name">Email    <?php echo form_error('email'); ?>
				</label>
				<input id="id_full_name" type="text" name="email" maxlength="255" value="<?php echo set_value('email'); ?>">
				<label for="id_channel">Nom et prénom   <?php echo form_error('channel'); ?>
				</label>
				<input id="id_channel" type="text" name="channel" maxlength="255" value="<?php echo set_value('channel'); ?>">
				<label for="password">Mot de passe <?php echo form_error('password'); ?>
				</label>
                <input type="password" id="password" name="password" maxlength="255">
                <div class="row controls user-avatar">
                	<button type="submit" class="button-primary">Valider</button>
                </div>
            </form>
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