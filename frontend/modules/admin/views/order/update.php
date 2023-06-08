<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\modules\admin\models\Order $model */

$this->title = 'Редактирование заказа #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Заказ №{$model->id}", 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="order-update">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <?php $form = ActiveForm::begin(
                    [
                        'id' => 'update',
//                        'fieldConfig' => [
//                            'template' => "
//                                <div class='col-md-6'>
//                                    <p>{label}</p> \n {input} \n
//                                    <div>{error}</div>
//                                </div>
//                            "
//                        ]
                    ]);
                ?>
                    <div class="row">
                        <div class='col-md-6'>
                            <?= $form ->field($model, 'status')->dropDownList($model->getListStatuses()) ?>
                        </div>
                        <div class='col-md-6'>
                            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-md-6'>
                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class='col-md-6'>
                            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-md-6'>
                            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class='col-md-6'>
                            <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>
                        </div>
                    </div>
            </div>
            <div class="card-header">
                <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                    <?= Html::a('Отмена', ['order/index'], ['class' => 'btn btn-danger ml-3']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>