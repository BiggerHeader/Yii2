<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2017-03-20
 * Time: 20:54
 */
?>
<div class="post">
    <div class="title">
        <h2><a href="<?= $model->Url; ?>"><?= \yii\helpers\Html::encode($model->title) ?></a></h2>
        <div class="author">
            <span class="glyphicon glyphicon-time"
                  aria-hidden="true"></span><em><?= date('Y-m-d  H:i:s', $model->create_time); ?></em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            <em><?= \yii\helpers\Html::encode($model->author->username); ?></em>
        </div>
    </div>
    <div class="content">
        <?=
        //摘取文章开头的内容展示
        $model->Content;
        ?>
    </div>
    <br>
    <div class="nav">
        <!--显示标签-->
        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
        <?= implode(',', $model->tagLinks) ?>
        <br>
        <!--显示评论条数-->
        <?= \yii\helpers\Html::a("评论({$model->commentCount})", $model->Url . "#comment") ?> &nbsp;|&nbsp;
        最后修改时间：<?= date('Y-m-d  H:i:s', $model->update_time) ?>
    </div>


</div>
