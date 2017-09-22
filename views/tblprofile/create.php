<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tblprofile */

$this->title = 'Add Profile';
$this->params['breadcrumbs'][] = ['label' => 'Newly Elected Profile', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblprofile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'loclevels' => $loclevels,
		'positionlists' => $positionlists,
		'regions' => $regions,
		'provinces' => $provinces,
		'citymuns' => $citymuns,
		'partys' => $partys,

    ]) ?>

</div>
