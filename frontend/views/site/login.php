<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
?>
<div class="site-login">
    <div class="container">
        <div class="row">
            <div class="col-12 col-flex">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="register-box">
                    <div class="card card-outline card-primary">
                        <div class="card-header text-center m-3">
                            <img src="images/logo.png" alt="Autentificare SNIMP" class="brand-image img-circle" href="index.php?r=site/login">
                            <a href="index.php?r=site/signup" class="h1 d-flex flex-column">
                                <b>Autentificare</b><span class="text-primary">SNIMP</span>
                            </a>
                        </div>
                        <div class="card-body p-4 m-4">
                            <p class="login-box-msg"><b>Autentificare utilizator</b></p>

                            <?= $form->field($model, 'username', [
                                'inputOptions' => [
                                    'placeholder' => 'Utilizator',
                                ],
                                'inputTemplate' =>
                                    '<div class="input-group mb-3">
                                                {input}
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                    </div>
                                                </div>
                                            </div>'])->label(false);
                            ?>
                            <?= $form->field($model, 'password', [
                                'inputOptions' => [
                                    'placeholder' => 'Parola',
                                ],
                                'inputTemplate' =>
                                    '<div class="input-group mb-3">
                                    {input}
                                    <div class="input-group-append">                        
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>                        
                                        </div>                        
                                    </div>
                                </div>'])->passwordInput()->label(false);
                            ?>
                            <div class="form-group p-4 m-4">
                                <?= Html::submitButton('Autentificare', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                            </div>

                        </div>
                        <!-- /.form-box -->
                    </div><!-- /.card -->
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
