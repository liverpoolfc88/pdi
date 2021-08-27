<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicles".
 *
 * @property int $id
 * @property string $pono
 * @property string $vin_number
 * @property int $model_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Vehicles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['pono', 'vin_number', 'model_id'], 'required'],
            [['pono'], 'required'],
            [['model_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['pono'], 'string', 'max' => 6],
            [['vin_number'], 'string', 'max' => 19],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pono' => 'Pono',
            'vin_number' => 'Vin Number',
            'model_id' => 'Model ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getModel()
    {
        return $this->hasOne(Models::className(), ['id' => 'model_id'])
//            ->select('model_name')
            ;
    }
    public function beforeSave($insert){
        if($insert){

            $this->created_at = date('Y-m-d H:i:s');
        }else{

            $this->updated_at = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }
}
