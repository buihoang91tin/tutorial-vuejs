<?php
require_once('./lib/pageTemplate.php');
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php if(isset($TPL->pageTitle)){echo $TPL->pageTitle; } ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<?php if(isset($TPL->ContentHead)){ include $TPL->ContentHead; }?>
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
  <script src="asset/js/vuejs/app.js"></script>
</body>
</html>