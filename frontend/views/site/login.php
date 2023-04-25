<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Sign In';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> bracket <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-60">The Admin Template For Perfectionist</div>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <div class="form-group">
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        </div><!-- form-group -->
        <div class="form-group">
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= Html::a('Forgot password?', ['site/request-password-reset'], ['class' => 'tx-info tx-12 d-block mg-t-10']) ?>
        </div><!-- form-group -->
        <?= Html::submitButton('Sign In', ['class' => 'btn btn-info btn-block', 'name' => 'login-button']) ?>

        <?php ActiveForm::end(); ?>
        <div class="mg-t-60 tx-center">Not yet a member? <?= Html::a('Sign Up', ['site/signup'], ['class' => 'tx-info']) ?></div>
    </div><!-- login-wrapper -->
</div><!-- d-flex -->
