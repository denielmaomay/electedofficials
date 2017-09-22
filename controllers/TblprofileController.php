<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Tblprofile;
use app\models\TblprofileSearch;
use app\models\Tblelectionloclevels;
use app\models\Tblpositions;
use app\models\Tblprovince;
use app\models\Tblcitymun;
use app\models\Tblregion;
use app\models\Tblparty;

/**
 * TblprofileController implements the CRUD actions for Tblprofile model.
 */
class TblprofileController extends Controller
{
    /**
     * @inheritdoc
     */

    
    
    

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tblprofile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblprofileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblprofile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tblprofile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblprofile();
        $loclevels = Tblelectionloclevels::find()->all();
        $positionlists = Tblpositions::find()->all();
        $regions = Tblregion::find()->all();
        $provinces = Tblprovince::find()->all();
        $citymuns = Tblcitymun::find()->all();
        $partys = Tblparty::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->PROFILE_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'loclevels' => $loclevels,
                'positionlists' => $positionlists,
                'regions' => $regions,
                'provinces' => $provinces,
                'citymuns' => $citymuns,
                'partys' => $partys,

            ]);
        }
    }

    /**
     * Updates an existing Tblprofile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->PROFILE_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tblprofile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionLists($id)
    {
        $countTblpositions = Tblpositions::find()
        ->where(['LOC_LEVEL_ID' => $id])
        ->count();

        $Tblpositions = Tblpositions::find()
        ->where(['LOC_LEVEL_ID' => $id])
        ->all();

        if($countTblpositions > 0 )
        {
            echo "<option>Select Position</option>";
            foreach ($Tblpositions as $position ) {
                echo "<option value='".$position->POSITION_ID."'>".$position->POSITION_DESC."</option>";
            }
        }
    }


    public function actionListsp($id)
    {
        $countTblprovince = Tblprovince::find()
        ->where(['REGION_C' => $id])
        ->count();

        $Tblprovince = Tblprovince::find()
        ->where(['REGION_C' => $id])
        ->all();

        if($countTblprovince > 0 )
        {
            echo "<option>Select Province</option>";
            foreach ($Tblprovince as $province ) {
                echo "<option value='".$province->PROVINCE_C."'>".$province->LGU_M."</option>";
            }
        }
    }

    public function actionListsc($id)
    {
        $countTblcitymun = Tblcitymun::find()
        ->where(['PROVINCE_C' => $id])
        ->count();

        $Tblcitymun = Tblcitymun::find()
        ->where(['PROVINCE_C' => $id])
        ->all();

        if($countTblcitymun > 0 )
        {
            echo "<option>Select City / Municipality</option>";
            foreach ($Tblcitymun as $citymun ) {
                echo "<option value='".$citymun->CITYMUN_C."'>".$citymun->LGU_M."</option>";
            }
        }
    }
    /**
     * Finds the Tblprofile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblprofile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblprofile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
