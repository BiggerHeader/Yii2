<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2017-03-21
 * Time: 20:50
 */
?>
<?php foreach ($comments as $comment): ?>
<div class="comment">
    <div class="row">
        <div class="col-md-9">
            <div class="comment_detail">
                <p class="bg-info"></p>
                <span class="glyphicon glyphicon-user"></span>&nbsp;<em><?= \yii\helpers\Html::encode($comment->user->username) ?></em>
                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                <span class="glyphicon glyphicon-time"
                      aria-hidden="true"></span><em> &nbsp;<?= date('Y-m-d  H:i:s', $comment->create_time); ?></em>&nbsp;&nbsp;
                <br>
                <?= nl2br($comment->content) ?>
                <br>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>

