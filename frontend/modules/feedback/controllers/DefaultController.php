<?php

namespace app\modules\feedback\controllers;

use app\modules\feedback\components\ModerationBehavior;
use app\modules\feedback\models\Feedback;
use app\modules\feedback\models\FeedbackSearch;
use frontend\controllers\AdminController;
use Yii;

/**
 * Default controller for the `feedback` module
 */
class DefaultController extends AdminController
{
    protected $_model;

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FeedbackSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * @param $id
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionApproved($id) {
        $model = $this->findModel($id);
        $model->status = ModerationBehavior::APPROVED;
        if($model->update(false)) {
            Yii::$app->session->setFlash('success', "Успешно проверено");

            $this->redirect(['index']);
        }
    }

    /**
     * @param $id
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionIgnore($id) {
        $model = $this->findModel($id);
        $model->status = ModerationBehavior::IGNORE;
        if($model->update(false)) {
            Yii::$app->session->setFlash('success', "Успешно отменено");

            $this->redirect(['index']);
        }
    }


    /**
     * @param $id
     * @return Feedback|null
     */
    protected function findModel($id)
    {
        if ($this->_model === null) {
            $this->_model = Feedback::findOne($id);
        }

        return $this->_model;
    }

}
