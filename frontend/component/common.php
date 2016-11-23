<?php

namespace frontend\component;

use Yii;
use yii\base\Component;
use yii\helpers\Url;

class Common extends Component {

    const EVENT_NOTIFY = 'notify_admin';

    public function sendMail($subject,$text,$emailFrom='kuden.and.ko@gmail.com',$nameFrom='WebApp'){
        Yii::$app->mail->compose()
            ->setFrom(['Rickcy@yandex.ru'=>'Advert'])
            ->setTo([$emailFrom=> $nameFrom])
            ->setSubject($subject)
            ->setTextBody($text)
            ->send();
        $this->trigger(self::EVENT_NOTIFY);
    }

    public function notifyAdmin($event){
        print "Notify Admin";
    }

    public static function getTitleAdvert($data){
        return $data['bedroom']. ' Bed Rooms and ' .$data['kitchen'].' Kitchen Room Apartment on Sale';
    }

    public static function getImageAdvert($data,$general =true,$original=false){
        $image = [];
        $base = Url::base();
        if($original){
            $image[]=$base.'uploads/adverts/'.$data['id'].'/general/'.$data['general_image'];
        }else{
            $image[]=$base.'uploads/adverts/'.$data['id'].'/general/small_'.$data['general_image'];
        }
        return $image;
    }

    public static function substr($text,$start=0,$send=50){
        return mb_substr($text,$start,$send);
    }

}