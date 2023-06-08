<?php

use frontend\modules\admin\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\modules\admin\models\CategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
    <row>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p>
                        <?= Html::a('Создать категорию', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>
                </div>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <div class="card-body">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            'id',
                            'title',
                            [
                                'attribute' => 'parent_id',
                                'content' => function($model) {
                                    return $model->parentCategory->title ?? 'Корневая';
                                }
                            ],
                            'description',
                            'keywords',
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, Category $model, $key, $index, $column) {
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
