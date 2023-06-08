<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\modules\admin\models\Category $model */

$this->title = "Категория: " . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <p>
                    <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary mr-3']) ?>
                    <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
            </div>
            <div class="card-body">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        [
                            'attribute' => 'parent_id',
                            'value' => function($model) {
                                return isset($model->parentCategory->title) ?
                                    Html::a($model->parentCategory->title,
                                        ['view', 'id' => $model->parentCategory->id]) : 'Корневая';
                            },
                            'format' => 'raw'
                        ],
                        'title',
                        'description',
                        'keywords',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
