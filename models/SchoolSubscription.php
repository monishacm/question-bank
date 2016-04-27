<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school_subscriptions".
 *
 * @property integer $id
 * @property integer $school_id
 * @property string $types
 * @property string $start_date
 * @property string $expiry
 * @property string $deleted
 *
 * @property Schools $school
 */
class SchoolSubscription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_subscriptions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id'], 'required'],
            [['school_id'], 'integer'],
            [['types', 'deleted'], 'string'],
            [['start_date', 'expiry'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_id' => 'School ID',
            'types' => 'Types',
            'start_date' => 'Start Date',
            'expiry' => 'Expiry',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(Schools::className(), ['id' => 'school_id']);
    }
}
