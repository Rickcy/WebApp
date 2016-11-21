<?php

namespace app\modules\front;

use yii\base\Module;

/**
 * front module definition class
 */
class MainModule extends Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\front\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->setLayoutPath('@frontend/views/layouts/');
        // custom initialization code goes here
    }
}
