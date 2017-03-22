<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2017-03-16
 * Time: 21:32
 */
$this->title = '修改密码';
?>
<div>
    <h1><?php Html::encode($this->title); ?></h1>
    <div class="row">
        <?php $form = \yii\db\ActiveRecord::begin(['id'=>'change_pass']); ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model,'re_password')->passwordInput?>
    </div>
</div>
