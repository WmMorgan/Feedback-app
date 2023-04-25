<?php
/**
 * @author C_Morgan
 */


use app\modules\feedback\widgets\ActionFColumn;
use yii\grid\GridView;


echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'name',
        'email',
        'phone',
        'message',
        'status',
        [
            'attribute' => 'created_at',
            'format' => ['datetime', 'php:d-m-Y / H:i']
        ],
        [
            'attribute' => 'updated_at',
            'format' => ['datetime', 'php:d-m-Y / H:i']
        ],
        [
            'class' => ActionFColumn::className(),
            /*'urlCreator' => function ($action, Feedback $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            },*/
        ],
    ],
]);
