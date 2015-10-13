<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tutorial */

$this->title = $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Tutorial', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutorial-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'judul',
            'file:ntext',
            'subkategori.nama'
            
        ],
    ]) ?>

</div>
