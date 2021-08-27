<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicle_defects".
 *
 * @property int $id
 * @property int $vehicle_id
 * @property int $shop_id
 * @property int $level1_id
 * @property int $level2_id
 * @property int|null $level3_id
 * @property int $defect_id
 * @property int $defect_count
 * @property string|null $created_at
 * @property string|null $close_status_date
 * @property string|null $date
 * @property string|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property int $status
 * @property string|null $comment
 * @property int|null $side
 */
class VehicleDefects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle_defects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vehicle_id', 'shop_id', 'level1_id', 'level2_id', 'defect_id'], 'required'],
            [['vehicle_id', 'shop_id', 'level1_id', 'level2_id', 'level3_id', 'defect_id', 'defect_count', 'created_by', 'updated_by', 'deleted_by', 'status', 'side'], 'integer'],
            [['close_status_date','created_at','date', 'updated_at', 'deleted_at'], 'safe'],
            [['comment','file'], 'string'],
//            [ 'file', 'extensions' => ['pdf', 'doc', 'docx', 'txt'], 'maxSize' =>  2, 'tooBig' => 'A resume can\'t be larger than 2 mb.', 'wrongExtension' => 'Only {extensions} types are allowed for {attribute}.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vehicle_id' => 'Vehicle ID',
            'shop_id' => 'Tsexlar',
            'level1_id' => 'Level1',
            'level2_id' => 'Level2',
            'level3_id' => 'Level3',
            'defect_id' => 'Nuqson',
            'defect_count' => 'Defect Count',
            'created_at' => 'Qo`shilgan sana',
            'date' => 'Qo`shilgan sana',
            'updated_at' => 'O`zgartirilgan sana',
            'deleted_at' => 'O`chirilgan sana',
            'close_status_date' => 'Status yopilgan vaqt',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'deleted_by' => 'Deleted By',
            'status' => 'Status',
            'comment' => 'Izox',
            'side' => 'Holat',
        ];
    }
    public function getVehicledef()
    {
        return $this->hasOne(Vehicles::className(), ['id' => 'vehicle_id']);
    }
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id']);
    }
    public function getLevel1()
    {
        return $this->hasOne(Level1::className(), ['id' => 'level1_id']);
    }
    public function getLevel2()
    {
        return $this->hasOne(Level2::className(), ['id' => 'level2_id']);
    }
    public function getLevel3()
    {
        return $this->hasOne(Level3::className(), ['id' => 'level3_id']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    public function getUserid($b_id)
    {
        return $this->getUser()->where(['branch_id' => $b_id]);
    }

    public function getDef()
    {
        return $this->hasOne(DefectList::className(), ['id' => 'defect_id']);
    }
    public function beforeSave($insert){
        if($insert){
            $this->created_at = date('Y-m-d H:i:s');
            $time = date('H:i:s');
            $this->date = ($time < '08:00:00') ?  date('Y-m-d', strtotime( ' - 1 days')): date('Y-m-d');
//            $this->date =  date('Y-m-d', strtotime( ' - 1 days'));
        }
        return parent::beforeSave($insert);
    }
}
