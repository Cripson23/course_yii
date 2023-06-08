<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\admin\models\Category $model */

$this->title = 'Редактирование категории: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="category-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
