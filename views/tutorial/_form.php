<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Subkategori;

/* @var $this yii\web\View */
/* @var $model app\models\Tutorial */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container content">
    <div class="tutorial-form">

        <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

        <?= $form->field($model, 'judul')->textInput(['maxlength' => 250]) ?>

        <?= $form->field($model, 'file')->fileInput() ?>



        <?php 
            if(!empty($model->file)) {
                echo Html::activeHiddenInput($model,'file',['value'=>$model->file]);
                echo '<div class="form-group"><a class="btn btn-success" href="'.$model->file.'">Download File Sekarang</a></div>';
            }
        ?>

        <?= $form->field($model, 'subkategori_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Subkategori::find()->all(), 'id', 'nama'),
            'options' => ['placeholder' => 'Pilih Kategori ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>

        <?= $form->field($model, 'deskripsi')->textInput(['maxlength' => 250]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
