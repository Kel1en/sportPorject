<?php


namespace common\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use common\models\Team;

class Event extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%event}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function getTeamById($id)
    {


    }
}