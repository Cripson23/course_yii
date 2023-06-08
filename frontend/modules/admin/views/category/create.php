<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\admin\models\Category $model */

$this->title = 'Создать категорию';
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
