<?php

use yii\db\Migration;

/**
 * Class m211201_182226_team
 */
class m211201_182226_team extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%team}}', [
            'id' => $this->primaryKey(),
            'team_name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%team}}');
    }
}
