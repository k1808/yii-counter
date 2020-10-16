<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;

$this->title = 'Counter';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="site-login-wrap">
        <h1><?= Html::encode($this->title) ?></h1>


        <div class="row">
            <div class="col-lg-5 text-center site-login-block">
                <div class="counter-block">
                    <?php Pjax::begin(); ?>
                    <div class="counter-item"><?= $model->counter; ?></div>

                    <?php Pjax::end(); ?>

                    <div class="form-group">
                        <?= Html::a('+1', ['/site/add-counter'], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Logout', ['/site/logout'], ['class' => 'btn btn-primary', 'data-method' => 'POST']) ?>
                    </div>
            </div>

            </div>
        </div>
    </div>
</div>
