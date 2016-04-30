<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schools".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $created_date
 * @property string $deleted
 *
 * @property SchoolQuestions[] $schoolQuestions
 */
class School extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schools';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address'], 'required'],
            [['name', 'address'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'created_date' => 'Created Date',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(SchoolQuestions::className(), ['school_id' => 'id']);
    }

    function getSubscriptions() {
        return $this->hasMany(SchoolSubscription::className(), ['school_id' => "id"]);
    }

    function getStaffs() {
        return $this->hasMany(User::className(), ['school_id' => "id"]);
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if($this->isNewRecord) {
            $this->created_date = date("Y-m-d H:i:s");
        }

        return parent::beforeSave($insert);
    }
}
