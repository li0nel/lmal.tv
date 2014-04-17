<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
	<title>LMAL.TV - Diffusez vos conférences en direct</title>
    <!-- Le styles -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css');?>" rel="stylesheet">
	<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.4/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet">
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
	<link type="text/css" rel="stylesheet" href="chrome-extension://cpngackimfmofbokmjmljamhdncknpmg/style.css">
	<script type="text/javascript" charset="utf-8" src="chrome-extension://cpngackimfmofbokmjmljamhdncknpmg/page_context.js"></script>
</head>
<body screen_capture_injected="true" class="bridges" id="product_page">
	<div class="color-bar"></div>
	<div class="channelcontainer">
		<div id="sharing">
			<a href="#facebookmodal" data-toggle="modal" role="button"  class="facebook_share button button-social-facebook button-w-i button-plain button-small">
				<i class="icon-facebook"></i><span class="btntxt">Exporter vers </span><span class="btntxt_960">Facebook</span>
			</a>
			<a href="#embedinstructions" data-toggle="modal" class="button button-embed button-plain button-small">
				<i class="icon-code"></i>Intégrer<span class="btntxt"> sur votre site web</span></a>
			<a href="#publishingmodal" data-toggle="modal" role="button" class="button button-stream button-plain button-small">
				<i class="icon-facetime-video"></i>Diffuser!
			</a>
<?php if ($paid==0) {?>
			<a href="#paymodal" data-toggle="modal" role="button" class="button button-pay button-plain button-small">
				<i class="icon-shopping-cart"></i>Payer
			</a>				
<?php } else {?>
			<a href="#paymodal" data-toggle="modal" role="button" class="button button-pay button-plain button-small paid">
				<i class="icon-ok"></i>Payé
			</a>
<?php } ?>

			<a href="#statsmodal" data-toggle="modal" role="button" class="button button-stats button-plain button-small">
				<i class="icon-bar-chart"></i><span class="btntxt_960">Stats</span>
			</a>
			<a href="#ticketingmodal" data-toggle="modal" role="button" class="button button-tickets button-plain button-small">
				<i class="icon-eur"></i><span class="btntxt_960">Billeterie</span>
			</a>
			<div class="btn-group">
			  <a class="dropdown-toggle button button-plain button-small button-archives" data-toggle="dropdown" href="#" style="background-color: #333;margin-top:-1px;border: 1px solid #333;">
			  	<i class="icon-save"></i><span class="btntxt_960">Archives</span><span class="caret" style="margin-top: 7px;border-top: 4px solid #FFF;
border-right: 4px solid transparent;border-left: 4px solid transparent;margin-left:5px"></span>
			  </a>
			  <ul class="dropdown-menu">
<?php foreach ($archives as $event) {?>
				  <li><a href="<?php echo base_url($channel.'/'.$event['eventidhash']);?>"><?php echo $event['title'];?> (<?php echo $event['startdate'];?>)</a></li>
<?php } ?>
			  </ul>
			</div>
		</div>
		<div id="channel_login">
			<a href="<?php echo base_url('logout');?>">Déconnexion</a>
		</div>
<?php if ($uploaderror!='') {?>
		<div class="alert alert-error">
			<button style="top: 2px;" type="button" class="close" data-dismiss="alert">&times;</button>
			<i class="icon-warning-sign" style="font-size:26px;margin-right:10px"></i><strong><?php echo $uploaderror;?></strong>
		</div>
<? } ?>

		<div class="relative">
			<div class="product">
				<div class="product-main">
					<div id="containerjw" style="display: none;"></div>
					<div id="posterupload">
