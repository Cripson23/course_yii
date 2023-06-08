<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>

<div class="banner">
    <?= $this->render('//layouts/inc/sidebar') ?>
    <div class="w3l_banner_nav_right">
        <h3><?= $name ?></h3>

        <p>
            <?= nl2br(Html::encode($message)) ?>
        </p>
    </div>
    <div class="clearfix"></div>
</div>