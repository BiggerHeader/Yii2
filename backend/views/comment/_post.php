<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2017-03-20
 * Time: 19:44
 */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <h2><?= Html::encode($model->email) ?></h2>

    <?= HtmlPurifier::process($model->content) ?>
</div>