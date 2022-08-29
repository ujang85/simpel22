<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Pegawai;
use kartik\select2\Select2;
use kartik\widgets\SwitchInput;
/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

 	<?= 
 	 $form->field($model, 'jabatan')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Pegawai::findBySql('select * from pegawai group by jabatan')->all(),'jabatan','jabatan'),
    'options' => ['placeholder' => 'Select a jabatan ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
	]);
	 ?>   

	 <?= 
 	 $form->field($model, 'status')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Pegawai::findBySql('select * from pegawai group by status')->all(),'status','status'),
    'options' => ['placeholder' => 'Select a status ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
	]);
	 ?> 

    <?= $form->field($model, 'rumpun')->dropDownList(
        ArrayHelper::map(Pegawai::findBySql('select * from pegawai group by rumpun')->all(),'rumpun','rumpun')
    )?>

    
        <?= $form->field($model, 'active')->dropDownList([
        'items'=>['1' => 'ACTIVE','2' => 'NON ACTIVE'],
            ])?>   
   

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
