<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Skor Rumpun Medis';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<p class="lead"><h2>SKOR KANDIDAT PEGAWAI TELADAN RUMPUN MEDIS</h2></p> 
<h4>Jumlah responden : <?php
$command = Yii::$app->db->createCommand('SELECT count(user_pemilih) as responden from kandidat');
$result = $command->queryScalar();
        echo $result ; 
  ?></h4>
<div class="pegawai-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $SqlProvider,
        //    'filterModel' => $searchModel,
        //    'pjax'=>true,
            'columns' => require(__DIR__.'/_columnmedis.php'),
           
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Nama Kandidat Rumpun Medis',
                               
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>

