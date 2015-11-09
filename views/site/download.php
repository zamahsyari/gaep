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
    <a target="_blank" id="download" href="https://github.com/gamatutor/gamatutor/"><button class="btn btn-success"><i class="glyphicon glyphicon-cloud-download"></i> Download</button></a>

        
    </p>

</div>
<div class="form-group">
    <a href="https://twitter.com/share" class="twitter-share-button" data-size="large" data-hashtags="gamatutor">Tweet</a>
</div>
<div id="disqus_thread"></div>
<?php

$this->registerJs("
        jQuery(document).ready(function() {
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
            
            var disqus_config = function () {
                this.page.url = '".Url::current()."';  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = 'download_gae'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            
            (function() {  // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                
                s.src = '//gamatutorid.disqus.com/embed.js';
                
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();

            $('#download').click(function(){
                $.get( '".Url::toRoute('site/counterdownload')."', function( data ) {
                    console.log('success')
                });
            })
        });
        ",View::POS_END);
?>
