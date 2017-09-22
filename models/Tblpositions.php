<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblpositions".
 *
 * @property integer $POSITION_ID
 * @property string $POSITION_DESC
 * @property integer $LOC_LEVEL_ID
 */
class Tblpositions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblpositions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['POSITION_DESC', 'LOC_LEVEL_ID'], 'required'],
            [['LOC_LEVEL_ID'], 'integer'],
            [['POSITION_DESC'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'POSITION_ID' => 'Position  ID',
            'POSITION_DESC' => 'Position  Desc',
            'LOC_LEVEL_ID' => 'Loc  Level  ID',
        ];
    }
}
