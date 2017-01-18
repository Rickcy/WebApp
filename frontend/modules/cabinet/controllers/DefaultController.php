<?php

namespace app\modules\cabinet\controllers;

use common\controllers\AuthController;


/**
 * Default controller for the `cabinet` module
 */
class DefaultController extends AuthController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
