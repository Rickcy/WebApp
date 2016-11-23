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
        $query_advert = $query->from('advert')->orderBy('id desc');
        $command = $query_advert->limit(5);
        $result_general = $command->all();
        $count_general = $command->count();

        $featured = $query_advert->limit(15)->all();
        $recommend_query  = $query_advert->where("recomend= 1")->limit(5);
        $recommend = $recommend_query->all();
        $recommend_count = $recommend_query->count();

        return $this->render('index',[
            'result_general' => $result_general,
            'count_general' => $count_general,
            'featured' => $featured,
            'recommend' => $recommend,
            'recommend_count' => $recommend_count

        ]);
    }

    public function actionEvent(){
        $component = new Common();
        $component->on(Common::EVENT_NOTIFY,[$component,'notifyAdmin']);
        $component->sendMail('kuden.adn.ko@gmail.com','Test','Test','Test');
    }

}
