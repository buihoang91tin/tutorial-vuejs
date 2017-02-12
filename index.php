<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Vue</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<!-- navigation bar -->
  <?php include('component/navigation.php'); ?>

  <!-- main body of our application -->
  <div class="container" id="events">
    <div class="row">
      <div class="col-md-12">
        <h1>Tutorial Build an App with Vue.js</h1>
        <blockquote>
          <p>
            Link tutorial : <a href="https://scotch.io/tutorials/build-an-app-with-vue-js-a-lightweight-alternative-to-angularjs">Build an App with Vue.js: A Lightweight Alternative to AngularJS</a><br>
            Source code : <a href="https://github.com/chenkie/vue-events-bulletin"> Github </a>
          </p>
        </blockquote>
      </div>
    </div>
    <div class="row">
      <!-- add an event form -->
      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3>Add an Event</h3>
          </div>
          <div class="panel-body">
          	<div class="form-group">
          		<input type="text" class="form-control" placeholder="Event Name" v-model="event.name">
          	</div>

          	<div class="form-group">
          		<textarea class="form-control" placeholder="Event Description" v-model="event.description"></textarea>
          	</div>

          	<div class="form-group">
          		<input type="date" class="form-control" placeholder="Date" v-model="event.date">
          	</div>

          	<button class="btn-btn-primary" v-on:click="addEvent">submit</button>
          </div>

        </div>
      </div>

      <!-- show the events -->
      <div class="col-sm-6">
        <div class="list-group">
        	<a href="#" class="list-group-item" v-for="event in events">
            <h4 class="list-group-item-heading"><i class="glyphicon glyphicon-bullhorn"></i> {{ event.name }}</h4>
            <h5><i class="glyphicon glyphicon-calendar" v-if="event.date"></i> {{ event.date }}</h5>
            <p class="list-group-item-text" v-if="event.detail">{{ event.description }}</p>
            <button class="btn btn-xs btn-danger" v-on:click="deleteEvent($index)">Delete</button>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.2.0/vue-resource.js"></script>
  <script src="asset/js/vuejs/app.js"></script>
</body>
</html>