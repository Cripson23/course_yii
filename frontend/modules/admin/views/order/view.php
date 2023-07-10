<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\modules\admin\models\Order $model */
/** @var frontend\modules\admin\models\Product $products */

$this->title = 'Заказ #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?= Html::a('Все заказы', ['index'], ['class' => 'btn btn-warning']) ?>
                <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary ml-3']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger ml-3',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
            <div class="card-body">
                <?= DetailView::widget([
                    'template' => "<tr><th class='w-50'>{label}</th><td class='w-50'>{value}</td></tr>",
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'created_at:datetime',
                        'updated_at:datetime',
                        'qty',
                        'total',
                        [
                            'attribute' => 'status',
                            'value' => $model->getListStatuses(true)[$model->status],
                            'format' => 'raw'
                        ],
                        'name',
                        'email',
                        'phone',
                        'address',
                        'note:ntext',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Товары в заказе</h3>
            </div>
            <div class="card-body">
                <?php foreach ($products as $idx => $product): ?>
                <?php if (!($idx % 2)): ?>
                <div class="row">
                <?php endif; ?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>#<?= $product->id ?></h4>
                            </div>
                            <div class="card-body">
                                <?= DetailView::widget([
                                    'template' => "<tr><th class='w-50'>{label}</th><td class='w-50'>{value}</td></tr>",
                                    'model' => $product,
                                    'attributes' => [
                                        'title',
                                        'price',
                                        'qty',
                                        'total',
                                    ],
                                ]) ?>
                            </div>
                        </div>
                    </div>
                <?php if ($idx % 2 || $idx == count($products)-1): ?>
                    </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>