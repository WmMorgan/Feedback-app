<?php

use common\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\feedback\models\Feedback $model */
/** @var ActiveForm $form */

$this->title = 'Feedback';
?>
<style>
    .help-block {
        width: 100%;
        margin-top: 0.25rem;
        font-size: 0.875em;
        color: var(--bs-form-invalid-color);
    }
</style>

<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

    <div class="col-xl-6">
    <div class="form-layout form-layout-4 bg-white">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Feedback</h6>
        <p class="mg-b-30 tx-gray-600">Write down the thoughts that did not come to your mind</p>
        <?= Alert::widget() ?>
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <label class="col-sm-4 form-control-label">Name: <span class="tx-danger">*</span></label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <?= $form->field($model, 'name')->label(false) ?>
            </div>
        </div><!-- row -->
        <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <?= $form->field($model, 'email')->label(false) ?>
            </div>
        </div>
        <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Phone: <span class="tx-danger">*</span></label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <?= $form->field($model, 'phone')->label(false) ?>
            </div>
        </div>
        <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Message: <span class="tx-danger">*</span></label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <?= $form->field($model, 'message')->textarea()->label(false) ?>
            </div>
        </div>
        <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Verification code: <span class="tx-danger">*</span></label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <?= $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::classname(), [
                'captchaAction' => '/feedback/send/captcha'
            ])->label(false) ?>
            </div>
        </div>
        <div class="form-layout-footer mg-t-30">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-info']) ?>
        </div><!-- form-layout-footer -->
        <?php ActiveForm::end(); ?>
    </div><!-- form-layout -->
</div>

</div>
