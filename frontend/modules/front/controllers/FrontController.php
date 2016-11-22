<?php


namespace app\modules\front\controllers;

use frontend\models\SignupForm;
use frontend\models\ContactForm;
use Yii;
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
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            print($model->getAttributes());
            die;
        }
        return $this->render('register',['model' => $model]);
    }

    public function actionContact(){
        $model = new ContactForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $body ='<div>Body : <b>'.$model->body.'</b></div>';
            $body .='<div>Email : <b>'.$model->email.'</b></div>';
            Yii::$app->common->sendMail($model->subject,$body);
            print "Send Success";
            die();
        }
        return $this->render('contact',['model'=>$model]);
    }
}