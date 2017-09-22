<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Tblelectionloclevels;
use app\models\Tblpositions;
use app\models\Tblregion;
use app\models\Tblparty;
use app\models\Tblprovince;
use app\models\Tblcitymun;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Tblprofile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblprofile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LOC_LEVEL_ID')->dropDownList(
        ArrayHelper::map($loclevels,'LOC_LEVEL_ID','LOC_DESCRIPTION'),
        [

            'prompt'=>'Select Location',
            'onchange'=>'
                $.post( "index.php?r=tblprofile/lists&id='.'"+$(this).val(), function( data ){
                    $( "select#tblprofile-position_id").html(data);
                });'

        ]); 
     ?>

    <?= $form->field($model, 'POSITION_ID')->dropDownList(
        ArrayHelper::map($positionlists,'POSITION_ID','POSITION_DESC'),['prompt'=>'Select Position']); ?>

    <?= $form->field($model, 'LAST_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FIRST_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MIDDLE_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'REGION_C')->dropDownList(
        ArrayHelper::map($regions,'REGION_C','REGION_M'),
        [

            'prompt'=>'Select Region',
            'onchange'=>'
                $.post( "index.php?r=tblprofile/listsp&id='.'"+$(this).val(), function( data ){
                    $( "select#tblprofile-province_c").html(data);
                });'

        ]); 

        ?>

    <?= $form->field($model, 'PROVINCE_C')->dropDownList(
        ArrayHelper::map($provinces,'PROVINCE_C','LGU_M'),
    [

            'prompt'=>'Select Province',
            'onchange'=>'
                $.post( "index.php?r=tblprofile/listsd&id='.'"+$(this).val(), function( data ){
                    $( "select#tblprofile-district_c").html(data);
                });
                $.post( "index.php?r=tblprofile/listsc&id='.'"+$(this).val(), function( data ){
                    $( "select#tblprofile-citymun_c").html(data);
                });'

        ]);  
        ?>

    <?= $form->field($model, 'CITYMUN_C')->dropDownList(
        ArrayHelper::map($citymuns,'CITYMUN_C','LGU_M'),['prompt'=>'Select City / Municipality',]); ?>

    <?= $form->field($model, 'BIRTHDATE')->widget(
    DatePicker::className(), [
        'name' => 'BIRTHDATE', 
    'value' => date('d-M-Y', strtotime('+2 days')),
    'options' => ['placeholder' => 'Select issue date ...'],
    'pluginOptions' => [
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true
        ]
]);?>

    <?= $form->field($model, 'POLITICAL_PARTY_ID')->dropDownList(
        ArrayHelper::map($partys,'POLITICAL_PARTY_ID','NAME'),['prompt'=>'Select Political Party',]); 
        ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
