<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin([
        'action'=>['post/detail','id'=>$id,'#'=>'comments',],
        'method'=>'post'
    ]); ?>

    <?= $form->field($postComment, 'content')->textarea(['rows' => 6])->label('发表评论') ?>

    <div class="form-group">
        <?= Html::submitButton('提交', ['class' => 'btn btn - success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
