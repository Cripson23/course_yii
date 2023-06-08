<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= Url::to('/admin') ?>" class="h1"><b>Admin</b>Grocery</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?php $form = ActiveForm::begin() ?>
                <?= $form->field($model, 'username', ['template' =>
                    "<div class=\"input-group mb-3\">
                        {input}
                        <div class=\"input-group-append\">
                            <div class=\"input-group-text\">
                                <span class=\"fas fa-user\"></span>
                            </div>
                        </div>
                    </div><div>{error}</div>"])->textInput(['class' => 'form-control', 'placeholder' => 'Login']) ?>

                <?= $form->field($model, 'password', ['template' =>
                    "<div class=\"input-group mb-3\">
                    {input}
                    <div class=\"input-group-append\">
                        <div class=\"input-group-text\">
                            <span class=\"fas fa-lock\"></span>
                        </div>
                    </div>
                </div><div>{error}</div>"])->passwordInput(['class' => 'form-control', 'placeholder' => 'Password']) ?>

                <div class="row">
                    <div class="col-8">
                        <?= $form->field($model, 'rememberMe', ['template' => "<div class=\"icheck-primary\">{input}</div>"])->checkbox() ?>
                    </div>
                    <div class="col-4">
                        <?= Html::submitButton('Login', ['class' => "btn btn-primary btn-block"]) ?>
                    </div>
                </div>
            <?php ActiveForm::end() ?>

            <!-- <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="register.html" class="text-center">Register a new membership</a>
            </p> -->
        </div>
    </div>
</div>