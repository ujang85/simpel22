<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Rumpun;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
                <?=
                  $form->field($model, 'unit')->widget(Select2::classname(),[
                    'data'=>ArrayHelper::map(Rumpun::find()->all(),'nama_rumpun','nama_rumpun'),
                    'options' => ['placeholder' => 'Pilih Rumpun...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                    
                ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
