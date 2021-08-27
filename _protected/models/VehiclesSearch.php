<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vehicles;

/**
 * VehiclesSearch represents the model behind the search form of `app\models\Vehicles`.
 */
class VehiclesSearch extends Vehicles
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'model_id'], 'integer'],
            [['pono', 'vin_number', 'created_at', 'updated_at'], 'safe'],
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
        $query = Vehicles::find();

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
            'model_id' => $this->model_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'pono', $this->pono])
            ->andFilterWhere(['like', 'vin_number', $this->vin_number]);

        return $dataProvider;
    }
}
