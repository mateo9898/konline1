<?php

use Cake\Chronos\Chronos;
use Phinx\Migration\AbstractMigration;

/**
 * Fixtures
 */
class Cons extends AbstractMigration
{
    /**
     * Up Method.
     *
     * @return void
     */
    public function up(): void
    {
        $rows = [];

        $rows[] = [
            'id_day' => 1,
            'date' => date("Y-m-d"),
            'id_user_FK'=> 1,
        ];
        $this->table('day_consultation')->insert($rows)->save();
        $rows1[] = [
            'id_subject' => 1,
            'name'=> 'IAM',
            'id_user_FK'=> 1,
        ];
        $this->table('subject')->insert($rows1)->save();
        $rows2[] = [
            'id_consultation' => 1,
            'start'=> date("H:i"),
            'end'=> date("H:i"),
            'name'=>'Andrzej',
            'surname'=>'Luszcz',
            'id_user_FK'=> 1,
            'id_day_FK'=> 1,
            'id_subject_FK'=> 1,
        ];
        $this->table('consultation')->insert($rows2)->save();
    }
}
