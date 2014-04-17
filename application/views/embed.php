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
        <script src="<?php echo base_url('assets/bootstrap/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('jwplayer/rJzmMi1pEeKBVyIACp8kUw.js');?>"></script>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src=".assets/js/html5shiv.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico');?>">    <!-- Fav and touch icons -->
</head>
<body screen_capture_injected="true" class="embed" style="background:#FFF">
	<div class="channelcontainer" style="width:100%">
		<div style="width:100%" class="relative">
				<div class="product-main">
					<div id="containerjw" style="display: none;"></div>
					<div id="poster">
						<div style="width:100%" id="image-preview-container">
							<img style="width:100%" src="<?php echo $poster;?>">
						</div>
					</div>
					<div class="product-information two-column">
						<h2 class="product-price" style="right:0px">
							<div class="channelstatus">
								<i class="countdown">...</i>
							</div>
						</h2>
					</div>
				</div> <!-- product main -->
		</div> <!-- /container -->
	</div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
    	function updateStatus()
    	{
	        $.getJSON(
	        '<?php echo base_url('metadatas/getchannelstatus/'.$channel);?>'+'/'+Math.floor(Math.random()*1000000),
	        function(json){}).success(function(json) { 
	        	//console.log(json);
		        //status
		        if (json.status=='live') {
			        if (!$('#containerjw').is(':visible')) {
					    jwplayer('containerjw').setup({
						    playlist: [{
						        sources: [{ 
							        file: '<?php echo $rtmp;?>',
						        },{
						            file: '<?php echo $m3u8;?>'
						        }]
						    }],
					        width: '100%',
					        aspectratio: '16:9',
							primary: 'flash',
							autostart:true,
							skin:'<?php echo base_url('jwplayer/skins/lmal.xml');?>',
					        abouttext:'LMAL.TV',
					        aboutlink:'<?php echo base_url();?>'
					    });
					    $('#containerjw').show();
				        $('#containerjw_wrapper').show();
					    $('#poster').hide();
					    $('.product-price').hide();
			        }
		        } else if ($('#containerjw').is(':visible')) {
				        $('#containerjw').hide();
				        $('#containerjw_wrapper').hide();
					    $('#poster').show();
					    $('.product-price').show();
		        }
		        
		        if (json.timebeforebegin_days>0) {
		        	var text = 'Prochaine retransmission le ';
		        	text+=json.nextevent_date;
		        	text+=' à ';
		        	text+=json.nextevent_time;
		        	$('.countdown').text(text);
		        } else if (json.timebeforebegin_hours>0) {
		        	var text = 'Prochaine retransmission dans ';
		        	text+=json.timebeforebegin_hours%24;
		        	text+=(json.timebeforebegin_hours%24 > 1) ? ' heures et ' : ' heure et ';
		        	text+=json.timebeforebegin%60;
		        	text+=(json.timebeforebegin%60 > 1) ? ' minutes' : ' minute';
		        	$('.countdown').text(text);
		        } else if (json.timebeforebegin>0) {
		        	var text = 'Prochaine retransmission dans ';
		        	text+=json.timebeforebegin%60;
		        	text+=(json.timebeforebegin%60 > 1) ? ' minutes' : ' minute';
		        	$('.countdown').text(text);
		        } else $('.product-price').hide();
	        });
	     }

		updateStatus();
		setInterval( "updateStatus()", 5000 );
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