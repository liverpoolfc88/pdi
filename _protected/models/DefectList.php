<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "defect_list".
 *
 * @property int $id
 * @property string $defect_name
 * @property string $defect_code
 * @property float $cost
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 */
class DefectList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'defect_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['defect_name', 'defect_code'], 'required'],
            [['cost'], 'number'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['defect_name', 'defect_code'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [

            'id' => 'ID',
            'defect_name' => 'Defect nomi',
            'defect_code' => 'Defect kodi',
            'cost' => 'Mablag`',
            'created_at' => 'Qo`shilgan vaqti',
            'updated_at' => 'O`zgartirilgan vaqti',
            'deleted_at' => 'Ochirilgan vaqti',
            'created_by' => 'Kim tomonidan qo`shilgan',
            'updated_by' => 'Kim tomonidan o`zgartirilgan',
            'deleted_by' => 'Kim tomonidan o`chirilgan',
        ];
    }

    public function beforeSave($insert){

        if($insert){

            $this->created_at = date('Y-m-d H:i:s');
            $this->created_by = Yii::$app->user->identity->id;

        }else{

            $this->updated_at = date('Y-m-d H:i:s');
            $this->updated_by = Yii::$app->user->identity->id;

        }

        return parent::beforeSave($insert);
    }


    public function getDeff(){

        return $this->hasMany(VehicleDefects::className(), ['defect_id' => 'id']);
    }

    public function getVcount()

    {
        return $this->getDeff()->count();
    }

}
