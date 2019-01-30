<?php

namespace app\moduls\admin\controllers;

use yii\web\Controller;
use app\moduls\admin\controllers\AppAdminController;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends AppAdminController
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
