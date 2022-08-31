<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kandidat */

$this->title = 'Update Kandidat: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kandidat', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kandidat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
