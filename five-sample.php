<?php 

require_once('lib/pageTemplate.php');

if(!isset($TPL)){
  $TPL = new pageTemplate();
  $TPL->pageTitle="Vue First App";
  $TPL->contentBody = __FILE__;
  $TPL->cssFiles[] = 'asset/css/styles.css';
  $TPL->jsFiles[] = 'asset/js/vuejs/five-sample.js';
  include "layout/layout.php";
  exit;
}

?>
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
