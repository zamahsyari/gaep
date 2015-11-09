<?php
/* @var $this yii\web\View */
$this->title = 'Gama Animation Portal';
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
Html::csrfMetaTags()
?>

<!--=== Search Block ===-->
<div class="search-block parallaxBg">
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h1>PELAJARI <span class="color-green">HAL</span> BARU</h1>
			<?php
                	$form=ActiveForm::begin([
                		'method'	=>	'get',
                		'action'	=>	Url::toRoute('tutorial/search'),
                	]);
                ?>
	            
			<div class="input-group">                      
                <input type="text" name="search" class="form-control" placeholder="Cari Tutorial Animasi ...">
                <input type="hidden" name="kategori_id">
                <input type="hidden" name="subkategori_id">
                <!-- <input type="hidden" name="_csrf" value="ZEZ6Y0xrY3ARGS42fTwhMQgkDgF6BCEGEx4SMXQMBR4CPy0iPCIwNQ=="> -->
                <span class="input-group-btn">
                    <button class="btn-u btn-u-lg" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>
  			<?php
	  				ActiveForm::end();
	  			?>
        </div>
    </div>    
</div><!--/container-->     
<!--=== End Search Block ===-->

<div class="container content">
    <!-- Top Categories -->
    <div class="headline"><h2>Kategori Utama</h2></div>  
    <div class="row category margin-bottom-20">
        <!-- Info Blocks -->
        <?php foreach ($subkategori as $key => $value): ?>
        <div class="col-md-4 col-sm-6">
                <div class="content-boxes-v3 margin-bottom-10 md-margin-bottom-20">
                    <i class="<?= $value['icon'] ?>"></i>
                    <div class="content-boxes-in-v3">
                        <h3><a href="<?php echo Url::toRoute('tutorial/search').'&search=&subkategori_id='.$value['id'] ?>"> <?= $value['nama'] ?></a></h3>
                        <p><?= $value['deskripsi'] ?></p>
                    </div>
                </div>
        </div>    
        <?php endforeach; ?>
        <!-- End Info Blocks -->

        <!-- Info Blocks -->
        <!-- <div class="col-md-4 col-sm-6 md-margin-bottom-40"> -->
            
        <!-- </div> -->
        <!-- End Info Blocks -->
        
        <!-- Begin Section-Block -->
        <!-- <div class="col-md-4 col-sm-12"> -->
            <!-- <div class="section-block"> -->
                <!-- <div class="text-center">
                    <i class="rounded icon-custom icon-sm icon-bg-darker line-icon icon-graph"></i>
                    <h2>Popular Search</h2>  
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis. <a href="#">View more</a></p>
                </div>    --> 
                
                <!-- </br> -->
                
                <!-- Progress Bar -->
                <!-- <h3 class="heading-xs no-top-space">Web Design <span class="pull-right">88%</span></h3>
                <div class="progress progress-u progress-xxs">
                    <div style="width: 88%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="88" role="progressbar" class="progress-bar progress-bar-u">
                    </div>
                </div> -->

                <!-- <h3 class="heading-xs no-top-space">PHP/WordPress <span class="pull-right">76%</span></h3>
                <div class="progress progress-u progress-xxs">
                    <div style="width: 76%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="76" role="progressbar" class="progress-bar progress-bar-u">
                    </div>
                </div> -->

                <!-- <h3 class="heading-xs no-top-space">HTML/CSS <span class="pull-right">97%</span></h3>
                <div class="progress progress-u progress-xxs">
                    <div style="width: 97%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="97" role="progressbar" class="progress-bar progress-bar-u">
                    </div>
                </div> -->
                <!-- End Progress Bar -->

                <!-- <div class="clearfix"></div> -->

                <!-- <div class="section-block-info">
                    <ul class="list-inline tags-v1">
                        <li><a href="#">#HTML5</a></li>
                        <li><a href="#">#Bootstrap</a></li>
                        <li><a href="#">#Blog and Portfolio</a></li>
                        <li><a href="#">#Responsive</a></li>
                        <li><a href="#">#Unify</a></li>
                        <li><a href="#">#JavaScript</a></li>
                    </ul>                            
                </div> -->
            <!-- </div> -->
        <!-- </div> -->
        <!-- End Section-Block -->    
    </div>    
    <!-- End Top Categories -->
</div><!--/container-->     
<!--=== End Content ===-->

<!--=== Container Part ===-->
    <div class="bg-grey">

        <div class="container content-md">
            <div class="headline"><h2>Tutorial Terakhir</h2></div> 
            <?php foreach ($tuts as $tut):  ?>
            <ul class="row list-row margin-bottom-30">
                <?php foreach($tut['tuts'] as $value): ?>
                <li class="col-md-4">
                    <div class="content-boxes-v3 block-grid-v1 rounded">
                        <i class="icon-custom icon-sm rounded-x icon-bg-green icon-line icon-graduation"></i>                        
                        <div class="content-boxes-in-v3">
                            <h3><?= Html::a($value['title'], ['tutorial/view', 'id' =>$value['id']])?></h3>
                            <ul class="star-vote">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <ul class="list-inline margin-bottom-5">
                                <li>By <a class="color-green" href="#"><?= $value['user'] ?></a></li>
                                <li><i class="fa fa-clock-o"></i><?= $value['created'] ?></li>
                            </ul>
                            <p><?= $value['deskripsi'] ?></p>
                            <ul class="list-inline block-grid-v1-add-info">
                                <li><a href="#"><i class="fa fa-eye"></i> <?= $value['views'] ?></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i> <?= $value['downloads'] ?></a></li>
                                <li><a href="#"><i class="fa fa-download"></i> <?= $value['like'] ?></a></li>
                                <li><a href="#"><i class="fa fa-heart"></i> <?= $value['share'] ?></a></li>
                            </ul>    
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endforeach; ?>
            
        </div>        
    </div>



<?php
$this->registerCssFile('@web/unify/plugins/line-icons/line-icons.css',['depends'=>'app\assets\AppAsset']);
$this->registerCssFile('@web/unify/plugins/font-awesome/css/font-awesome.min.css',['depends'=>'app\assets\AppAsset']);
$this->registerCssFile('@web/unify/plugins/owl-carousel/owl-carousel/owl.carousel.css',['depends'=>'app\assets\AppAsset']);
$this->registerCssFile('@web/unify/plugins/sky-forms/version-2.0.1/css/custom-sky-forms.css',['depends'=>'app\assets\AppAsset']);
$this->registerCssFile('@web/unify/css/pages/page_search.css',['depends'=>'app\assets\AppAsset']);

