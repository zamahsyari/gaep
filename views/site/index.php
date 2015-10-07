<?php
/* @var $this yii\web\View */
$this->title = 'Gama Animation Portal';
use yii\helpers\Html;
use yii\widgets\ActiveForm;
Html::csrfMetaTags()
?>

<!--=== Search Block ===-->
<div class="search-block parallaxBg">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <h1>PELAJARI <span class="color-green">HAL</span> BARU</h1>
			<form action="<?php echo Yii::$app->request->baseUrl?>/index.php?r=tutorial/search" method="post">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Tutorial Animasi ...">
                <input type="hidden" name="_csrf" value="ZEZ6Y0xrY3ARGS42fTwhMQgkDgF6BCEGEx4SMXQMBR4CPy0iPCIwNQ==">
                <span class="input-group-btn">
                    <button class="btn-u btn-u-lg" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>
  			</form>
        </div>
    </div>    
</div><!--/container-->     
<!--=== End Search Block ===-->

<div class="container content">
    <!-- Top Categories -->
    <div class="headline"><h2>Top Categories</h2></div>  
    <div class="row category margin-bottom-20">
        <!-- Info Blocks -->
        <div class="col-md-4 col-sm-6">
            <?php foreach ($subkategori as $key => $value): ?>
                <div class="content-boxes-v3 margin-bottom-10 md-margin-bottom-20">
                    <i class="<?= $value['icon'] ?>"></i>
                    <div class="content-boxes-in-v3">
                        <h3><a href="#"> <?= $value['nama'] ?></a></h3>
                        <p><?= $value['deskripsi'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>    
        <!-- End Info Blocks -->

        <!-- Info Blocks -->
        <div class="col-md-4 col-sm-6 md-margin-bottom-40">
            
        </div>    
        <!-- End Info Blocks -->
        
        <!-- Begin Section-Block -->
        <div class="col-md-4 col-sm-12">
            <div class="section-block">
                <div class="text-center">
                    <i class="rounded icon-custom icon-sm icon-bg-darker line-icon icon-graph"></i>
                    <h2>Popular Search</h2>  
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis. <a href="#">View more</a></p>
                </div>    
                
                </br>
                
                <!-- Progress Bar -->
                <h3 class="heading-xs no-top-space">Web Design <span class="pull-right">88%</span></h3>
                <div class="progress progress-u progress-xxs">
                    <div style="width: 88%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="88" role="progressbar" class="progress-bar progress-bar-u">
                    </div>
                </div>

                <h3 class="heading-xs no-top-space">PHP/WordPress <span class="pull-right">76%</span></h3>
                <div class="progress progress-u progress-xxs">
                    <div style="width: 76%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="76" role="progressbar" class="progress-bar progress-bar-u">
                    </div>
                </div>

                <h3 class="heading-xs no-top-space">HTML/CSS <span class="pull-right">97%</span></h3>
                <div class="progress progress-u progress-xxs">
                    <div style="width: 97%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="97" role="progressbar" class="progress-bar progress-bar-u">
                    </div>
                </div>
                <!-- End Progress Bar -->

                <div class="clearfix"></div>

                <div class="section-block-info">
                    <ul class="list-inline tags-v1">
                        <li><a href="#">#HTML5</a></li>
                        <li><a href="#">#Bootstrap</a></li>
                        <li><a href="#">#Blog and Portfolio</a></li>
                        <li><a href="#">#Responsive</a></li>
                        <li><a href="#">#Unify</a></li>
                        <li><a href="#">#JavaScript</a></li>
                    </ul>                            
                </div>
            </div>
        </div>
        <!-- End Section-Block -->    
    </div>    
    <!-- End Top Categories -->
</div><!--/container-->     
<!--=== End Content ===-->



<?php
$this->registerCssFile('@web/unify/plugins/line-icons/line-icons.css',['depends'=>'app\assets\AppAsset']);
$this->registerCssFile('@web/unify/plugins/font-awesome/css/font-awesome.min.css',['depends'=>'app\assets\AppAsset']);
$this->registerCssFile('@web/unify/plugins/owl-carousel/owl-carousel/owl.carousel.css',['depends'=>'app\assets\AppAsset']);
$this->registerCssFile('@web/unify/plugins/sky-forms/version-2.0.1/css/custom-sky-forms.css',['depends'=>'app\assets\AppAsset']);
$this->registerCssFile('@web/unify/css/pages/page_search.css',['depends'=>'app\assets\AppAsset']);

