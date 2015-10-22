<?php
/* @var $this yii\web\View */
$this->title = 'Gama Animation Portal';
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\helpers\Url;
Html::csrfMetaTags()
?>
    <!--=== Search Block Version 2 ===-->
    <?php
        $form=ActiveForm::begin([
        'method'	=>	'get',
        'action'	=>	Url::toRoute('tutorial/search'),
    ]);
	?>

<div class="row">
<div class="col-xs-4">

</div>
<div class="col-xs-8">

</div>
</div>				
				
    <div class="search-block-v2" ng-app="purchaseOrderApp" ng-controller="purchaseOrderDetailControl">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <h2>Cari lagi</h2>
	            <div class="input-group">
					<select name="kategori_id" class="form-control" style="width: 30%" ng-model="option.selected"  ng-change="refreshSubkategoris()">
						<option value="">Kategori</option>
						<?php foreach($kategoris as $kategori){ ?>
						<option value="<?php echo $kategori->id; ?>"><?php echo $kategori->name; ?></option>
						<?php } ?>
					</select>
					<select name="subkategori_id" class="form-control" style="width: 30%">
						<option value="">Sub Kategori</option>
						<option value="{{ subkategori.id }}" ng-repeat="subkategori in subkategoris">{{ subkategori.nama }}</option>
					</select>
	                <input type="text" name="search" value="<?= $search ?>" style="width: 40%" class="form-control" placeholder="Cari Tutorial Animasi ...">
	                <!-- <input type="hidden" name="_csrf" value="ZEZ6Y0xrY3ARGS42fTwhMQgkDgF6BCEGEx4SMXQMBR4CPy0iPCIwNQ=="> -->
	                <span class="input-group-btn">
	                    <button class="btn-u" type="submit"><i class="fa fa-search"></i></button>
	                </span>
	            </div>
            </div>
        </div>    
    </div><!--/container-->     
	<!-- </form> -->
	<?php
	ActiveForm::end();
	?>
    <!--=== End Search Block Version 2 ===-->
	<hr />
    <!--=== Search Results ===-->
    <div class="container s-results margin-bottom-50">
        <div class="row">
            <div class="col-md-2 hidden-xs related-search">
                <!-- <div class="row">
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
                </div> -->        
            </div><!--/col-md-2-->

            <div class="col-md-10">
                <span class="results-number"><b>Menemukan sebanyak <?= $count ?> hasil</b></span>
                <!-- Begin Inner Results -->
                <?php
                	foreach($data as $row){
                		?>
                		<div class="inner-results">
                			<h3><?= Html::a($row->judul, ['tutorial/view', 'id' =>$row->id])?></h3>
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
?>

