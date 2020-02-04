<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apples}}`.
 */
class m200202_092713_create_apples_table extends Migration
{

private function randomDate($start_date, $end_date)
{
    // Convert to timetamps
    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    return date('Y-m-d H:i:s', $val);
}

    public function up()
    {
        $this->createTable('apples', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'onTree' => $this->boolean()->notNull(),
            'rotten' => $this->boolean()->notNull(),
            'creationDateTime' => $this->dateTime()->notNull(),
            'fallDateTime' => $this->dateTime(),
            'color' => $this->integer()->notNull(),
            'eatenPercent' => $this->integer()->notNull(),
        ]);

        $this->insert('apples', [
            'name' => 'apple 1',
            'onTree' => true,
            'rotten' => false,
            'creationDateTime' => $this->randomDate('2020-02-04 22:43:00', '2020-02-14 22:43:00'),
            'fallDateTime' => null,
            'color' =>  rand(0,16),
            'eatenPercent' => 0,
        ]);

        $this->insert('apples', [
            'name' => 'apple 2',
            'onTree' => true,
            'rotten' => false,
            'creationDateTime' => $this->randomDate('2020-02-04 22:43:00', '2020-02-14 22:43:00'),
            'fallDateTime' => null,
            'color' =>  rand(0,16),
            'eatenPercent' => 0,
        ]);
    }

    public function down()
    {
	//$this->delete('apples', ['id' => 1]);
        $this->dropTable('apples');
    }


}
