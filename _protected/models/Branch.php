<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "branch".
 *
 * @property int $id
 * @property string $name_loc
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Branch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_loc'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name_loc'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_loc' => 'Name Loc',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
