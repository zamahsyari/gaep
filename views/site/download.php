<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Download';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    Download Gama Animation Engine (GAE), Engine Pembuat dan Player Animasi Tutorial Sederhana, dibawah ini :
    <br/><br/>
    <a target="_blank" id="download" href="https://github.com/gamatutor/gamatutor/archive/master.zip"><button class="btn btn-success"><i class="glyphicon glyphicon-cloud-download"></i> Download</button></a>

        
    </p>

</div>

<?php

$this->registerJs("
        jQuery(document).ready(function() {
            $('#download').click(function(){
                $.get( '".Url::toRoute('site/counterdownload')."', function( data ) {
                    console.log('success')
                });
            })
        });
        ",View::POS_END);
?>
