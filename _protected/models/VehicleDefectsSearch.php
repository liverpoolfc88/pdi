<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VehicleDefects;

/**
 * VehicleDefectsSearch represents the model behind the search form of `app\models\VehicleDefects`.
 */
class VehicleDefectsSearch extends VehicleDefects
{
    public $startdt, $enddt, $vinno, $pono, $model_code, $model_name;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'shop_id', 'level1_id', 'level2_id', 'level3_id', 'defect_id', 'defect_count', 'created_by', 'updated_by', 'deleted_by', 'status', 'side'], 'integer'],
            [['vehicle_id', 'created_at','date', 'updated_at', 'deleted_at', 'comment', 'startdt', 'enddt', 'vinno', 'pono', 'model_code', 'model_name'], 'safe'],
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
        $b_id = \Yii::$app->user->identity->branch_id;
//        $u = User::find()->where(['in','branch_id', $b_id])->all();
        $u = User::find()->where(['branch_id' => $b_id])->asArray()->all();
        $u_ids = [];
        foreach ($u as $u_id) {
            $u_ids[] = $u_id['id'];
        }
//        var_dump($u_ids); die();

//        $b_id = (string)$b_id;

        if (\Yii::$app->user->identity->role == 'production') {
            $idd = \Yii::$app->user->identity->shop_id;
            $query = VehicleDefects::find()
                ->where('ISNULL(deleted_at)')
                ->andWhere(['shop_id' => $idd])
                ->andWhere(['in', 'created_by', $u_ids]);
//            $query->joinWith('vehicledef');
            $query->innerJoinWith('vehicledef.model');
        } else {
//            var_dump($this->getUser()); die();
//            $query = VehicleDefects::find()->where('ISNULL(deleted_at)');
//            var_dump($this->getUserid($b_id)); die();
            $query = VehicleDefects::find()
                ->where('ISNULL(deleted_at)')
                ->andWhere(['in', 'created_by', $u_ids])
            ;
//            $query->joinWith('vehicledef');
            $query->innerJoinWith('vehicledef.model');
        }
//        var_dump($query); die();
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
//            'vehicle_id' => $this->vehicle_id,
            'shop_id' => $this->shop_id,
            'level1_id' => $this->level1_id,
            'level2_id' => $this->level2_id,
            'level3_id' => $this->level3_id,
            'defect_id' => $this->defect_id,
            'defect_count' => $this->defect_count,
//            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'status' => $this->status,
            'side' => $this->side,
        ]);
//        ($this->created_at == 0) ?
//            $query->andFilterWhere(['between', 'vehicle_defects.created_at', $this->startdt, $this->enddt]);
        $query->andFilterWhere(['like', 'comment', $this->comment]);
//        $query->andFilterWhere(['like', 'models.model_name', $this->vehicle_id]);
        $query->andFilterWhere(['like', 'models.model_name', $this->model_name]);
        $query->andFilterWhere(['like', 'models.model_code', $this->model_code]);
        $query->andFilterWhere(['like', 'vehicles.vin_number', $this->vinno]);
        $query->andFilterWhere(['like', 'vehicles.pono', $this->pono]);
        $query->andFilterWhere(['between', 'vehicle_defects.created_at', $this->startdt, $this->enddt]);
        $query->andFilterWhere(['between', 'vehicle_defects.date', $this->startdt, $this->enddt]);
        $query->andFilterWhere(['like', 'vehicle_defects.date', $this->date]);
        $query->andFilterWhere(['like', 'vehicle_defects.created_at', $this->created_at]);

        return $dataProvider;
    }
}
