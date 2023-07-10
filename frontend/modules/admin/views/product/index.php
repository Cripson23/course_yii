<?php

use frontend\modules\admin\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\modules\admin\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
    <div class="order-index">
        <row>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <p>
                            <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            'category_id',
                            'title',
                            'content:ntext',
                            'price',
                            //'old_price',
                            //'description',
                            //'keywords',
                            //'img',
                            //'is_offer',
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'id' => $model->id]);
                                 }
                            ],
                        ],
                    ]); ?>


</div>
