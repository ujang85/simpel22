<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\administrator\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ubah Password User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">


	<br>
	<div class="box box-solid box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Data User</h3>
   
  </div>
<div style="overflow-x:auto"> 
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'summary' =>'',
		'columns' => [
		['class' => 'yii\grid\SerialColumn','header' => 'No.'],

			//'id',
			'username',
			//'auth_key',
			//'password_hash',
			//'password_reset_token',
			'email:email',
		/*	[
				'attribute' => 'roles',
				'format' => 'raw',
				'value' => function ($data) {
					$roles = [];
					foreach ($data->roles as $role) {
						$roles[] = $role->item_name;
					}
					return Html::a(implode(', ', $roles), ['view', 'id' => $data->id]);
				}
			], */
			[
				'attribute' => 'status',
				'format' => 'raw',
				'options' => [
					'width' => '80px',
				],
				'value' => function ($data) {
					if ($data->status == 10)
						return "<span class='label label-primary'>" . 'Active' . "</span>";
					else
						return "<span class='label label-danger'>" . 'Banned' . "</span>";
				}
			],
			[
				'attribute' => 'created_at',
				'format' => ['date', 'php:d M Y H:i:s'],
				'options' => [
					'width' => '120px',
				],
			],
			[
				'attribute' => 'updated_at',
				'format' => ['date', 'php:d M Y H:i:s'],
				'options' => [
					'width' => '120px',
				],
			],
			[
        'format'=>'raw',
        'header'=>'Aksi',
        'value' => function($data){                        
        return                        
        Html::a('<span class="glyphicon glyphicon-edit"></span> Ubah Password', ['ubah','id'=>$data->id], ['title' => 'Upload','class'=>'btn btn-success']);                          
       
        }                          
    ],   
		],
	]); ?>

</div>
</div>