<?php if ($status!='onair') {?>
						<form action="<?php echo base_url('metadatas/eventid/'.$eventidhash.'/poster');?>" method="post" accept-charset="utf-8" id="posterform" enctype="multipart/form-data" class="form-search redonhover">
							<input type="file" id="poster" name="userfile" size="20" style="width:0;height:0;position: fixed; top: -100px; left: -100px;">
						</form>
<?php } ?>
					</div>
					<div id="poster">
						<div id="image-preview-container">
							<img id="posterimg" src="<?php echo $poster;?>">
						</div>
					</div>
					<div class="product-information two-column">
<?php if ($formatteddate=='') {?>
						<h2 class="product-price" style="display:none">
							<i class="countdown"></i>
<?php if ($nbevents>1) {?>
							<a href="<?php echo base_url('delete/'.$eventidhash);?>" onClick="return confirm('Etes-vous sûr(e) de vouloir supprimer cette conférence?');" class="button button-stream button-plain button-small" data-description="" data-message="" data-name="" data-preview="" data-url="" style="margin-left:15px;margin-top:-5px;font-weight:bold;float:left"><i class="icon-trash" style="margin-right:8px;font-weight:bold"></i>Annuler</a>
<?php } ?>
						</h2>
<?php } else if ($status=='finished') {?>
						<h2 class="product-price">
							<i class="countdown">Cette conférence en direct est maintenant terminée</i>
				<a href="<?php echo base_url($channel.'/new');?>" class="button button-stream button-plain button-small" data-description="" data-message="" data-name="" data-preview="" data-url="" style="float:left;margin-left:15px;margin-top:-5px;font-weight:bold">
					<i class="icon-plus" style="margin-right:8px"></i>Nouvel évènement</a>
						</h2>
<?php } else if ($status=='upcoming') {?>
						<h2 class="product-price">
							<i class="countdown">...</i>
<?php if ($paid==0 && $nbevents>1) {?>
								<a href="<?php echo base_url('delete/'.$eventidhash);?>" onClick="return confirm('Etes-vous sûr(e) de vouloir supprimer cette conférence?');"  class="button button-stream button-plain button-small" data-description="" data-message="" data-name="" data-preview="" data-url="" style="margin-left:15px;margin-top:-5px;font-weight:bold;float:left"><i class="icon-trash" style="margin-right:8px;font-weight:bold"></i>Annuler</a>
<?php } ?>
						</h2>
<?php } ?>
						<div class="product-content">
							<div class="description-container">
								<h1 class="edittitle">
									<a href="#" id="title" data-emptytext="(cliquez pour éditer)" data-type="text" data-pk="1" data-url="<?php echo base_url('metadatas/eventid/'.$eventidhash);?>" data-original-title="(cliquez pour éditer)"><?php echo ucfirst($title);?></a>
								</h1>
								<blockquote class="product-description">
									<p class="editdescription">
										<a href="#" id="description" data-type="textarea" data-pk="1" data-url="<?php echo base_url('metadatas/eventid/'.$eventidhash);?>" data-original-title="(cliquez pour éditer)" data-emptytext="(cliquez pour éditer)"><?php echo nl2br(ucfirst($description));?></a>
									</p>
								</blockquote>
							</div>
							<div class="want-container">
								<button class="button disabled" disabled="disabled" id="buy">Accès gratuit</button>
								<div class="product-info">
									<h4>
										Vous aurez l'accès complet à cette diffusion en HD, sur tout ordinateur ou tablette.
									</h4>
									<ul>
										<li><span>Date</span>
											<strong>
												<p class="editdate">
													<a href="#" id="date" data-type="combodate" data-pk="1" data-url="<?php echo base_url('metadatas/eventid/'.$eventidhash);?>" data-value="<?php echo $formatteddate;?>" data-format="DD-MM-YYYY" data-emptytext="(cliquez pour éditer)" data-template="D MMM YYYY" data-original-title="Select date"><?php echo $formatteddate;?></a>
												</p>
											</strong>
										</li>
										<li><span>Heure</span>
											<strong>
												<p class="edittime">
													<a href="#" id="time" data-emptytext="(cliquez pour éditer)"  data-type="combodate" data-pk="1" data-url="<?php echo base_url('metadatas/eventid/'.$eventidhash);?>" data-value="<?php echo $formattedhour;?>" data-format="HH:mm" data-template="HH:mm" data-original-title="Select time"><?php echo $formattedhour;?></a>
												</p>
											</strong>
										</li>
										<li><span>Durée</span>
											<strong>
												<p  class="editduration">
													<a href="#" data-emptytext="(cliquez pour éditer)" id="duration" data-type="select" data-pk="1" data-url="<?php echo base_url('metadatas/eventid/'.$eventidhash);?>" data-value="<?php echo $duration;?>" data-original-title="Select time"><?php echo $duration.(intval($duration)>1?' heures':' heure');?></a>
												</p>
											</strong>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- product main -->
				<div class="seller-main">
					<span id="seller-arrow"></span>
					<div style="position:relative">
						<div id="avatarupload" class="redonhover">
							<form action="<?php echo base_url('metadatas/channel/'.$channel.'/picture');?>" method="post" accept-charset="utf-8" id="pictureform" enctype="multipart/form-data" class="form-search">
								<input type="file" id="picture" name="userfile" size="20" style="position: fixed; top: -100px; left: -100px;">
							</form>
						</div>
						<img alt="Profile picture" id="profile_picture" src="<?php echo $picture;?>">
					</div>
					<h2 class="editname">
						<a href="#" id="name" data-emptytext="(cliquez pour éditer)" data-type="text" data-pk="1" data-url="<?php echo base_url('metadatas/channel/'.$channel);?>" data-original-title="Votre nom (cliquez pour éditer)"><?php echo ucfirst($ownername);?></a>
					</h2>
					<div id="bio">
						<p class="editbio">
							<a href="#" id="userbio" data-type="textarea" data-pk="1" data-url="<?php echo base_url('metadatas/channel/'.$channel);?>" data-emptytext="(cliquez pour éditer)" data-original-title="(cliquez pour éditer)"><?php echo nl2br(ucfirst($ownerbio));?></a>
						</p>
					</div>
				</div>
			</div>
			<div id="powered-by-footer">
				<a href="<?php echo base_url('terms');?>" class="security-link" target="_blank">CGV</a> — <a href="http://blog.lmal.tv" class="security-link" target="_blank">BLOG</a> — Powered by  <a href="<?php echo base_url();?>" target="_blank">LMAL.TV</a>
			</div>
		</div> <!-- /container -->
	</div>
	
	<!-- Modal -->
	<div id="publishingmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="gr-modals">
			<div id="hp-auth-modal" class="showing">
				<div id="hp-login" style="display: block;">
					<div class="form-title">
						<h2>Publier sur votre chaîne LMAL.TV:</h2>
						<a href="#" class="button button-close close-modal js-close-modal-trigger" data-dismiss="modal">
							<i class="icon-remove"></i>
						</a>
					</div>
					<div class="modal-body">
						<p>Pour publier sur votre chaîne LMAL.TV</p>
						<ol style="list-style:decimal">
							<li>Branchez votre caméra à votre ordinateur</li>
							<li>Démarrez votre logiciel de streaming (par exemple <a target="_blank" href="http://www.adobe.com/products/flash-media-encoder.html">Adobe Flash Media Live Encoder</a>)</li>
							<li>Connectez le logiciel à votre compte LMAL.TV avec:</li>
						</ol>
						<pre><b>URL:</b> rtmp://push.lmal.tv/live<br><b>Streamname:</b> <?php echo $streamkey;?></pre>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="welcomemodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="gr-modals">
			<div id="hp-auth-modal" class="showing">
				<div id="hp-login" style="display: block;">
					<div class="form-title">
						<h2>Bienvenue sur votre tableau de bord LMAL.TV :-)</h2>
					</div>
