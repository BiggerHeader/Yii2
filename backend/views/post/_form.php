<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>


    <!--取出数据-->
    <?php
    /*第一种取出数据
     * $psObject = \common\models\Poststatus::find()->all();
    //把取出的数据转化为键值对数组格式
    $arrayData = \yii\helpers\ArrayHelper::map($psObject,'id','name');*/


    /*
     * 第二种 用query（查询构建器）取数据
     * */
    //先实例化
    /*$query= new \yii\db\Query();
    $arrayData = $query->select(['name','id'])->from('poststatus')->indexBy('id')->column();*/

    /*
     * 第三种 查询数据方式 createCommand 来查找数据 返回数组
     * */
    $psObject = Yii::$app->db->createCommand('select id,`name` from poststatus ')->queryAll();

    //转化为小部件能接受的的数据格式
    $arrayData = \yii\helpers\ArrayHelper::map($psObject, 'id', 'name');

    /*
     * 第四种用 ActiveRecorder 查询数据
     * */
    $arrayData = \common\models\Poststatus::find()->select(['name', 'id'])->indexBy('id')->column();
    //var_dump($arrayData);exit();

    ?>
    <?= $form->field($model, 'status')->dropDownList($arrayData, ['prompt' => '请选择状态',])
    ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?php
    $author = \common\models\Adminuser::find()->select(['username', 'id'])->indexBy('id')->column();
    ?>
    <?= $form->field($model, 'author_id')->dropDownList($author, ['prompt' => '请选择作者',]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
