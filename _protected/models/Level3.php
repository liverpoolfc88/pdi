<?php

namespace app\models;

use Yii;
use app\models\Level2;

/**
 * This is the model class for table "level_3".
 *
 * @property int $id
 * @property string $name
 * @property int $level2_id
 * @property string|null $side R-right, L-Left
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Level3 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'level_3';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'level2_id'], 'required'],
            [['level2_id'], 'integer'],
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
            'level2_id' => 'Level 2',
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
    public function getlevel2()
    {
        return $this->hasOne(Level2::className(), ['id' => 'level2_id']);
    }
}
