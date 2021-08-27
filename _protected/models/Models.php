<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "models".
 *
 * @property int $id
 * @property string $model_code
 * @property string $model_name
 * @property int $created_at
 */
class Models extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'models';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model_code', 'model_name', ], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['model_code'], 'string', 'max' => 5],
            [['model_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model_code' => 'Model Code',
            'model_name' => 'Model Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
