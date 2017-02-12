<?php 

require_once('lib/pageTemplate.php');

if(!isset($TPL)){
  $TPL = new pageTemplate();
  $TPL->pageTitle="Vue First App";
  $TPL->contentBody = __FILE__;
  $TPL->jsFiles[] = 'asset/js/vuejs/app.js';
  include "layout/layout.php";
  exit;
}

?>
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
        <a href="#" class="list-group-item" v-for="(event,$index) in events">
          <h4 class="list-group-item-heading"><i class="glyphicon glyphicon-bullhorn"></i> {{ event.name }}</h4>
          <h5><i class="glyphicon glyphicon-calendar" v-if="event.date"></i> {{ event.date }}</h5>
          <p class="list-group-item-text" v-if="event.detail">{{ event.description }}</p>
          <button class="btn btn-xs btn-danger" v-on:click="deleteEvent($index)">Delete</button>
        </a>
      </div>
    </div>
  </div>
</div>