<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tblprofile;

/**
 * TblprofileSearch represents the model behind the search form about `app\models\Tblprofile`.
 */
class TblprofileSearch extends Tblprofile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PROFILE_ID', ], 'integer'],
            [['REGION_C', 'PROVINCE_C', 'DISTRICT_C', 'CITYMUN_C', 'POLITICAL_PARTY_ID','POSITION_ID', 'LOC_LEVEL_ID', 'LAST_NAME', 'FIRST_NAME', 'MIDDLE_NAME', 'BIRTHDATE'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Tblprofile::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('loclevel');
        $query->joinWith('position');
        $query->joinWith('region');
        $query->joinWith('province');
        $query->joinWith('citymun');
        $query->joinWith('party');

        // grid filtering conditions
        $query->andFilterWhere([
            'PROFILE_ID' => $this->PROFILE_ID,
            // 'REGION_C' => $this->REGION_C,
            // 'PROVINCE_C' => $this->PROVINCE_C,
            // 'DISTRICT_C' => $this->DISTRICT_C,
            // 'CITYMUN_C' => $this->CITYMUN_C,
            // 'POLITICAL_PARTY_ID' => $this->POLITICAL_PARTY_ID,
        ]);

        $query->andFilterWhere(['like', 'LAST_NAME', $this->LAST_NAME])
            ->andFilterWhere(['like', 'FIRST_NAME', $this->FIRST_NAME])
            ->andFilterWhere(['like', 'MIDDLE_NAME', $this->MIDDLE_NAME])
            ->andFilterWhere(['like', 'BIRTHDATE', $this->BIRTHDATE])
            ->andFilterWhere(['like', 'Tblelectionloclevels.LOC_DESCRIPTION', $this->LOC_LEVEL_ID])
            ->andFilterWhere(['like', 'Tblregion.REGION_M', $this->REGION_C])
            ->andFilterWhere(['like', 'Tblprovince.LGU_M', $this->PROVINCE_C])
            ->andFilterWhere(['like', 'Tblcitymun.LGU_M', $this->CITYMUN_C])
            ->andFilterWhere(['like', 'Tblpositions.POSITION_DESC', $this->POSITION_ID])
            ->andFilterWhere(['like', 'Tblparty.NAME', $this->POLITICAL_PARTY_ID]);

        return $dataProvider;
    }
}
