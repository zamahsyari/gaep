<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\View;
use yii\helpers\Url;
use kartik\social\Disqus;

/* @var $this yii\web\View */
/* @var $model app\models\Tutorial */

$this->title = $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Tutorial', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutorial-view">
    <input type="hidden" value="<?= $model->id ?>" id="id_tuts" />
    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'judul',
            'subkategori.nama',
            'views',
            'downloads',
            'share',
            'like'
            
        ],
    ]) ?>

    <a id="download" target="_blank" href="<?=$model->file?>"><button class="btn btn-success"><i class="glyphicon glyphicon-cloud-download"></i> Download</button></a>
</div>

<div id="disqus_thread"></div>

<?php

$this->registerJs("

        

        jQuery(document).ready(function() {
            var disqus_config = function () {
                this.page.url = '".Url::current()."';  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = $('#id_tuts').val(); // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            
            (function() {  // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                
                s.src = '//gamatutorid.disqus.com/embed.js';
                
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();

            $('#download').click(function(){
                $.post( '".Url::toRoute('tutorial/counterdownload')."', { id : $('#id_tuts').val() })
                  .done(function( data ) {
                    console.log('downloaded')
                });
                
            })
        });
        ",View::POS_END);
?>