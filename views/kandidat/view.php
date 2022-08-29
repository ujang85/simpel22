<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kandidat */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kandidats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kandidat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Kembali', ['index', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        //    'id',
            'user_pemilih',
            [
                'attribute'=>'nip_medis',
                'format' => 'raw',
                'value'=>$model->pegawaiMedis->nama,
            ],
            [
                'attribute'=>'nip_kpkl',
                'format' => 'raw',
                'value'=>$model->pegawaiKPKL->nama,
            ],
            [
                'attribute'=>'nip_perawat',
                'format' => 'raw',
                'value'=>$model->pegawaiPerawat->nama,
            ],
            [
                'attribute'=>'nip_umum',
                'format' => 'raw',
                'value'=>$model->pegawaiUmum->nama,
            ],
            'tgl',
        ],
    ]) ?>

</div>
