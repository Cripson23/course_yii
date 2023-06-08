<?php

use frontend\modules\admin\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Список заказов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">
    <row>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <?= Html::a('Создать заказ', ['create'], ['class' => 'btn btn-success']) ?>
                </div>

                <div class="card-body">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'pager' => [
                            'options' => [
                                'class' => 'pagination pagination-sm m-0 float-right',
                            ],
                            'linkOptions' => ['class' => 'page-link'],
                            'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link'],
                        ],
                        'columns' => [
                            'id',
                            'qty',
                            'total',
                            [
                                'attribute' => 'status',
                                'value' => function (Order $model) {
                                    return $model->getListStatuses(true)[$model->status];
                                },
                                'format' => 'raw'
                            ],
                            'name',
                            'email',
                            'phone',
                            'address',
                            [
                                'attribute' => 'created_at',
                                'format' => ['datetime', 'php:d M Y H:i']
                            ],
//                            [
//                                'attribute' => 'updated_at',
//                                'value' => function ($model) {
//                                    return Yii::$app->formatter->asDate($model->updated_at);
//                                }
//                            ],
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, Order $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'id' => $model->id]);
                                }
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </row>
</div>
