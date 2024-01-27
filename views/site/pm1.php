<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
use app\widgets\Alert;

$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('img/logo.jpeg')]);

$this->title = 'Физика';
$this->params['breadcrumbs'][] = ['label' => 'ФизМат', 'url' => ['physmath']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-about">

	<?php if(yii::$app->session->hasFlash('message')):?>
		<div class="alert alert-dismissible alert-success">
		  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
		  <?php echo yii::$app->session->getFlash('message');?>
		</div>
		
	<?php endif;?>
	
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
    


	<div class="row">
    	<span style="margin-bottom: 20px; margin-top: 20px;"><?= Html::a('Добавить', ['/site/add'], ['class' => 'btn btn-primary'])?></span>
    </div>

	<?php if(count($teachers) > 0)?>
		<?php foreach($teachers as $teacher): ?>

    <div class="card bg-light mb-3" style="max-width: 100rem;">
	  <div class="card-header">Должность: <?php echo $teacher->rank; ?></div>

	  <div class="card-body">
	  	<img src="<?= Url::base(true).$teacher->photo; ?>" alt="" width="300px" />

	    <h4 class="card-title"><?php echo $teacher->name; ?></h4>
	    <p class="card-text"><?php echo $teacher->description; ?></p>
	    <p class="card-text">Научные работы</p>

	    <?php if(count($pdfs) > 0)?>
			<?php foreach($pdfs as $pdf): ?>
				<?php if($pdf->teachername == $teacher->name):?>
					<span><?= Html:: a($pdf->pdfname, ['download', 'filename' => $pdf->pdf], ['class' => 'label label-primary', 'style' => 'margin: 10px;']) ?></span>
					<br>
				<?php endif;?>
			<?php endforeach; ?>

		

	    <span><?= Html:: a('Смотреть', ['view', 'id' => $teacher->id], ['class' => 'btn btn-primary', 'style' => 'margin: 10px;']) ?> </span>
	    <span><?= Html:: a('Изменить', ['update', 'id' => $teacher->id], ['class' => 'btn btn-warning', 'style' => 'margin: 10px;']) ?></span>
	    <span><?= Html:: a('Удалить', ['delete', 'id' => $teacher->id], ['class' => 'btn btn-danger', 'style' => 'margin: 10px;']) ?></span>
	  </div>
	</div>

	<?php endforeach; ?>
</div>