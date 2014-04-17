<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src=".assets/js/html5shiv.js"></script>
	<![endif]-->
</head>
<body>
  <div style="background:#efefe9;font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;color:#999999;font-size:16px;line-height:22px;padding:0;margin:0">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#fefdf8">
		  <tbody>
		  	<tr>
			  	<td align="left">&nbsp;</td>
			  	<td width="562">
				  	<img src="<?php echo base_url('assets/images/email_body_top_stripes.png');?>" style="margin:0 auto" width="100%" height="0">
				  	<img src="<?php echo base_url('assets/images/email_body_top.png');?>" style="display:block;margin:40px auto 0" width="562" height="12">
				  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  	<tbody>
					  		<tr>
						  		<td width="562" align="center" background="<?php echo base_url('assets/images/email_body_middle.png');?>" bgcolor="white" style="text-align:left">
							  		<table width="100%" border="0" cellspacing="0" cellpadding="20">
								  		<tbody>
								  			<tr>
									  			<td>
										  			<img align="center" src="<?php echo base_url('assets/images/header_logo.png');?>" style="margin:5px auto 0;display:block">
										  			<h4 style="color:#333;text-transform:none;text-align:center;font-weight:bold;font-size:18px;margin:0;border:15px white solid;background:white">Réinitialisez votre mot de passe</h4>
										  			<hr width="480" height="1" style="border:0;margin:5px auto 30px;background-color:#e8e8e8;min-height:1px">
										  			<p style="font-size:16px;line-height:27px;margin-top:0;margin-bottom:22px;margin-left:20px;margin-right:20px;color:#999999">Vous avez oublié votre mot de passe? Ca arrive. Cliquez sur le lien ci-dessous et choisissez-en un nouveau.</p>
										  			<p style="font-size:16px;line-height:27px;margin-top:0;margin-bottom:22px;margin-left:20px;margin-right:20px;color:#999999">
										  				<a style="color:white;display:block;text-align:center;font-weight:bold;background:#36a9ae;border:1px solid #4a8589;border-radius:4px;padding:12px 15px;text-decoration:none" href="<?php echo base_url($channel.'/activate/'.$token);?>" target="_blank">Réinitialiser mon mot de passe</a>
										  			</p>
										  			<p style="font-size:16px;line-height:27px;margin-top:0;margin-bottom:22px;margin-left:20px;margin-right:20px;color:#999999">Pour toute question, n'hésitez pas à nous contacter à <a href="mailto:support@lmal.tv">support@lmal.tv</a></p>
										  			<p></p>
										  		</td>
										  	</tr>
										 </tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<img src="<?php echo base_url('assets/images/email_body_bottom.png');?>" style="display:block;margin:0 auto" width="562" height="12">
					<p style="margin-top:30px;margin-bottom:30px;color:#999999;font-size:14px;text-align:center">LMAL.TV — Lyon, France </p>
				</td>
				<td align="right">&nbsp;</td>
			</tr>
		</tbody>
	</table>
</div>
</body>
</html>