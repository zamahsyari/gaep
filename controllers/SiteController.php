<?php

namespace app\controllers;

use Yii;
use app\models\Kategori;
use app\models\Subkategori;
use app\models\Tutorial;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\ContactForm;
use app\models\TutorialSearch;


class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'front';
		$searchModel = new TutorialSearch();
        
        $subkategori = Subkategori::find()->all();
        $tutorial = Tutorial::find()->joinWith('user')->orderBy(['id'=>SORT_DESC])->limit(6)->all();
        
        $tuts = [];
        $i = 0;
        foreach ($tutorial as $key => $value) {
            //echo '<pre>';print_r($value);exit;
            if($i<3){
                $j = 0;
            } else {
                $j = 1;
            }
            $tuts[$j]['tuts'][$i]['title'] = $value['judul'];
            $tuts[$j]['tuts'][$i]['id'] = $value['id'];
            $tuts[$j]['tuts'][$i]['deskripsi'] = $value['deskripsi'];
            $tuts[$j]['tuts'][$i]['user'] = $value['user']['realname'];
            $tuts[$j]['tuts'][$i]['created'] = $value['created'];
            $tuts[$j]['tuts'][$i]['downloads'] = $value['downloads'];
            $tuts[$j]['tuts'][$i]['views'] = $value['views'];
            $tuts[$j]['tuts'][$i]['like'] = $value['like'];
            $tuts[$j]['tuts'][$i]['share'] = $value['share'];
            $i++;
        }

        

        return $this->render('index',[
            'subkategori'=>$subkategori,
            'searchModel'=>$searchModel,
			'kategoris'		=> Kategori::find()->all(),
            'tuts'=>$tuts,
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionCounterdownload(){
        return "Something";
    }


    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                	 \Yii::$app->session->set('user.id',$user->id);
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
	
    public function actionDownload()
    {
        return $this->render('download');
    }
}
