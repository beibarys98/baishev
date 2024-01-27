<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Baishev University';

?>



<div class="site-index">



	

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">

		<h1 style = "color: #337ab7">Welcome To Baishev University Website</h1>
		<img src="<?= Url::base(true)."/img/home.jpeg"; ?>" alt="" />

        
    </div>

    <div class="body-content">

    	<h1 style="margin-bottom: 50px;">Новости</h1>

        <div class="card mb-3">
		  <h3 class="card-header">Card header</h3>
		  <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
		    <rect width="100%" height="100%" fill="#868e96"></rect>
		    <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
		  </svg>
		  <div class="card-body">
		    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  </div>
		  <div class="card-footer text-muted">
		    1 day ago
		  </div>
		</div>

		<div class="card mb-3">
		  <h3 class="card-header">Card header</h3>
		  <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
		    <rect width="100%" height="100%" fill="#868e96"></rect>
		    <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
		  </svg>
		  <div class="card-body">
		    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  </div>
		  <div class="card-footer text-muted">
		    2 days ago
		  </div>
		</div>

    </div>
</div>
