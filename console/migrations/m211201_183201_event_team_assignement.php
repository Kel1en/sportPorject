<?php

use yii\db\Migration;

/**
 * Class m211201_183201_event_team_assignement
 */
class m211201_183201_event_team_assignement extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%event_team_assignment}}', [
            'event_id' => $this->integer()->notNull(),
            'team_id' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%event_team_assignment}}');
    }
}
