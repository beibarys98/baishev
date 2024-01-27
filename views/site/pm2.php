<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Математика';
$this->params['breadcrumbs'][] = ['label' => 'ФизМат', 'url' => ['physmath']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="/baishev/web/site/physmath">ФизМат</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarColor03">
	      <ul class="navbar-nav me-auto">
	        
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Курсы</a>
	          <div class="dropdown-menu">
	            <a class="dropdown-item" href="/baishev/web/site/pm1">Физика</a>
	            <a class="dropdown-item" href="/baishev/web/site/pm2">Математика</a>
	            <a class="dropdown-item" href="/baishev/web/site/pm3">Компьютерная Наука</a>
	            <a class="dropdown-item" href="/baishev/web/site/pm4">Роботехника</a>
	          </div>
	        </li>
	      </ul>
	      <form class="d-flex">
	        <input class="form-control me-sm-2" type="search" placeholder="Search">
	        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
	      </form>
	    </div>
	  </div>
	</nav>
    
	<h1>MATHS PAGE</h1>

</div>
