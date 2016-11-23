<?php

use yii\db\Migration;

class m161123_045157_tb_advert extends Migration
{
    public function up()
    {
            $this->execute('
            CREATE TABLE IF NOT EXISTS `advert` (
  `id` int(11) NOT NULL,
  `price` mediumint(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `fk_agent_detail` mediumint(11) DEFAULT NULL,
  `bedroom` smallint(1) DEFAULT NULL,
  `livingroom` smallint(1) DEFAULT NULL,
  `parking` smallint(1) DEFAULT NULL,
  `kitchen` smallint(1) DEFAULT NULL,
  `general_image` varchar(200) DEFAULT NULL,
  `description` text,
  `location` varchar(45) DEFAULT NULL,
  `hot` smallint(1) DEFAULT NULL,
  `sold` smallint(1) DEFAULT NULL,
  `type` varchar(55) DEFAULT NULL,
  `recomend` smallint(1) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `advert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
            ');
    }

    public function down()
    {
        $this->dropTable('advert');
        echo "m161123_045157_tb_advert cannot be reverted.\n";

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
