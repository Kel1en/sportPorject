<?php

use yii\db\Migration;

/**
 * Class m211129_111332_nba_event
 */
class m211129_111332_nba_event extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%event}}', [
            'id' => $this->primaryKey(),
            'season' => $this->integer(32),
            'event_date' => $this->date()->notNull(),
            'event_time' => $this->time()->notNull(),
            'team_home_id' => $this->integer()->notNull(),
            'team_away_id' => $this->integer()->notNull(),
            'total_home_team' => $this->integer(3)->notNull(),
            'total_away_team' => $this->integer(3)->notNull(),
            'home_first_time' => $this->integer(2)->notNull(),
            'away_first_time' => $this->integer(2)->notNull(),
            'home_second_time' => $this->integer(2)->notNull(),
            'away_second_time' => $this->integer(2)->notNull(),
            'home_third_time' => $this->integer(2)->notNull(),
            'away_third_time' => $this->integer(2)->notNull(),
            'home_fourth_time' => $this->integer(2)->notNull(),
            'away_fourth_time' => $this->integer(2)->notNull(),
            'home_over_total' => $this->integer(2),
            'away_over_total' => $this->integer(2),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%event}}');

    }
}
