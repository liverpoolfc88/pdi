<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shops".
 *
 * @property int $id
 * @property string $name
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Shops extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shops';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nomi',
            'created_at' => 'Qo`shilgan vaqti',
            'updated_at' => 'O`zgartirilgan vaqti',
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
