<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tblprofile */

$this->title = 'Update Tblprofile: ' . $model->PROFILE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Tblprofiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PROFILE_ID, 'url' => ['view', 'id' => $model->PROFILE_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tblprofile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
