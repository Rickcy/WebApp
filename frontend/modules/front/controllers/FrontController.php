<?php


namespace app\modules\front\controllers;

use common\models\Advert;
use common\models\LoginForm;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\overlays\Marker;
use frontend\component\Common;
use frontend\filters\FilterAdvert;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use Yii;
use yii\base\DynamicModel;
use yii\data\Pagination;
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
    public function behaviors(){
        return [
            [
                'only' => ['view-advert'],
                'class' => FilterAdvert::className(),
            ]
        ];
    }
    public function actionIndex(){

        return $this->render('index');
    }

    public function actionFind($propert='',$price='',$apartment = ''){

        $this->layout = 'sell';

        $query = Advert::find();
        $query->filterWhere(['like', 'address', $propert])
            ->orFilterWhere(['like', 'description', $propert])
            ->andFilterWhere(['type' => $apartment]);

        if($price){
            $prices = explode("-",$price);

            if(isset($prices[0]) && isset($prices[1])) {
                $query->andWhere(['between', 'price', $prices[0], $prices[1]]);
            }
            else{
                $query->andWhere(['>=', 'price', $prices[0]]);
            }
        }

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->setPageSize(10);

        $model = $query->offset($pages->offset)->limit($pages->limit)->all();

        $request = \Yii::$app->request;
        return $this->render("find", ['model' => $model, 'pages' => $pages, 'request' => $request]);

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

    public function actionViewAdvert($id){
        $model = Advert::findOne($id);

        $data = ['name', 'email', 'text'];
        $model_feedback = new DynamicModel($data);
        $model_feedback->addRule('name','required');
        $model_feedback->addRule('email','required');
        $model_feedback->addRule('text','required');
        $model_feedback->addRule('email','email');


        if(Yii::$app->request->isPost) {
            if ($model_feedback->load(Yii::$app->request->post()) && $model_feedback->validate()){

                Yii::$app->common->sendMail('Subject Advert',$model_feedback->text);
            }

        }

        $user = $model->user;
        $images = Common::getImageAdvert($model,false);

        $current_user = ['email' => '', 'username' => ''];

        if(!Yii::$app->user->isGuest){

            $current_user['email'] = Yii::$app->user->identity->email;
            $current_user['username'] = Yii::$app->user->identity->username;

        }
        $coords = str_replace(['(',')'],'',$model->location);
        $coords = explode(',',$coords);

      


        $coord = new LatLng(['lat' => $coords[0], 'lng' => $coords[1]]);
        $map = new Map([
            'center' => $coord,
            'zoom' => 20,
        ]);

        $marker = new Marker([
            'position' => $coord,
            'title' => Common::getTitleAdvert($model),
        ]);

        $map->addOverlay($marker);


        return $this->render('view_advert',[
            'model' => $model,
            'model_feedback' => $model_feedback,
            'user' => $user,
            'images' =>$images,
            'current_user' => $current_user,
            'map' => $map
        ]);

    }
}