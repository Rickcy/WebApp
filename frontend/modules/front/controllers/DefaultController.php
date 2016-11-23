<?php

namespace app\modules\front\controllers;

use frontend\component\Common;
use yii\db\Query;
use yii\web\Controller;

/**
 * Default controller for the `front` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = "front";
        $query = new Query();
        $command = $query->from('advert')->orderBy('id desc')->limit(5);
        $result_general = $command->all();
        $count_general = $command->count();

        return $this->render('index',['result_general' => $result_general, 'count_general' => $count_general]);
    }

    public function actionEvent(){
        $component = new Common();
        $component->on(Common::EVENT_NOTIFY,[$component,'notifyAdmin']);
        $component->sendMail('kuden.adn.ko@gmail.com','Test','Test','Test');
    }

}
