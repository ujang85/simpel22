<?php
use yii\helpers\Url;
use kartik\grid\GridView;
return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
        'header' => 'NO',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nama',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nip',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jabatan',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'rumpun',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'status',
    ], 

    [
        'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'active',
         'filter' => [1 => "ACTIVE",2 => "NON ACTIVE"],
                'value' => function ($model) {
                    $data=$model->active;
                    if($data==1)
                        {
                            return "ACTIVE";    
                        }else
                        {
                            return "NON ACTIVE";                           
                        }
            }, 
            'format' => 'raw',
            'noWrap' => true,
            'filterType' => GridView::FILTER_SELECT2,
            'filterInputOptions' => ['placeholder' => '*All*'],
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ], 
            
     ],

    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   