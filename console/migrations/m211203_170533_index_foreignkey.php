<?php

use yii\db\Migration;

/**
 * Class m211203_170533_index_foreignkey
 */
class m211203_170533_index_foreignkey extends Migration
{
    public function up(){

        $this->createIndex('{{%idx-nba_team-id}}', '{{%nba_team}}', 'id');
        $this->createIndex('{{%idx-event_team_assignments-event_id}}', '{{%event_team_assignment}}', 'event_id');
        $this->createIndex('{{%idx-event_team_assignments-team_id}}', '{{%event_team_assignment}}', 'team_id');
        $this->createIndex('{{%idx-team_stats-team_id}}', '{{%team_stats}}', 'team_id');
        $this->createIndex('{{%idx-nba_event-team_home_id}}', '{{%nba_event}}', 'team_home_id');
        $this->createIndex('{{%idx-nba_event-team_away_id}}', '{{%nba_event}}', 'team_away_id');
        $this->createIndex('{{%idx-nba_event-event_date}}', '{{%nba_event}}', 'event_date');

        $this->addForeignKey('{{%fk-nba_team-team_home_id}}','{{%nba_event}}', 'team_home_id',  '{{%nba_team}}', 'id');
        $this->addForeignKey('{{%fk-nba_team-team_away_id}}','{{%nba_event}}', 'team_away_id',  '{{%nba_team}}', 'id');
        $this->addForeignKey('{{%fk-team_stats-team_id}}','{{%team_stats}}', 'team_id',  '{{%nba_team}}', 'id');


        $this->addForeignKey('{{%fk-event_team_assignments-event_id}}', '{{%event_team_assignment}}', 'event_id', '{{%nba_event}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('{{%fk-event_team_assignments-team_id}}', '{{%event_team_assignment}}', 'team_id', '{{%nba_team}}', 'id', 'CASCADE', 'RESTRICT');


    }
    public function down()
    {
        $this->dropIndex('{{%idx-nba_team-id}}', '{{%nba_team}}');
        $this->dropForeignKey('{{%fk-nba_team-team_home_id}}','{{%nba_event}}');
        $this->dropIndex('{{%idx-event_team_assignments-event_id}}', '{{%event_team_assignment}}');
        $this->dropForeignKey('{{%fk-event_team_assignments-event_id}}', '{{%event_team_assignment}}');
        $this->dropIndex('{{%idx-team_stats-team_id}}', '{{%team_stats}}');
        $this->dropIndex('{{%idx-nba_event-team_home_id}}', '{{%nba_event}}');
    }
}
