<?php


namespace common\models;

use yii\db\ActiveRecord;

class Team extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%team}}';
    }
}