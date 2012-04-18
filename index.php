<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<!--
    *******Replace These********
    ****************************
        <?php
			$analytics = "AnalyticsID";
			$height = "DocHeight";
			$appID = "FbAppID";
			$dlFilename = "dlFilename";
		?>
	****************************
    ****************************
-->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
		#container{width:810px; height:<?php echo $height; ?>px; margin:0 auto; overflow:hidden; position:relative;}
    </style>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/init.js"></script>
    <?php if($analytics != 'AnalyticsID' || $analytics != ''): ?>
    <script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', '<?php echo $analytics; ?>']);
		_gaq.push(['_trackPageview']);
		
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
    </script>
    <?php endif; ?>
</head>

<body>
<div id="fb-root"></div>
    
    <div id="container">
    
        <div id="theForm" class="well">
        <?php if (isset($_SESSION['g2dl'])):?>
            <div id="success">
                <h2>Thanks</h2>
                <a href="download.php?f=<?php echo $dlFilename;?>" class="btn btn-danger btn-large">Download Here</a>
            </div>
        <?php else:?> 
        	<div id="emailContainer">
                <input type="text" id="email" class="left" placeholder="email"/>
                <button id="emSub" class="btn btn-primary left">Submit</button>
            </div>
         <?php endif; ?>              
        </div>
    
    </div><!-- end container -->
    
    <script src="http://connect.facebook.net/en_US/all.js"></script>
    <script type="text/javascript">
		FB.init({
			appId  : '<?php echo $appID; ?>',
			status : true, // check login status
			cookie : true, // enable cookies to allow the server to access the session
			xfbml  : true  // parse XFBML
		});
		FB.Canvas.setSize({width:810,height:<?php echo $height; ?>});
    </script>

    <div class="modal fade" id="errorModal">
        <div class="modal-header" id="formError">
            <h3>Error</h3>
        </div>
        <div class="modal-body">
            <div class="left"><h3 id="errorDesc"></h3></div>
            <div id="closeButton" class="right"><a class="btn btn-danger" href="#">Close</a></div>
        </div>
    </div>
 
    <div id="fn"><?php echo $dlFilename;?></div>
</body>
</html>
<!--
    *******Add tab link*********
        https://www.facebook.com/dialog/pagetab?app_id=<?php echo $appID; ?>&next=http://facebook.com
    ****************************
-->