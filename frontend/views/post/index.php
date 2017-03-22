<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/*
$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <ol class="breadcrumb">
                <li><a href="<?= Yii::$app->homeUrl ?>">首页</a></li>
                <li>文章列表</li>
            </ol>
            <?=
            \yii\widgets\ListView::widget([
                'id' => 'postlist',
                'dataProvider' => $dataProvider,
                'itemView' => '_postlist',
                'layout' => '{items}{pager}',
                'pager' => [
                    'maxButtonCount' => 20,
                    'nextPageLabel' => Yii::t('app', '下一页'),//'下一页',
                    'prevPageLabel' => Yii::t('app', '上一页'),//'上一页',
                ]
            ])
            ?>
        </div>
        <div class="col-md-3">
            <div class="searchbox">
                <ul class="list-group">
                    <li class="list-group-item"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>查找文章
                    </li>
                    <li class="list-group-item">
                        <form class="form-inline" action="/index.php?r=post/index" id="f_s" method="get">
                            <div class="form-group">
                                <input type="text" class="form-control" name="PostSearch[title]" id="input_search"
                                       placeholder="输入搜索标签">
                            </div>
                            <button type="submit" class="btn btn-default">搜索</button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="tagcloudbox">
                <ul class="list-group">
                    <li class="list-group-item"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>标签云
                    </li>
                    <li class="list-group-item">
                        <?=

                        \frontend\component\TagsCloudWeight::widget([
                            'tags' => $tags,
                        ])
                        ?>
                    </li>
                </ul>
            </div>
            <div class="commentbox">
                <ul class="list-group">
                    <li class="list-group-item"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>最新回复
                    </li>
                    <li class="list-group-item">
                        <?=
                        \frontend\component\RecentCommentWeight::widget([
                            'recentComments'=>$recentComments,
                        ])
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>