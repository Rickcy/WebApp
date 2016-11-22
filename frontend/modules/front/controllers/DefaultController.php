<?php

namespace app\modules\front\controllers;

use frontend\component\Common;
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
    { $this->layout='front';

        return $this->render('index');
    }

    public function actionEvent(){
        $component = new Common();
        $component->on(Common::EVENT_NOTIFY,[$component,'notifyAdmin']);
        $component->sendMail('kuden.adn.ko@gmail.com','Test','Test','Test');
    }

}
