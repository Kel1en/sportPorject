<?php

use yii\db\Migration;

/**
 * Class m211203_165417_nba
 */
class m211203_165417_nba extends Migration
{


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%nba_team}}', [
            'id' => $this->primaryKey()->notNull(),
            'team_name' => $this->string(),
            'slug' => $this->string(),
        ], $tableOptions);

        $this->createTable('{{%nba_event}}', [
            'id' => $this->primaryKey()->notNull(),
            'event_date' => $this->date()->notNull(),
            'event_time' => $this->time()->notNull(),
            'team_home_id' => $this->integer(3)->notNull(),
            'team_away_id' => $this->integer(3)->notNull(),
            'total_home_team' =>$this->integer(3)->notNull(),
            'total_away_team' =>$this->integer(3)->notNull(),
            'home_first_time' =>$this->integer(2)->notNull(),
            'away_first_time' =>$this->integer(2)->notNull(),
            'home_second_time' =>$this->integer(2)->notNull(),
            'away_second_time' =>$this->integer(2)->notNull(),
            'home_third_time' =>$this->integer(2)->notNull(),
            'away_third_time' =>$this->integer(2)->notNull(),
            'home_fourth_time' =>$this->integer(2)->notNull(),
            'away_fourth_time' =>$this->integer(2)->notNull(),
            'home_over_total' =>$this->integer(2),
            'away_over_total' =>$this->integer(2),
            'slug' => $this->string(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%event_team_assignment}}', [
            'event_id' => $this->integer(3)->notNull(),
            'team_id' => $this->integer(3)->notNull(),
        ], $tableOptions);

        $this->createTable('{{%team_stats}}', [
            'team_id' => $this->integer()->notNull(),
            'games' => $this->integer(),
            'winnings' => $this->integer(),
            'losses' => $this->integer(),
            'goals_scored' => $this->integer(),
            'missed_goals' => $this->integer(),
            'average_total' => $this->integer(),
            'average_total_one' => $this->integer(),
            'average_total_two' => $this->integer(),
            'average_total_three' => $this->integer(),
            'average_total_four' => $this->integer(),
            'average_over_total' => $this->integer(),
        ], $tableOptions);


    }

    public function down()
    {
        $this->dropTable('{{%nba_team}}');
        $this->dropTable('{{%nba_event}}');
        $this->dropTable('{{%event_team_assignment}}');
        $this->dropTable('{{%team_stats}');

    }

}
