<?php

namespace Api\Controller {

    use yii\rest\Controller;

    /**
     * Class SiteController
     */
    class SiteController extends Controller
    {
        /**
         * @return array
         */
        public function actions()
        {
            return [
                'error' => ['class' => 'yii\web\ErrorAction'],
            ];
        }

        /**
         * @return array
         */
        public function actionIndex()
        {
            return [
                'version'  => phpversion(),
                'time'     => time(),
                'timezone' => date_default_timezone_get(),
            ];
        }
    }
}
