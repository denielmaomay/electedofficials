<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;    
use app\models\Tblprofile;
use app\models\TblprofileSearch;
use app\models\Tblelectionloclevels;
use app\models\Tblpositions;
use app\models\Tblprovince;
use app\models\Tblcitymun;
use app\models\Tblregion;
use app\models\Tblparty;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TblprofileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Newly Elected Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblprofile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'PROFILE_ID',
            [
                'attribute' => 'LOC_LEVEL_ID',
                'value' => 'loclevel.LOC_DESCRIPTION',
                'filter' => Html::activeDropDownList($searchModel, 'LOC_LEVEL_ID', ArrayHelper::map(Tblelectionloclevels::find()->asArray()->all(),
                'LOC_DESCRIPTION', 'LOC_DESCRIPTION'),
                ['class'=>'form-control','prompt' => 'Select']),
            ],
            [
                'attribute' => 'POSITION_ID',
                'value' => 'position.POSITION_DESC',
            ],
            'LAST_NAME',
            'FIRST_NAME',
            'MIDDLE_NAME',
            [
                'attribute' => 'REGION_C',
                'value' => 'region.REGION_M',
                'filter' => Html::activeDropDownList($searchModel, 'REGION_C', ArrayHelper::map(Tblregion::find()->asArray()->all(), 'REGION_M', 'REGION_M'),
                ['class'=>'form-control','prompt' => 'Select']),
            ],
            [
                'attribute' => 'PROVINCE_C',
                'value' => 'province.LGU_M',
                'filter' => Html::activeDropDownList($searchModel, 'PROVINCE_C', ArrayHelper::map(Tblprovince::find()->asArray()->all(), 'LGU_M', 'LGU_M'),
                ['class'=>'form-control','prompt' => 'Select']),
            ],
            // 'DISTRICT_C',
            [
                'attribute' => 'CITYMUN_C',
                'value' => 'citymun.LGU_M',
                'filter' => Html::activeDropDownList($searchModel, 'CITYMUN_C', ArrayHelper::map(Tblcitymun::find()->asArray()->all(), 'LGU_M', 'LGU_M'),
                ['class'=>'form-control','prompt' => 'Select']),
            ],
            [
                'attribute' => 'POLITICAL_PARTY_ID',
                'value' => 'party.NAME',
                'format' => 'raw',
                // 'filter'=>ArrayHelper::map(Tblparty::find()->asArray()->all(), 'POLITICAL_PARTY_ID', 'NAME'),
                'filter' => Html::activeDropDownList($searchModel, 'POLITICAL_PARTY_ID', ArrayHelper::map(Tblparty::find()->asArray()->all(), 'NAME', 'NAME'),
                ['class'=>'form-control','prompt' => 'Select']),
            ],
            [
                'attribute' => 'BIRTHDATE',
                'value' => 'BIRTHDATE',
                'format' => 'raw',
                'filter'=>DatePicker::widget([
                        'model' =>$searchModel,
                        'attribute' => 'BIRTHDATE',
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true
                        ]
                    ]),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
