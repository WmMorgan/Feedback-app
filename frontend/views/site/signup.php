<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> bracket <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-40">The Admin Template For Perfectionist</div>
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <div class="form-group">
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        </div><!-- form-group -->
        <div class="form-group">
            <?= $form->field($model, 'email') ?>
        </div><!-- form-group -->
        <div class="form-group">
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div><!-- form-group -->

        <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
        <?= Html::submitButton('Sign Up', ['class' => 'btn btn-info btn-block', 'name' => 'signup-button']) ?>
        <?php ActiveForm::end(); ?>

        <div class="mg-t-40 tx-center">Do you have an account? <?= Html::a('Sign In', ['site/login'], ['class' => 'tx-info']) ?>.</div>
    </div><!-- login-wrapper -->
</div><!-- d-flex -->
