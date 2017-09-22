<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblelectionloclevels".
 *
 * @property integer $LOC_LEVEL_ID
 * @property string $LOC_DESCRIPTION
 */
class Tblelectionloclevels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblelectionloclevels';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOC_DESCRIPTION'], 'required'],
            [['LOC_DESCRIPTION'], 'string', 'max' => 100],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LOC_LEVEL_ID' => 'Loc  Level  ID',
            'LOC_DESCRIPTION' => 'Loc  Description',
        ];
    }
}
