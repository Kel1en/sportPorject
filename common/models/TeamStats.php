<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "team_stats".
 *
 * @property int $team_id
 * @property int|null $games
 * @property int|null $winnings
 * @property int|null $losses
 * @property int|null $goals_scored
 * @property int|null $missed_goals
 * @property int|null $average_total
 * @property int|null $average_total_one
 * @property int|null $average_total_two
 * @property int|null $average_total_three
 * @property int|null $average_total_four
 * @property int|null $average_over_total
 *
 * @property NbaTeam $team
 */
class TeamStats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team_stats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['team_id'], 'required'],
            [['team_id', 'games', 'winnings', 'losses', 'goals_scored', 'missed_goals', 'average_total', 'average_total_one', 'average_total_two', 'average_total_three', 'average_total_four', 'average_over_total'], 'integer'],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => NbaTeam::className(), 'targetAttribute' => ['team_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'team_id' => 'Team ID',
            'games' => 'Games',
            'winnings' => 'Winnings',
            'losses' => 'Losses',
            'goals_scored' => 'Goals Scored',
            'missed_goals' => 'Missed Goals',
            'average_total' => 'Average Total',
            'average_total_one' => 'Average Total One',
            'average_total_two' => 'Average Total Two',
            'average_total_three' => 'Average Total Three',
            'average_total_four' => 'Average Total Four',
            'average_over_total' => 'Average Over Total',
        ];
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
