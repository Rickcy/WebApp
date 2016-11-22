<?php

namespace frontend\component;

use Yii;
use yii\base\Component;

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
}