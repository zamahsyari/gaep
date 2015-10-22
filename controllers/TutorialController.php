<?php

namespace app\controllers;

use Yii;
use app\models\Kategori;
use app\models\Tutorial;
use app\models\TutorialSearch;
use app\models\Subkategori;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\web\Application;

/**
 * TutorialController implements the CRUD actions for Tutorial model.
 */
class TutorialController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','update','delete'],
                'rules' => [
                    [
                        'actions' => ['index','create','update','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tutorial models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $searchModel = new TutorialSearch();
        $param_search = Yii::$app->request->queryParams;
        $param_search['TutorialSearch']['user_id'] = Yii::$app->session->get('user.id');
        
        $dataProvider = $searchModel->search($param_search);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
    public function actionGetsubkategorijson($id='')
    {
		if($id == ''){
			$subkategori = Subkategori::find()->asArray()->all();		
		}else{
			$subkategori = Subkategori::find()->where("kategori_id = $id")->asArray()->all();			
		}
		 return (json_encode($subkategori));
    }
	
    public function actionIndexkategori($subkategori_id)
    {
        
    }


    /**
     * Displays a single Tutorial model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model->views = $model->views + 1;
        $model->save();
    	// $data=Tutorial::find()
				// ->where(['id'=>$id])
				// ->one();
        return $this->render('view', [
            'model' =>	$model,
            // 'data'	=>	$data,
        ]);
    }

    /**
     * Creates a new Tutorial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tutorial();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->user_id = Yii::$app->session->get('user.id');
            $model->file_upload = UploadedFile::getInstance($model,'file');
            $model->file_upload->saveAs('uploads/tutorial/tutorial_'.$model->id.'.'.$model->file_upload->extension);
            $model->file = 'uploads/tutorial/tutorial_'.$model->id.'.'.$model->file_upload->extension;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tutorial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tutorial model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tutorial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tutorial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tutorial::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCounterdownload(){
        $post_data=Yii::$app->request->post();
        $model = Tutorial::findOne($post_data['id']);
        $model->downloads = $model->downloads+1;
        $model->save();

        return true;
    }
	
	public function actionSearch(){
		$post=Yii::$app->request->get();
		
		$query=Tutorial::findBySql("SELECT * FROM tutorial WHERE judul LIKE '%".$post['search']."%'".
			" AND subkategori_id LIKE '%".$post['subkategori_id']."%'");
		$pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
		$data= $countries = $query->orderBy('id')
            	->offset($pagination->offset)
            	->limit($pagination->limit)
            	->all();
		$count=$query->count();
		return $this->render('searchresult',[
			'data'			=> $data,
			'count'			=> $count,
			'pagination'	=> $pagination,
			'search'		=> $post['search'],
			'kategoris'		=> Kategori::find()->all(),
		]);
	}
}
