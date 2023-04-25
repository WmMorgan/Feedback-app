<?php

namespace app\modules\feedback\widgets;

use yii\helpers\Html;

/**
 * Class ActionCColumn
 * @package app\modules\category\widgets
 */
class ActionFColumn extends \yii\grid\ActionColumn {


    public $template = '{approved} {ignore}';

    public function init()
    {
        $this->initApprovedButton();
        parent::init();
    }

    public function initApprovedButton() {
       $this->buttons = [
           'approved' => function ($url) {
            return Html::a(
                '<i class="fa fa-check-circle-o fa-2x" style="color:green;" aria-hidden="true"></i>',
                $url,
                [
                    'title' => 'Approved',
                ]
            ); },
           'ignore' => function ($url, $model) {
               return Html::a(
                   '<i class="fa fa-ban fa-2x" style="color: red;" aria-hidden="true"></i>',
                   $url,
                   [
                       'title' => 'Ignore',
                   ]
               ); }

            ];
    }

}

