<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event_team_assignment".
 *
 * @property int $event_id
 * @property int $team_id
 *
 * @property NbaEvent $event
 * @property NbaTeam $team
 */
class EventTeamAssignement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_team_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'team_id'], 'required'],
            [['event_id', 'team_id'], 'integer'],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => NbaEvent::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => NbaTeam::className(), 'targetAttribute' => ['team_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_id' => 'Event ID',
            'team_id' => 'Team ID',
        ];
    }

    /**
     * Gets query for [[Event]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(NbaEvent::className(), ['id' => 'event_id']);
    }

    /**
     * Gets query for [[Team]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(NbaTeam::className(), ['id' => 'team_id']);
    }
}
