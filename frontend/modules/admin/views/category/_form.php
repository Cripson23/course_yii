<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\modules\admin\models\Category $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="category-form">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class='col-md-6'>
                        <div class="form-group field-category-parent_id has-success">
                            <label class="control-label" for="category-parent_id">Родительская категория</label>
                            <select id="category-parent_id" class="form-control" name="Category[parent_id]" aria-invalid="false">
                                <option value="0">Корневая</option>
                                <?= \frontend\components\MenuWidget::widget([
                                    'tpl' => 'select',
                                    'model' => $model,
                                    'cache_time' => 0
                                ]); ?>
                            </select>
                            <div class="help-block"></div>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class='col-md-6'>
                        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class='col-md-6'>
                        <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
