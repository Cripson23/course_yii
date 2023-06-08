<?php

use yii\helpers\Url;

$this->title = 'Статистика магазина';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $orders ?></h3>

                <p>Заказов</p>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="<?= Url::to(['order/index']) ?>" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $products ?></h3>

                <p>Товаров</p>
            </div>
            <div class="icon">
                <i class="fa fa-lightbulb"></i>
            </div>
            <a href="<?= Url::to(['product/index']) ?>" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $categories ?></h3>

                <p>Категорий</p>
            </div>
            <div class="icon">
                <i class="fa fa-cubes"></i>
            </div>
            <a href="<?= Url::to(['category/index']) ?>" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
