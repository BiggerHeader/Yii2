<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <!--另一种搜索功能-->
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('文章管理', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        //给数据小部件提供数据 ，提供分页 等功能
        'dataProvider' => $dataProvider,
        //提供数据搜索功能
        'filterModel' => $searchModel,
        'columns' => [
            //去掉序号
            // ['class' => 'yii\grid\SerialColumn'],
            //设置样式宽度
            ['attribute' => 'id', 'contentOptions' => ['width' => '30px', 'text-align' => 'center']],
            'title',
            [
                //额外增加一个字段 ，按字符串进行搜索
                'attribute' => 'authorName',
                'label' => '作者',
                'value' => 'author.username',
            ],
            [
                'attribute'=>'content',
               // 'contentOptions' => ['width' => '100px', 'class' => 'word-break:break-all; word-wrap:break-all;','min-height'=>'30px']
               // 'value'=>$searchModel->Content,
            ],
            'tags:ntext',
            //'status', 第一种 关联查询后 ，重置值
            [
                'attribute' => 'status',
                'filter' => \common\models\Poststatus::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => 'status0.name'
            ],
            ['attribute' => 'create_time', 'format' => ['date', 'php:Y-m-d H:i:s']],
            ['attribute' => 'update_time', 'format' => ['date', 'php:Y-m-d H:i:s']],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
