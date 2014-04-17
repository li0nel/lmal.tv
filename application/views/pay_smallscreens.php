<?php
?>
<body class="payments payments-credit-card" id="payment-module" screen_capture_injected="true">
      	<div class="color-bar"></div>

	  <div id="container" class="contained" style="width: 600px;margin-left: auto;margin-right: auto;margin-top: 120px;">
	      <h1 style="font-size: 30px;font-weight: 900;">LMAL.TV - 1 ticket pour le channel "Cci Lyon"</h1>
	      <div id="creditcard">
    <section>
          <?php echo form_open(base_url($channel.'/pay/'.$eventidhash), array('id' => 'loginform', 'class' => 'edit_payment'));?>

      <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"><input name="_method" type="hidden" value="put"><input name="authenticity_token" type="hidden" value="A91dKm4DAnGwVg9FHBuxqVGoh9L3cyNfEzEte8YEwBg="></div>
        <input type="hidden" name="callback_token" value="c0561440c189f5ccaad84bd0a21a379c32a6a9a4ccca53a73b15b004b180d3e4">

        <input type="radio" name="test" id="payment-stripe" value="hop" checked="checked" style="display:none;">
        <input type="checkbox" id="user_terms_of_service" name="user[terms_of_service]" value="1" checked="checked" style="display:none;">
        <input type="hidden" name="user[email]" id="user_email" value="test@test.com">
        <input type="hidden" name="user[email_confirmation]" id="user_email_confirmation" value="test@test.com">

        <div class="stripe-fields">
          <div class="card-number">
            <label for="card-number">Numéro de carte</label>
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

        <footer style="padding-top: 20px;">
<fieldset class="submit-fields" style="width:100%;float:none;padding-bottom: 30px;border-bottom: 1px solid #ccc;">
            <input id="submit-btn" type="submit" name="commit" value="Payer" style="
    width: 120px;
    float: left;
">
            <h3 id="total-price" style="float: right;padding-left:0px;font-size: 16px;"><span style="font-weight: bold;">680€</span> Paiement total</h3>
          </fieldset>

          <div id="secure" style="text-align:center;margin-top: 30px;margin-bottom: 30px;">
            <i class="icon-lock"></i> Paiement par <span style="font-weight:bold">LMAL.TV</span>

          </div>

          <div class="cancel" style="text-align:center">
            <a href="<?php echo base_url($channel);?>" style="color:inherit;text-decoration:none">Annuler</a>
          </div>
        </footer>
</form>    </section>
	      </div>
  </div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('/assets/bootstrap/js/jquery.js');?>"></script>
  </body></html>