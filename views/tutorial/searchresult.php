<?php
/* @var $this yii\web\View */
$this->title = 'Gama Animation Portal';
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
Html::csrfMetaTags()
?>
    <!--=== Search Block Version 2 ===-->
    <div class="search-block-v2">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <h2>Cari lagi</h2>
                <form action="<?php echo Yii::$app->request->baseUrl?>/index.php?r=tutorial/search" method="post">
	            <div class="input-group">
	                <input type="text" name="search" value="<?= $search ?>" class="form-control" placeholder="Cari Tutorial Animasi ...">
	                <input type="hidden" name="_csrf" value="ZEZ6Y0xrY3ARGS42fTwhMQgkDgF6BCEGEx4SMXQMBR4CPy0iPCIwNQ==">
	                <span class="input-group-btn">
	                    <button class="btn-u" type="submit"><i class="fa fa-search"></i></button>
	                </span>
	            </div>
	  			</form>
            </div>
        </div>    
    </div><!--/container-->     
    <!--=== End Search Block Version 2 ===-->
	<hr />
    <!--=== Search Results ===-->
    <div class="container s-results margin-bottom-50">
        <div class="row">
            <div class="col-md-2 hidden-xs related-search">
                <div class="row">
                    <div class="col-md-12 col-sm-4">
                        <h3>Pencarian terkait</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Web design company</a></li>     
                            <li><a href="#">Web design tutorials</a></li>   
                            <li><a href="#">Self designing</a></li>   
                        </ul>
                        <hr>
                    </div>    

                    <div class="col-md-12 col-sm-4">    
                        <h3>Tutorial</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Basic Concepts</a></li>     
                            <li><a href="#">‎Building your first web page</a></li>   
                            <li><a href="#">‎Advanced HTML</a></li>   
                        </ul>
                        <hr>
                    </div>    

                    <div class="col-md-12 col-sm-4">
                        <h3>Topik terpopuler</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Bootstrap</a></li>     
                            <li><a href="#">Wrapbootstrap</a></li>     
                            <li><a href="#">Codrops</a></li>     
                        </ul>
                        <hr>
                    </div>    

                    <div class="col-md-12 col-sm-4">                        
                        <h3>Riwayat pencarian</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Web design articles</a></li>   
                            <li><a href="#">Tutorials for web design</a></li>     
                        </ul>
                        <a class="see-all" href="#">See all</a>
                        <hr>
                    </div>    
                </div>        
            </div><!--/col-md-2-->

            <div class="col-md-10">
                <span class="results-number"><b>Menemukan sebanyak <?= $count ?> hasil</b></span>
                <!-- Begin Inner Results -->
                <?php
                	foreach($data as $row){
                		?>
                		<div class="inner-results">
		                    <h3><a href="#"><?= $row->judul ?></a></h3>
		                    <p>
		                    	<?php 
		                    		if(strlen($row->deskripsi) > 500){
		                    			echo substr($row->deskripsi,0,500).'...';
		                    		}else{
		                    			echo $row->deskripsi; 
		                    		} 
		                    	?>
		                    </p>   
		                </div>
		                <hr>
                		<?php
                	}
                ?>
                <div class="margin-bottom-30"></div>
                <?= LinkPager::widget(['pagination' => $pagination]) ?>
            </div><!--/col-md-10-->
        </div>        
    </div><!--/container-->     
    <!--=== End Search Results ===-->
<?php
$this->registerCssFile('@web/unify/plugins/line-icons/line-icons.css',['depends'=>'app\assets\AppAsset']);
$this->registerCssFile('@web/unify/plugins/font-awesome/css/font-awesome.min.css',['depends'=>'app\assets\AppAsset']);
$this->registerCssFile('@web/unify/plugins/owl-carousel/owl-carousel/owl.carousel.css',['depends'=>'app\assets\AppAsset']);
$this->registerCssFile('@web/unify/plugins/sky-forms/version-2.0.1/css/custom-sky-forms.css',['depends'=>'app\assets\AppAsset']);
$this->registerCssFile('@web/unify/css/pages/page_search.css',['depends'=>'app\assets\AppAsset']);

