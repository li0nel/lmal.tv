<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
    <!-- Le styles -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/style.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/font-awesome.min.css');?>" rel="stylesheet">
	<script src="<?php echo base_url('jwplayer/jwplayer.js');?>"></script>
	<script>jwplayer.key="z85kJxIwqqk1YoY0yqu8JDQ4EdFUl1bwcQEX+WH6LhE="</script>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src=".assets/js/html5shiv.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico');?>">    <!-- Fav and touch icons -->
</head>
<body screen_capture_injected="true" class="embed" style="background:#FFF">
	<div class="channelcontainer" style="width:<?php echo $width;?>px">
		<div style="width:<?php echo $width;?>px;height:<?php echo $height;?>px" class="relative">
				<div class="product-main pay">
<div class="gr-modals" id="payment-module">
									<div id="hp-auth-modal" style="max-width:1024px;height:100%" class="showing">
										<div id="hp-login" style="display: block;">
											<div class="form-title">
												<h2>L'accès à cette retransmission est payant:</h2>
												
											</div>
											<div class="modal-body">
												<div id="cart" style="width:45%">
													<p>1 accès à cette retransmission en direct, le 27/06/2013 à 21h00</p>
													<p>Vous recevrez un email de confirmation, avec un code d'accès personnel vous permettant de voir ce direct sur un autre ordinateur, sans repayer.</p>
													<a href="#" class="button button-embed button-plain close-modal smallscreenonly">
														<i class="icon-shopping-cart"></i>Continuer
													</a>
													
												</div>
												<div id="creditcard" style="width:45%;float:right">
													<section>
														<form action="https://lmal.tv/ccilyon/pay/eventid/6WZZA" method="post" accept-charset="utf-8" id="loginform" class="edit_payment">
												        	<input type="radio" name="test" id="payment-stripe" value="hop" checked="checked" style="display:none;">
													        
														<label for="id_full_name">Votre email:</label>
														<input id="id_full_name" type="text" name="email" maxlength="255" value="">
														<label for="password" style="margin-top:20px">Confirmez votre email:</label>
														<input type="password" id="password" name="password" maxlength="255">
													
															<footer>
																<fieldset class="submit-fields" style="
    margin-top: 15px;
">
																	<a id="submit-btn" href="#" onclick="$(this).closest('form').submit()" class="button button-embed button-plain" style="
    float: left;
">Valider <i class="icon-arrow-right"></i></a>
																	<h4 id="total-price" style="
    float: right;
">
																		<span style="font-weight: bold;">
																		<span id="amount_cmd">3</span>€</span> Paiement total
																	</h4>
																</fieldset>
																
															</footer>
														</form>
													</section>
												</div>
											</div>
										</div>
									</div>
								</div>					</div>
				</div> <!-- product main -->
		</div> <!-- /container -->
	</div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/bootstrap/js/jquery.js');?>"></script>
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