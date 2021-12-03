<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nba_event".
 *
 * @property int $id
 * @property string $event_date
 * @property string $event_time
 * @property int $team_home_id
 * @property int $team_away_id
 * @property int $total_home_team
 * @property int $total_away_team
 * @property int $home_first_time
 * @property int $away_first_time
 * @property int $home_second_time
 * @property int $away_second_time
 * @property int $home_third_time
 * @property int $away_third_time
 * @property int $home_fourth_time
 * @property int $away_fourth_time
 * @property int|null $home_over_total
 * @property int|null $away_over_total
 * @property string|null $slug
 * @property int $created_at
 * @property int $updated_at
 *
 * @property EventTeamAssignment[] $eventTeamAssignments
 * @property NbaTeam $teamAway
 * @property NbaTeam $teamHome
 */
class NbaEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nba_event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_date', 'event_time', 'team_home_id', 'team_away_id', 'total_home_team', 'total_away_team', 'home_first_time', 'away_first_time', 'home_second_time', 'away_second_time', 'home_third_time', 'away_third_time', 'home_fourth_time', 'away_fourth_time', 'created_at', 'updated_at'], 'required'],
            [['event_date', 'event_time'], 'safe'],
            [['team_home_id', 'team_away_id', 'total_home_team', 'total_away_team', 'home_first_time', 'away_first_time', 'home_second_time', 'away_second_time', 'home_third_time', 'away_third_time', 'home_fourth_time', 'away_fourth_time', 'home_over_total', 'away_over_total', 'created_at', 'updated_at'], 'integer'],
            [['slug'], 'string', 'max' => 255],
            [['team_away_id'], 'exist', 'skipOnError' => true, 'targetClass' => NbaTeam::className(), 'targetAttribute' => ['team_away_id' => 'id']],
            [['team_home_id'], 'exist', 'skipOnError' => true, 'targetClass' => NbaTeam::className(), 'targetAttribute' => ['team_home_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_date' => 'Event Date',
            'event_time' => 'Event Time',
            'team_home_id' => 'Team Home ID',
            'team_away_id' => 'Team Away ID',
            'total_home_team' => 'Total Home Team',
            'total_away_team' => 'Total Away Team',
            'home_first_time' => 'Home First Time',
            'away_first_time' => 'Away First Time',
            'home_second_time' => 'Home Second Time',
            'away_second_time' => 'Away Second Time',
            'home_third_time' => 'Home Third Time',
            'away_third_time' => 'Away Third Time',
            'home_fourth_time' => 'Home Fourth Time',
            'away_fourth_time' => 'Away Fourth Time',
            'home_over_total' => 'Home Over Total',
            'away_over_total' => 'Away Over Total',
            'slug' => 'Slug',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[EventTeamAssignments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventTeamAssignments()
    {
        return $this->hasMany(EventTeamAssignment::className(), ['event_id' => 'id']);
    }

    /**
     * Gets query for [[TeamAway]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeamAway()
    {
        return $this->hasOne(NbaTeam::className(), ['id' => 'team_away_id']);
    }

    /**
     * Gets query for [[TeamHome]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeamHome()
    {
        return $this->hasOne(NbaTeam::className(), ['id' => 'team_home_id']);
    }
}
