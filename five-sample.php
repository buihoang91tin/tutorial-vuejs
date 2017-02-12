<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Vue</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="asset/css/styles.css" />
</head>
<body>
	<!-- navigation bar -->
  <?php include('component/navigation.php'); ?>

  <!-- main body of our application -->
  <div class="container" id="events">
    <div class="row">
      <div class="col-md-12">
        <h1>5 Practical Examples For Learning Vue.js</h1>
        <blockquote>
          <p>
            Link tutorial : <a href="http://tutorialzine.com/2016/03/5-practical-examples-for-learning-vue-js/">5 Practical Examples For Learning Vue.js</a>
          </p>
        </blockquote>
      </div>
    </div>
    <div class="row">
		<div class="col-md-12 wrapper-sample">
			<nav class="sample" v-bind:class="active" v-on:click.prevent>
				<a href="#" class="sample1" v-on:click=makeActive('sample1')>Inline Editor</a>
				<a href="#" class="sample2" v-on:click=makeActive('sample2')>Order</a>
				<a href="#" class="sample3" v-on:click=makeActive('sample3')>Search Instant</a>
				<a href="#" class="sample4" v-on:click=makeActive('sample4')>Switchable Grid</a>
			</nav>
			<div>
				<component :is="currentView"></component>
			</div>
		</div>
  	</div>
  </div>

  <!-- JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.2.0/vue-resource.js"></script>
  <script src="asset/js/vuejs/five-sample.js"></script>
</body>
</html>