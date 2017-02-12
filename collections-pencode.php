<?php 

require_once('lib/pageTemplate.php');

if(!isset($TPL)){
  $TPL = new pageTemplate();
  $TPL->pageTitle="Collection-pencode";
  $TPL->contentBody = __FILE__;
  $TPL->cssFiles[] = 'asset/css/styles.css';
  $TPL->jsFiles[] = 'asset/js/vuejs/collections-pencode.js';
  include "layout/layout.php";
  exit;
}

?>
<div class="container" id="events">
  <div class="row">
    <div class="col-md-12">
      <h1>Vuejs Collections Pencode</h1>
    </div>
  </div> 
  <div class="row">
  		<div class="col-md-12 wrapper-sample">
  			<form>
	  			<ul>
	  				<li v-for="pen in collections_Pencode">
	  					<a v-bind:href="pen.url" target="_blank">{{pen.title}}</a>
	  				</li>
	  			</ul>
	  		</form>
  		</div>
  	</div>
</div>