<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
/**
 * This is the model class for table "nba_team".
 *
 * @property int $id
 * @property string|null $team_name
 * @property string|null $slug
 *
 * @property EventTeamAssignment[] $eventTeamAssignments
 * @property NbaEvent[] $nbaEvents
 * @property NbaEvent[] $nbaEvents0
 * @property TeamStats[] $teamStats
 */
class NbaTeam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nba_team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['team_name', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'team_name' => 'Team Name',
            'slug' => 'Slug',
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'team_name',
                'slugAttribute' => 'slug',
            ],
        ];
    }
    /**
     * Gets query for [[EventTeamAssignments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventTeamAssignments()
    {
        return $this->hasMany(EventTeamAssignment::className(), ['team_id' => 'id']);
    }

    /**
     * Gets query for [[NbaEvents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNbaEvents()
    {
        return $this->hasMany(NbaEvent::className(), ['team_away_id' => 'id']);
    }

    /**
     * Gets query for [[NbaEvents0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNbaEvents0()
    {
        return $this->hasMany(NbaEvent::className(), ['team_home_id' => 'id']);
    }

    /**
     * Gets query for [[TeamStats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeamStats()
    {
        return $this->hasMany(TeamStats::className(), ['team_id' => 'id']);
    }
}
