<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList(
        \common\models\Commentstatus::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt' => '请选择状态',]) ?>

    <?= $form->field($model, 'userid')->textInput(['value'=>$model->user->username,'disabled'=>'disabled']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'disabled'=>'disabled']) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true,'disabled'=>'disabled']) ?>

    <?= $form->field($model, 'post_id')->textInput(['value'=>$model->post->title,'disabled'=>'disabled']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn - success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
