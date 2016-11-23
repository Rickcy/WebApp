<?php

use yii\db\Migration;

class m161123_045824_tb_subscribe extends Migration
{
    public function up()
    {
        $this->execute('
        CREATE TABLE IF NOT EXISTS `subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_subscribe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


        ');
    }

    public function down()
    {

        $this->dropTable('subscribe');
        echo "m161123_045824_tb_subscribe cannot be reverted.\n";

        return false;
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
