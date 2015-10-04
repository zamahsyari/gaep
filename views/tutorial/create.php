<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tutorial */

$this->title = 'Upload Tutorial';
$this->params['breadcrumbs'][] = ['label' => 'Tutorial', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutorial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
