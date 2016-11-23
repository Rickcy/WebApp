<?php


namespace app\modules\front\controllers;

use common\models\LoginForm;
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
        $model = new SignupForm();
        if($model->load(Yii::$app->request->post()) && $model->signup()){
                $this->goBack();
            Yii::$app->session->setFlash('success','Register Success');
        }else {
            return $this->render('register', ['model' => $model]);
        }
    }

    public function actionLogin(){
            if(!Yii::$app->user->isGuest){
                return $this->goHome();
            }
        $model = new LoginForm();
        if($model->load(Yii::$app->request->post()) && $model->login()){
            return $this->goBack();
        }else {
            return $this->render('login',['model'=>$model]);
        }
    }


    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->goHome();
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