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
	<link type="text/css" rel="stylesheet" href="chrome-extension://cpngackimfmofbokmjmljamhdncknpmg/style.css">
	<script type="text/javascript" charset="utf-8" src="chrome-extension://cpngackimfmofbokmjmljamhdncknpmg/page_context.js"></script>
</head>
<body screen_capture_injected="true" class="embed" style="background:#FFF">
	<div class="channelcontainer" style="width:<?php echo $width;?>px">
		<div style="width:<?php echo $width;?>px;height:<?php echo $height;?>px" class="relative">
				<div class="product-main">
					<div id="containerjw" style="display: none;"></div>
					<div id="poster">
						<div style="width:<?php echo $width;?>px;height:<?php echo $height;?>px" id="image-preview-container">
							<img style="width:<?php echo $width;?>px;height:<?php echo $height;?>px" src="<?php echo $poster;?>">
						</div>
					</div>
					<div class="product-information two-column">
<?php if ($formatteddate=='') {?>
						<h2 class="product-price" style="right:0px">
							<div class="channelstatus">
								<i class="countdown">La date de cet évènement n'est pas encore déterminée</i>
							</div>
						</h2>
<?php } else if ($status=='finished') {?>
						<h2 class="product-price" style="right:0px">
							<i class="countdown">Cet évènement en direct est maintenant terminé</i>
						</h2>
							<a href="#" id="replay" style="font-weight:bold" class="button button-stream button-plain button-small"><i class="icon-play" style="margin-right:8px"></i>Lire</a>
							<a href="#" id="dl" style="font-weight:bold" class="button button-stream button-plain button-small"><i class="icon-download-alt" style="margin-right:8px"></i>Télécharger</a>
<?php } else if ($status=='upcoming') {?>
						<h2 class="product-price" style="right:0px">
							<i class="countdown">...</i>
						</h2>
<?php } ?>
					</div>
				</div> <!-- product main -->
		</div> <!-- /container -->
	</div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/bootstrap/js/jquery.js');?>"></script>
    <script type="text/javascript">
    	function updateStatus()
    	{
	        $.getJSON(
	        '<?php echo base_url('metadatas/eventid/'.$eventidhash.'/');?>'+'/'+Math.floor(Math.random()*1000000),
	        function(json){}).success(function(json) { 
	        	//console.log(json);
		        //$('#nbviewers').text(json.stats);
		        //if (json.stats>1)
		        //	$('#viewers').text('spectateurs');
		        //else
	   	        //	$('#viewers').text('spectateur');
	   	        	
		        if (json.startdate=='0000-00-00 00:00:00') {
		        } else if (json.timebeforebegin_days>0) {
		        	var text = 'Démarrage dans ';
		        	text+=json.timebeforebegin_days;
		        	text+=(json.timebeforebegin_days == 1) ? ' jour, ' : ' jours, ';
		        	text+=json.timebeforebegin_hours%24;
		        	text+=(json.timebeforebegin_hours%24 > 1) ? ' heures et ' : ' heure et ';
		        	text+=json.timebeforebegin%60;
		        	text+=(json.timebeforebegin%60 > 1) ? ' minutes' : ' minute';
		        	$('.countdown').text(text);
		        } else if (json.timebeforebegin_hours>0) {
		        	var text = 'Démarrage dans ';
		        	text+=json.timebeforebegin_hours%24;
		        	text+=(json.timebeforebegin_hours%24 > 1) ? ' heures et ' : ' heure et ';
		        	text+=json.timebeforebegin%60;
		        	text+=(json.timebeforebegin%60 > 1) ? ' minutes' : ' minute';
		        	$('.countdown').text(text);
		        } else if (json.timebeforebegin>0) {
		        	var text = 'Démarrage dans ';
		        	text+=json.timebeforebegin%60;
		        	text+=(json.timebeforebegin%60 > 1) ? ' minutes' : ' minute';
		        	$('.countdown').text(text);
		        } else if (json.timebeforeend<=0) {
		        	$('.countdown').text('Cet évènement en direct est maintenant terminé');
<?php if ($status=='onair') {?>
	if ($('#containerjw').is(':visible')) location.reload();
<?php } ?>
		        } else if (json.timebeforebegin<=0) {
		        	$('.countdown').text('Cet évènement en direct est démarré depuis '+Math.abs(json.timebeforebegin)+' minutes');
	
		        	//refresh if not done
		        	if (!$('#containerjw').is(':visible')) location.reload();
		        }
	        });
	     }
<?php if ($status=='onair') {?>
	    jwplayer('containerjw').setup({
	    file: '<?php echo $m3u8;?>',
	        width: '<?php echo $width;?>',
	        height: '<?php echo $height;?>',
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
	    $('#poster').hide();
<?php } else if ($status=='upcoming') {?>
        $('#containerjw').hide();
	    $('#poster').show();
<?php } else if ($url!=''){?>
		//handle replay here
  	    jwplayer('containerjw').setup({
	    file: '<?php echo $url;?>',
	        width: '<?php echo $width;?>',
	        height: '<?php echo $height;?>',
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