<?php

use yii\db\Migration;

/**
 * Class m211201_183500_team_stats
 */
class m211201_183500_team_stats extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

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
        $this->dropTable('{{%team_stats}}');
    }
}
