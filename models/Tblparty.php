<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblparty".
 *
 * @property integer $POLITICAL_PARTY_ID
 * @property string $NAME
 */
class Tblparty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblparty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME'], 'required'],
            [['NAME'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'POLITICAL_PARTY_ID' => 'Political  Party  ID',
            'NAME' => 'Name',
        ];
    }
}
