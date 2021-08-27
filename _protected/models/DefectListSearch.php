<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DefectList;

/**
 * DefectListSearch represents the model behind the search form of `app\models\DefectList`.
 */
class DefectListSearch extends DefectList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['defect_name', 'defect_code', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['cost'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = DefectList::find()->where('ISNULL(deleted_at)');

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'cost' => $this->cost,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
        ]);

        $query->andFilterWhere(['like', 'defect_name', $this->defect_name])
            ->andFilterWhere(['like', 'defect_code', $this->defect_code]);

        return $dataProvider;
    }
}
