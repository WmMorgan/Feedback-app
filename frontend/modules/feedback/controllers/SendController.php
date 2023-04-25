<?php


namespace app\modules\feedback\controllers;


use app\modules\feedback\models\Feedback;
use app\modules\feedback\models\FeedbackSearch;
use Yii;
use yii\db\Expression;
use yii\web\Controller;

/**
 * Class SendController
 * @package app\modules\feedback\controllers
 */
class SendController extends Controller
{
    public $layout = '@app/views/layouts/guest';

    public function actionIndex()
    {
        $model = new Feedback();
            if ($model->load(Yii::$app->request->post())) {
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', "Ваш комментарий был успешно отправлен.");
                } else {
                    Yii::$app->session->setFlash('error', "К сожалению, комментарий не был отправлен");
                }
                return $this->redirect(['index']);
            }

        return $this->render('send', compact('model'));
    }

    /**
     * @return array[]
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * @return string
     * Для всех видно будет
     */
    public function actionAll() {
        $searchModel = new FeedbackSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get(), true);

        return $this->render('all', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

}