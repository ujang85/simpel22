<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Pegawai;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Kandidat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kandidat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_pemilih')->HiddenInput(['maxlength' => true])->label(false) ?>
    <?= 
     $form->field($model, 'nip_medis')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Pegawai::findBySql('select * from pegawai where rumpun="DOKTER" and active=1')->all(),'nip','nama'),
    'options' => ['placeholder' => 'Select a nama ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);
     ?>

    <?= 
     $form->field($model, 'nip_kpkl')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Pegawai::findBySql('select * from pegawai where rumpun="KPKL" and active=1')->all(),'nip','nama'),
    'options' => ['placeholder' => 'Select a nama ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);
     ?> 

     <?= 
     $form->field($model, 'nip_perawat')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Pegawai::findBySql('select * from pegawai where rumpun="perawat" and active=1')->all(),'nip','nama'),
    'options' => ['placeholder' => 'Select a nama ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);
     ?> 

     <?= 
     $form->field($model, 'nip_umum')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Pegawai::findBySql('select * from pegawai where rumpun="umum" and active=1')->all(),'nip','nama'),
    'options' => ['placeholder' => 'Select a nama ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);
     ?> 

    <?= $form->field($model, 'tgl')->HiddenInput(['maxlength' => true])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
