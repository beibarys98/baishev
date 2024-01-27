<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Изменить';
$this->params['breadcrumbs'][] = ['label' => 'ФизМат', 'url' => ['physmath']];
$this->params['breadcrumbs'][] = ['label' => 'Физика', 'url' => ['pm1']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <?php if(yii::$app->session->hasFlash('message')):?>
        <div class="alert alert-dismissible alert-success">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <?php echo yii::$app->session->getFlash('message');?>
        </div>
        
      <?php endif;?>

    <div class="body-content">
        <?php $form = ActiveForm::begin()?>
        <div class="card bg-light mb-3" style="max-width: 100rem;">
          <div class="card-header">
                <?php $items = ['учитель'=>'учитель', 'практикант'=>'практикант', 'глава'=>'глава'];?>
                <?= $form->field($teacher, 'rank')->dropDownList($items, ['prompt' => 'Выбрать'])->label('Должность');?>
            </div>
          
          <div class="card-body">

            <img src="<?= Url::base(true).$teacher->photo; ?>" alt="" width="300px" />

            <br>
            <br>
            <p>Изменить фото</p>
            <?= $form->field($teacher, 'file')->fileInput()->label('');?>

            <?= $form->field($teacher, 'name')->label('Имя');?>

            <?= $form->field($teacher, 'description')->textarea(['rows' => '6'])->label('Описание');?>

            <p>Научные работы</p>

            <?php if(count($pdfs) > 0)?>
            <?php foreach($pdfs as $pdf): ?>
                <?php if($pdf->teachername == $teacher->name):?>
                    <p class="card-text">
                        <?php echo $pdf->pdfname; ?>
                        <span><?= Html:: a('X', ['delete2', 'tid' => $teacher->id, 'pdfid' => $pdf->id], ['class' => 'btn btn-danger', 'style' => 'margin: 10px;']) ?></span>
                    </p>
                <?php endif;?>
            <?php endforeach; ?>
            
            <?= $form->field($pdf, 'file')->fileInput()->label('');?>

            <div class="col-lg-3">
                <?= Html::submitButton('Изменить', ['class'=>'btn btn-warning']);?>
            </div>

            <div class="col-lg-2">
                <a href=<?php echo Url::base(true)."/site/pm1"; ?> class="btn btn-danger" style = "margin-top: 20px;">Назад</a>
            </div>

          </div>

        </div>
        <?php ActiveForm::end()?>
    </div>  
</div>


