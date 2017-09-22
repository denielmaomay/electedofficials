<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblprofileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblprofile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PROFILE_ID') ?>

    <?= $form->field($model, 'LOC_LEVEL_ID') ?>

    <?= $form->field($model, 'POSITION_ID') ?>

    <?= $form->field($model, 'LAST_NAME') ?>

    <?= $form->field($model, 'FIRST_NAME') ?>

    <?php  echo $form->field($model, 'MIDDLE_NAME') ?>

    <?php  echo $form->field($model, 'REGION_C') ?>

    <?php  echo $form->field($model, 'PROVINCE_C') ?>

    <?php // echo $form->field($model, 'DISTRICT_C') ?>

    <?php  echo $form->field($model, 'CITYMUN_C') ?>

    <?php  echo $form->field($model, 'BIRTHDATE') ?>

    <?php  echo $form->field($model, 'POLITICAL_PARTY_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
