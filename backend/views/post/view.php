<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章详情页', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'content:ntext',
            'tags:ntext',
            //'status', 第一种 关联查询后 ，重置值
            ['attribute' => 'status', 'value' => $model->status0->name],
            /*'create_time:datetime',
            'update_time:datetime',*/
            ['attribute'=>'create_time','value'=>date('Y-m-d H:m:s',$model->create_time)],
            ['attribute'=>'update_time','value'=>date('Y-m-d H:m:s',$model->update_time)],
            //'author_id',  第二种写法 ，重置值
            ['label' => '作者', 'value' => $model->author->username]
        ],
        /*调节小部件中每一个标签的样式*/
        'template' => '<tr><th  style="width: 80px;text-align: center" >{label}</th><td{contentOptions}>{value}</td></tr>',
        'options' => ['class' => 'table table-striped table-bordered detail-view'],
    ]) ?>


</div>
