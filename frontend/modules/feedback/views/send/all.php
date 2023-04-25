<?php

use yii\grid\GridView;


?>
<style>
    h1 {
        border-bottom: 2px dashed #e84a02;
        padding-bottom: 20px;
        color: #e84a02;
    }
</style>
<div class="row justify-content-center mt-5">
    <div class="col-lg-8 text-center mb-5"><h1>Feedback list</h1></div>
    <div class="col-lg-8">
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'name',
        'email',
        'phone',
        'message',
        [
            'attribute' => 'created_at',
            'format' => ['datetime', 'php:d-m-Y / H:i']
        ],
        [
            'attribute' => 'updated_at',
            'format' => ['datetime', 'php:d-m-Y / H:i']
        ],
    ],
]);
?>
    </div></div>