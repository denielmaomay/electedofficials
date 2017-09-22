<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblprofile".
 *
 * @property integer $PROFILE_ID
 * @property integer $LOC_LEVEL_ID
 * @property integer $POSITION_ID
 * @property string $LAST_NAME
 * @property string $FIRST_NAME
 * @property string $MIDDLE_NAME
 * @property integer $REGION_C
 * @property integer $PROVINCE_C
 * @property integer $DISTRICT_C
 * @property integer $CITYMUN_C
 * @property string $BIRTHDATE
 * @property integer $POLITICAL_PARTY_ID
 */
class Tblprofile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblprofile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOC_LEVEL_ID', 'POSITION_ID', 'LAST_NAME', 'FIRST_NAME', 'MIDDLE_NAME', 'REGION_C', 'PROVINCE_C', 'CITYMUN_C', 'BIRTHDATE', 'POLITICAL_PARTY_ID'], 'required'],
            [['LOC_LEVEL_ID', 'POSITION_ID', 'REGION_C', 'PROVINCE_C', 'DISTRICT_C', 'CITYMUN_C', 'POLITICAL_PARTY_ID'], 'integer'],
            [['LAST_NAME', 'FIRST_NAME', 'MIDDLE_NAME', 'BIRTHDATE'], 'string', 'max' => 100],
        ];
    }
    public function getLoclevel()
    {
        return $this->hasOne(Tblelectionloclevels::className(), ['LOC_LEVEL_ID' => 'LOC_LEVEL_ID']);
    }
    public function getPosition()
    {
        return $this->hasOne(Tblpositions::className(), ['POSITION_ID' => 'POSITION_ID']);
    }
    public function getRegion()
    {
        return $this->hasOne(Tblregion::className(), ['REGION_C' => 'REGION_C']);
    }
    public function getProvince()
    {
        return $this->hasOne(Tblprovince::className(), ['PROVINCE_C' => 'PROVINCE_C']);
    }
    public function getCitymun()
    {
        return $this->hasOne(Tblcitymun::className(), ['REGION_C' => 'REGION_C', 'PROVINCE_C' => 'PROVINCE_C', 'CITYMUN_C' => 'CITYMUN_C']);
    }
    public function getParty()
    {
        return $this->hasOne(Tblparty::className(), ['POLITICAL_PARTY_ID' => 'POLITICAL_PARTY_ID']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PROFILE_ID' => 'Profile  ID',
            'LOC_LEVEL_ID' => 'Level (By Location)',
            'POSITION_ID' => 'Position',
            'LAST_NAME' => 'Last  Name',
            'FIRST_NAME' => 'First  Name',
            'MIDDLE_NAME' => 'Middle  Name',
            'REGION_C' => 'Region',
            'PROVINCE_C' => 'Province',
            'DISTRICT_C' => 'District',
            'CITYMUN_C' => 'City / Municipality',
            'BIRTHDATE' => 'Birthdate',
            'POLITICAL_PARTY_ID' => 'Political  Party',
        ];
    }
}
