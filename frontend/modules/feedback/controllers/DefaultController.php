<?php

namespace app\modules\feedback\controllers;

use app\modules\feedback\models\Feedback;
use app\modules\feedback\models\FeedbackSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * Default controller for the `feedback` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
       /* $dataProvider = new ActiveDataProvider([
            'query' => Feedback::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);*/
        $searchModel = new FeedbackSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
}
