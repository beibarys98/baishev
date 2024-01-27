<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = $teacher->name;
$this->params['breadcrumbs'][] = ['label' => 'ФизМат', 'url' => ['physmath']];
$this->params['breadcrumbs'][] = ['label' => 'Физика', 'url' => ['pm1']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

	<div class="card bg-light mb-3" style="max-width: 100rem;">
	  <div class="card-header">Ранк: <?php echo $teacher->rank; ?></div>

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
		

		<div class="col-lg-2">
            <a href=<?php echo Url::base(true)."/site/pm1"; ?> class="btn btn-danger" style = "margin-top: 20px;">Назад</a>
        </div>
	  </div>
	</div>
</div>
