<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.11.2017
 * Time: 7:19
 */

use yii\db\Migration;
class m170209_011318_oauth extends Migration
{
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'email' => $this->string(255)->notNull()->unique(),
            'username' => $this->string(255),
            'display_name' => $this->string(255),
            'auth_key' => $this->string(100),
            'password_hash' => $this->string(100),
            'password_reset_token' => $this->string(100),
            'status' => $this->smallInteger()->notNull(),
            'created_at' => $this->integer()->notNull(), 
            'updated_at' => $this->integer()->notNull(),
        ]);
        $this->createTable('auth', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'source' => $this->string(255)->notNull(),
            'source_id' => $this->string(255)->notNull(),
        ]);
        $this->addForeignKey(
            'fk-auth-user_id',
            '{{%auth}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }
    public function down()
    {
        $this->dropForeignKey(
            'fk-auth-user_id',
            'auth'
        );
        $this->dropTable('auth');
        $this->dropTable('user');
    }
}