<div class="modal-body">
						<p>Personnalisez votre player ici:</p>
						<ol style="list-style:decimal">
							<li>Téléchargez l'<strong>affiche</strong> de votre prochaine conférence</li>
							<li>Définissez un <strong>titre</strong>, une <strong>description</strong>, puis une <strong>date</strong> pour activer le compte à rebours</li>
							<li>Eventuellement, testez le player en mode gratuit (un watermark apparaîtra dans l'image)</li>
							<li>Payez pour supprimer le watermark avant la date de votre conférence</li>
						</ol>
<p>Si vous préférez ne pas intégrer le player à votre site web, nous vous avons généré <strong>une page dédiée</strong> sur laquelle apparaîtront vos conférences: <strong><i><?php echo base_url($channel);?></i></strong></p>
						<a href="#" class="button button-embed button-plain close-modal js-close-modal-trigger" data-dismiss="modal" style="margin-top:10px;margin-left: 180px;">Continuer <i class="icon-arrow-right"></i></a>
					</div>				</div>
			</div>
		</div>
	</div>
	<div id="embedinstructions" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
						<p>Pour intégrer le player <i>live</i> de LMAL.TV sur votre site web,<br/>collez ce code HTML:</p>
						<p><strong>Affichage en taille XL:</strong></p>
						<pre>&lt;iframe width="1024" height="576"<br/>src="https://www.lmal.tv/<?php echo $channel;?>/embed"<br/>frameborder="0" allowfullscreen&gt;&lt;/iframe&gt;</pre>
						<p><strong>Affichage en taille L:</strong></p>
						<pre>&lt;iframe width="853" height="480"<br/>src="https://www.lmal.tv/<?php echo $channel;?>/embed/large"<br/>frameborder="0" allowfullscreen&gt;&lt;/iframe&gt;</pre>
						<p><strong>Affichage en taille M:</strong></p>
						<pre>&lt;iframe width="640" height="360"<br/>src="https://www.lmal.tv/<?php echo $channel;?>/embed/medium"<br/>frameborder="0" allowfullscreen&gt;&lt;/iframe&gt;</pre>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="facebookmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="gr-modals">
			<div id="hp-auth-modal" class="showing">
				<div id="hp-login" style="display: block;">
					<div class="form-title">
						<h2>Exporter vers Facebook:</h2>
						<a href="#" class="button button-close close-modal js-close-modal-trigger" data-dismiss="modal">
							<i class="icon-remove"></i>
						</a>
					</div>
					<div class="modal-body">
<p>Pour intégrer le player à l'une de vos pages Facebook, cliquez sur "Continuer". Cela ajoutera un onglet à votre page Facebook, dans lequel votre player LMAL sera automatiquement intégré.</p>
<p>Si vous voulez supprimer l'onglet LMAL de votre page Facebook, utilisez le menu "Paramètres" dans l'interface Facebook.</p>
						<a href="https://www.facebook.com/dialog/pagetab?app_id=539471056115540&redirect_uri=<?php echo base_url('fb/return_tab');?>" class="button button-social-facebook button-plain" style="margin-top:10px;margin-left: 180px;">Continuer <i class="icon-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="statsmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="gr-modals">
			<div id="hp-auth-modal" class="showing">
				<div id="hp-login" style="display: block;">
					<div class="form-title">
						<h2>Statistiques:</h2>
						<a href="#" class="button button-close close-modal js-close-modal-trigger" data-dismiss="modal">
							<i class="icon-remove"></i>
						</a>
					</div>
					<div class="modal-body">
						<p id="nostats">Les statistiques apparaîtront dès le démarrage de la conférence.</p>
						<div style="display:none;margin-top:20px;height:232px;text-align:center;" id="stats_chart_container">
							<div id="stats_chart">
								<h4 style="padding-top:100px;font-size:25px">Pas d'historique</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="ticketingmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="gr-modals">
			<div id="hp-auth-modal" class="showing">
				<div id="hp-login" style="display: block;">
					<div class="form-title">
						<h2>Faire payer l'accès à votre conférence:</h2>
						<a href="#" class="button button-close close-modal js-close-modal-trigger" data-dismiss="modal">
							<i class="icon-remove"></i>
						</a>
					</div>
					<div class="modal-body">
						<p>Pour <strong>activer l'accès payant</strong> à votre conférence, écrivez à <i>philippe@lmal.tv</i> en précisant:</p>
						<ul style="list-style:initial">
							<li>le <strong>prix d'accès</strong> à votre diffusion en direct</li>
							<li>informations sur vous: <strong>nom</strong>, <strong>prénom</strong>, <strong>scan d'une pièce d'identité</strong></li>
							<li>informations sur votre entreprise: <strong>raison sociale</strong>, <strong>SIRET</strong></li>
							<li>un <strong>RIB</strong> pour percevoir le résultat des ventes</li>
						</ul>
						<p>L'activation de la billeterie est gratuite.<br/>La commission de LMAL sur chaque vente est de 8%.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="paymodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="gr-modals" id="payment-module">
			<div id="hp-auth-modal" class="showing">
				<div id="hp-login" style="display: block;">
					<div class="form-title">
						<h2>Votre commande:</h2>
						<a href="https://lmal.tv/monpremierchannel#" class="button button-close close-modal js-close-modal-trigger" data-dismiss="modal">
							<i class="icon-remove"></i>
						</a>
					</div>
					<div class="modal-body">
						<div id="cart">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th style="width:10%">Qté</th>
										<th style="width:55%">Description</th>
										<th style="width:15%;text-align:right">PU HT</th>
										<th style="width:20%;text-align:right">Total HT</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><span id="hours_cmd">1</span></td>
										<td><span id="nothingtopayfor" style="color:#D44012;">Vous n'avez pas sélectionné une date et une durée<br/>pour votre prochaine conférence.</span><span id="thingstopayfor" style="display:none">1 heure de retransmission en direct<br/>Date: <span id="date_cmd">27/06/2013</span><br/>Heure: <span id="time_cmd">12h30</span></span></td>
										<td style="text-align:right">340€</td>
										<td style="text-align:right"><span class="amount_cmd">340</span>€</td>
									</tr>
								</tbody>
							</table>
<?php if ($paid==0) {?>
							<p><small>Vous pourrez modifier la date et l'heure même après le paiement, jusqu'au démarrage de la conférence.</small></p>
							<p><small>Vous ne pourrez plus modifier la durée.</small></p>
							<p><small>Pour régler cette facture et/ou réserver ce créneau horaire, demandez notre RIB à <i>philippe@lmal.tv</i></small></p>
<?php } else {?>
<p class="ty">Facture réglée. Merci pour votre paiement<br/>Demandez votre reçu à <i>philippe@lmal.tv</i><p>
<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/bootstrap/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-dropdown.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-transition.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-modal.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-alert.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-button.js');?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-filestyle.min.js');?>"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.4/bootstrap-editable/js/bootstrap-editable.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>
    <script type="text/javascript">
	    $.fn.editable.defaults.mode = 'inline';
	    $('#title').editable();
	    $('#description').editable();
	    $('#name').editable();
	    $('#userbio').editable();
<?php if ($status=='upcoming') {?>
	    $('#date').on('save', function(e, params) {updateStatus(); updateBill();});
	    $('#date').editable();
	    $('#time').on('save', function(e, params) {updateStatus(); updateBill();});
	    $('#time').editable();
	    $('#duration').editable({
	    	value: <?php echo $duration;?>,    
	        source: [
	              {value: 1, text: '1 heure'},
	              {value: 2, text: '2 heures'},
	              {value: 3, text: '3 heures'},
	              {value: 4, text: '4 heures'},
	              {value: 5, text: '5 heures'},
	              {value: 6, text: '6 heures'},
	              {value: 7, text: '7 heures'},
	              {value: 8, text: '8 heures'},
	              {value: 9, text: '9 heures'},
	              {value: 10, text: '10 heures'}                                         
	           ]});
	    $('#duration').on('save', function(e, params) {updateBill();});

<?php } ?>	
			$(":file").filestyle({ 
				textField: false
			});
			$("#picture").change(function() {
				$('#pictureform').submit();
			});
			$("#poster").change(function() {
				$('#posterform').submit();
			});
			$('#pictureform .btn').removeClass('btn').css({ 'opacity' : 0 }).css({'width':'128px'}).css({'height':'128px'});
			$('#posterform .btn').removeClass('btn').css({ 'opacity' : 0 }).css({'width':'1024px'}).css({'height':'576px'});
    </script>
    <script type="text/javascript">    	
	    function updateStats(jsonData)
	    {
            var data = new google.visualization.DataTable();
            data.addColumn('datetime', 'Date');
            data.addColumn('number', 'Spectateurs');

            var tideTimes = [];
			$.each(jsonData.list, function(i, obj) {
			    tideTimes.push([new Date(obj.epoch), obj.viewers]);
			});
			

/*            var tideTimes = [
                [new Date(1365439465000), 3],
                [new Date(1365439475000), 6],
                [new Date(1365439485000), 13],
                [new Date(1365439495000), 11],
                [new Date(1365439505000), 16],
                [new Date(1365439515000), 15],
                [new Date(1365439525000), 15],
                [new Date(1365439535000), 14],
                [new Date(1365439545000), 10],
                [new Date(1365439555000), 7],
                [new Date(1365439565000), null],
                [new Date(1365439575000), null],
                [new Date(1365439585000), null],
                [new Date(1365439595000), null],
                [new Date(1365439605000), null],
                [new Date(1365439615000), null],
                [new Date(1365439625000), 0],
                        ];
            data.addRows(tideTimes);
*/
            data.addRows(tideTimes);
            var options = {
                smoothLine: true,
                width: 490,
                height: 250,
                legend:'none',
                vAxis:{format:'#',minValue:0,maxValue:10},
                hAxis:{format:"H'h'mm",gridlineColor:'#f9fafc'},
                interpolateNulls:'false',
                series:[{color: '#D44012', visibleInLegend: false,lineWidth:'3'}],
                chartArea: {width: '450', height: '200'},
                backgroundColor:'#fff'
            };

            var chart = new google.visualization.LineChart(document.getElementById('stats_chart'));
            chart.draw(data, options);
    }

    	function updateStatus()
    	{
	        $.getJSON(
	        '<?php echo base_url('metadatas/eventid/'.$eventidhash);?>/'+Math.floor(Math.random()*1000000),
	        function(json){}).success(function(json) { 
	        	//console.log(json);
		        //$('#nbviewers').text(json.stats);
		        //if (json.stats>1)
		        //	$('#viewers').text('spectateurs');
		        //else
	   	        //	$('#viewers').text('spectateur');
	   	        	
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
		        	$('.product-price').show();
		        } else if (json.timebeforebegin_hours>0) {
		        	var text = 'Cette conférence en direct démarrera dans ';
		        	text+=json.timebeforebegin_hours%24;
		        	text+=(json.timebeforebegin_hours%24 > 1) ? ' heures et ' : ' heure et ';
		        	text+=json.timebeforebegin%60;
		        	text+=(json.timebeforebegin%60 > 1) ? ' minutes' : ' minute';
		        	$('.countdown').text(text);
		        	$('.product-price').show();
		        } else if (json.timebeforebegin>0) {
		        	var text = 'Cette conférence en direct démarrera dans ';
		        	text+=json.timebeforebegin%60;
		        	text+=(json.timebeforebegin%60 > 1) ? ' minutes' : ' minute';
		        	$('.countdown').text(text);
		        	$('.product-price').show();
		        } else if (json.timebeforeend<=0) {
		        	$('.countdown').text('Cette conférence en direct est maintenant terminé');
<?php if ($status=='onair') {?>
	if ($('#containerjw').is(':visible')) location.reload();
<?php } ?>
		        	$('.product-price').show();
		        } else if (json.timebeforebegin<=0) {
		        	$('.countdown').text('Cette conférence en direct est démarré depuis '+Math.abs(json.timebeforebegin)+' minutes');
	
		        	//refresh if not done
		        	if (!$('#containerjw').is(':visible')) location.reload();
		        }
		        
		        if (json.stats_chart.list != null) {
			        updateStats(JSON.parse(json.stats_chart));
			        $('#stats_chart_container').show();
			        $('#nostats').hide();
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
	    $('#posterimg').hide();
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
		skin:'<?php echo base_url('jwplayer/skins/lmal.xml');?>',
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
    
<?php if ($show_welcomemodal) {?>
	$('#welcomemodal').modal('show');
<?php } ?>
<?php if ($show_paymentmodal) {?>
	$('#paymodal').modal('show');
<?php } ?>

	$('#ipaybycb').click(function() {
		$('#cart').hide();
		$('#creditcard').show();
	});
	$('#ipaybywt').click(function() {
		$('#cart').hide();
		$('#wiretransfer').show();
	});
   	$('.otheroption').click(function(){$('.paymentoption').toggle();});
   	$('.gotobill').click(function(){$('.paymentoption').hide();$('#cart').show();});

	function updateBill() {
        $.getJSON(
	        '<?php echo base_url($channel.'/pay/'.$eventidhash.'/json');?>'+'/'+Math.floor(Math.random()*1000000),
	        function(json){}).success(function(json) { 
	        //console.log(json);
		        $('#date_cmd').text(json.date);
		        $('#time_cmd').text(json.time);
		        $('#hours_cmd').text(json.duration);
		        $('.amount_cmd').text(json.amount);
		        
		        if (json.duration==0) {
			        $('#nothingtopayfor').show();
			        $('#thingstopayfor').hide();
		        } else if (json.duration>1){
			        $('#nothingtopayfor').hide();
			        $('#thingstopayfor').show();
			        $('#hours_txt').text('heures');
		        } else {
			        $('#nothingtopayfor').hide();
			        $('#thingstopayfor').show();
			        $('#hours_txt').text('heure');
		        }		   	
		   });
	}

	$('#paymodal').on('show', function () {updateBill();});

	$("input.numeric").keypress(function (e) {
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	     return false;
    }
    });
    var request;
    $("#paymentform").submit(function(event){
	    // abort any pending request
	    if (request) {
	        request.abort();
	    }
	    // setup some local variables
	    var $form = $(this);
	    // let's select and cache all the fields
	    var $inputs = $form.find("input");
	    // serialize the data in the form
	    var serializedData = $form.serialize();
	
	    // let's disable the inputs for the duration of the ajax request
	    $inputs.prop("disabled", true);
	
	    // fire off the request to /form.php
	    request = $.ajax({
	        url: "<?php echo base_url($channel.'/pay/'.$eventidhash);?>",
	        type: "post",
	        data: serializedData
	    });
	
	    // callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
	        // log a message to the console
//	        console.log("Hooray, it worked!");
			location.reload();
	    });
	
	    // callback handler that will be called on failure
	    request.fail(function (jqXHR, textStatus, errorThrown){
	        // log the error to the console
	        console.error(
	            "The following error occured: "+
	            textStatus, errorThrown
	        );
	    });
	
	    // callback handler that will be called regardless
	    // if the request failed or succeeded
	    request.always(function () {
	        // reenable the inputs
	        $inputs.prop("disabled", false);
	    });
	
	    // prevent default posting of form
	    event.preventDefault();
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