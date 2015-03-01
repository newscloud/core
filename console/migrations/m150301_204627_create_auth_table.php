<?php

use yii\db\Schema;
use yii\db\Migration;

class m150301_204627_create_auth_table extends Migration
{
    public function up()
        {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('{{%auth}}', [
                'id' => Schema::TYPE_PK,
                'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
                'source' => Schema::TYPE_STRING . ' NOT NULL',
                'source_id' => Schema::TYPE_STRING . ' NOT NULL',
            ], $tableOptions);
            $this->addForeignKey('fk-auth-user_id-user-id', '{{%auth}}', 'user_id', '{{%user}}', 'id');
        }
        public function down()
        {
            $this->dropTable('{{%auth}}');
        }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
