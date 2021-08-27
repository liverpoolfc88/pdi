<?php

namespace app\models;

use Yii;
use app\models\Level1;

/**
 * This is the model class for table "level_2".
 *
 * @property int $id
 * @property string $name
 * @property int $level1_id
 * @property string|null $side R-right, L-Left
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Level2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'level_2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'level1_id'], 'required'],
            [['level1_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['side'], 'string', 'max' => 1],
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
            'level1_id' => 'Level 1 ',
            'side' => 'Holat',
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
    public function getlevel1()
    {
        return $this->hasOne(Level1::className(), ['id' => 'level1_id']);
    }
}
