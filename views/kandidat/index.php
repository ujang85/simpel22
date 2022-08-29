<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\KandidatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kandidats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kandidat-index">

   <div class="jumbotron">

        
        <p class="lead"><h2>PILIH KANDIDAT PEGAWAI TELADAN</h2></p>     
    </div>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Pilih Kandidat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary'=>'',
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
            ],
            [
                'attribute'=>'nip_medis',
                'format' => 'raw',
                'value'=>'pegawaiMedis.nama',
            ],
            [
                'attribute'=>'nip_perawat',
                'format' => 'raw',
                'value'=>'pegawaiPerawat.nama',
            ],
            [
                'attribute'=>'nip_kpkl',
                'format' => 'raw',
                'value'=>'pegawaiKPKL.nama',
            ],
            [
                'attribute'=>'nip_umum',
                'format' => 'raw',
                'value'=>'pegawaiUmum.nama',
            ],
            'tgl',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
