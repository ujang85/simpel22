<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kandidat */

$this->title = 'Pilih Kandidat Pegawai Teladan';
$this->params['breadcrumbs'][] = ['label' => 'Kandidats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kandidat-create">

<?= Html::a('<i class="glyphicon glyphicon-user"> Home</i>', ['/site/index'],
                              ['class'=>'btn btn-warning']) ?>
<center>
    <h2>Sebagai Acuan Kriteria Penilaian sbb:</h2>
<?php  echo $this->render('penilaian'); ?>
</center>
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>



</div>
