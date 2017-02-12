<?php
require_once('./lib/pageTemplate.php');
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php if(isset($TPL->pageTitle)){echo $TPL->pageTitle; } ?></title>
	<?php if(isset($TPL->ContentHead)){ include $TPL->ContentHead; }?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

	<?php 
		if(isset($TPL->cssFiles) && !empty($TPL->cssFiles)){
			foreach($TPL->cssFiles as $cssUrl){
				echo "<link rel='stylesheet' href='$cssUrl' />";
			}
		}
	?>
</head>
<body>
	<!-- navigation bar -->
  <?php include('component/navigation.php'); ?>

  <!-- main body of our application -->
  	<div>
  		<?php if(isset($TPL->contentBody)){ include $TPL->contentBody; } ?>	  
	</div>

  <!-- JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.2.0/vue-resource.js"></script>
  <?php 
		if(isset($TPL->jsFiles) && !empty($TPL->jsFiles)){
			foreach($TPL->jsFiles as $jsUrl){
				echo "<script src='$jsUrl'></script>";
			}
		}
	?>
</body>
</html>