<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\HtmlPurifier;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '评论管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

   <h1><?= Html::encode($this->title)  ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?/*= Html::a('评论管理', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->
    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_post',
        'viewParams' => [
            'fullView' => true,
            'context' => 'main-page',
            // ...
        ],
    ]);
    ?>
    <hr>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'user.username',
                'value' => 'user.username',
                'label' => '用户名'
            ],
            'post.title',
            [
                'attribute' => 'status',
                'filter' => \common\models\Commentstatus::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => 'status0.name',
                //添加样式
                'contentOptions' => function ($model) {
                    return $model->status > 1 ? ['class' => 'danger'] : ['class' => 'success'];
                }
            ],
            [
                'attribute' => 'content',
                //value 使用匿名行数  参数为 对象 ，$key,$index,$column(数据列对象)
                //使用 getter  setter 设置属性
                'value' => 'Comments',
                /* function ($model) {
                    $content = strip_tags($model->content);
                    $content_len = mb_strlen($content);
                    return mb_substr($content, 0, 50, 'utf-8') . ($content_len > 50 ? '......' : '');
                }*/
                'label' => '评论详情',
            ],
            'create_time:datetime',

            // 'email:email',
            // 'url:url',
            // 'post_id',


            //['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}{approve}',
                'buttons' => [
                    'approve' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', '审核'),
                            'data-label' => Yii::t('yii', '审核'),
                            'data-confirm' => Yii::t('yii', '你确定通过这条评论'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-check"></span>', $url, $options);
                    },
                ]
            ]
        ],
    ]); ?>
</div>
