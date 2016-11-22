<?php


namespace app\modules\front\controllers;

use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\Controller;

class FrontController extends Controller
{

    public $layout='inner';


    public function actions()
    {
       return [
           'captcha'=>[
         'class'=>'yii\captcha\CaptchaAction',
          'fixedVerifyCode'=>YII_ENV_TEST ?'testme':null
           ]
       ];
    }

    public function actionIndex(){

        return $this->render('index');
    }

    public function actionRegister(){
        $model = new SignupForm;
        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            print_r($model->getAttributes());
            die;
        }
        return $this->render('register',['model' => $model]);
    }

    public function actionContact(){
        $model = new ContactForm();
        return $this->render('contact',['model'=>$model]);
    }
}