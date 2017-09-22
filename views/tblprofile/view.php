<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Tblelectionloclevels;

/* @var $this yii\web\View */
/* @var $model app\models\Tblprofile */

$this->title = $model->PROFILE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Tblprofiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblprofile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->PROFILE_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->PROFILE_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'PROFILE_ID',
            'loclevel.LOC_DESCRIPTION',
            'position.POSITION_DESC',
            'LAST_NAME',
            'FIRST_NAME',
            'MIDDLE_NAME',
            'region.REGION_M',
            'province.LGU_M',
            // 'DISTRICT_C',
            'citymun.LGU_M',
            'BIRTHDATE',
            'party.NAME',
        ],

    ]) ?>

</div>
