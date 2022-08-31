<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kandidat */

$this->title = 'Pilih Kandidat Pegawai Teladan';
$this->params['breadcrumbs'][] = ['label' => 'Kandidats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kandidat-create">


    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

<center>
    <h2>Kriteria Penilaian sbb:</h2>
<?php  echo $this->render('penilaian'); ?>
</center>
</div>
