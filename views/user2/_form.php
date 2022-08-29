<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Unit;
use app\models\Akses;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user2-form">

<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           
            'username',
           
            'dataakses.akses',
            'dataunit.nama_unit',
        ],
    ]) ?>

    <?php $form = ActiveForm::begin(); ?>

    

    <?=
    $form->field($model, 'hak_akses')->dropDownList(
            ArrayHelper::map(Akses::find()->all(),'id','akses')) 
    ?>

    <?=
    $form->field($model, 'unit')->dropDownList(
            ArrayHelper::map(Unit::find()->all(),'id','nama_unit')) 
    ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
