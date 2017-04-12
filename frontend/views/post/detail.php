<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use common\models\Comment;

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
                <li><a href="<?= Yii::$app->urlManager->createUrl(['post/index'])?>">文章列表</a></li>
                <li><a href="<?= $model->url ?>"><?= Html::encode($model->title); ?></a></li>
            </ol>
            <div class="post">
                <div class="title">
                    <h2><a href="<?= $model->url; ?>"><?= \yii\helpers\Html::encode($model->title) ?></a></h2>
                    <div class="author">
            <span class="glyphicon glyphicon-time"
                  aria-hidden="true"></span><em><?= date('Y-m-d  H:i:s', $model->create_time); ?></em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <em><?= \yii\helpers\Html::encode($model->author->username); ?></em>
                    </div>
                </div>
            </div>
            <br>
            <!--显示内容详情页面-->
            <div class="content">
                <?=

                HTMLPurifier::process($model->content);
                ?>
            </div>
            <?php if ($submit_comment) { ?>
                <div id="comments">
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <strong>我们会尽快回复您！</strong>
                        <span class="glyphicon glyphicon-user"
                              aria-hidden="true"></span><?= $model->author->nickname; ?>
                        <span class="glyphicon glyphicon-time"
                              aria-hidden="true"></span><?= date('Y-m-d  H:i:s', $model->create_time) ?>
                    </div>
                </div>
            <?php } ?>
            <?php if (!empty($tips_login)) { ?>
                <div id="comments">
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <strong><?= $tips_login  ?></strong>
                    </div>
                </div>
            <?php } ?>
            <!--显示标签-->
            <br>
            <div class="nav">
                <span class="glyphicon glyphicon-tag"></span>
                <?= implode(',', $model->tagLinks) ?>
                <br>
                <?= Html::a("评论({$model->CommentCount})") ?> &nbsp;|&nbsp;最后修改时间: <?= date('Y-m-d  H:i:s'); ?>

            </div>
            <!--显示评论内容-->
            <!--有人评论才显示-->
            <?php if ($model->CommentCount > 1): ?>
                <h5>评论总条数： <?php $model->CommentCount; ?></h5>
                <?=
                $this->render('_comments', [
                    'post' => $model,
                    'comments' => $model->comments,
                ]) ?>
            <?php endif; ?>
            <!--提交评论表单-->
            <?php
            //var_dump( new Comment());exit();
            $postComment = new Comment();
            echo $this->render('_submit', [
                'id' => $model->id,
                'postComment' => $postComment
            ]) ?>
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
                            'recentComments' => $recentComments,
                        ])
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>