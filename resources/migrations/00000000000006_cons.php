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

        $rows1[] = [
            'id_subject' => 1,
            'subject_name'=> 'IAM',
            'id_owner_FK'=> 1,
        ];
        $this->table('subject')->insert($rows1)->save();
        $rows2[] = [
            'id_consultation' => 1,
            'start_date'=>date("1999-01-01"),
            'start_hour'=>date("12:10:00"),
            'end_date'=> date("1999-01-01"),
            'end_hour'=> date("13:10:00"),
            'name'=>'Andrzej',
            'surname'=>'Luszcz',
            'email'=>'andrzej.luszcz@gmail.com',
            'id_user_FK'=> 1,
            'id_subject_FK'=> 1,
            'id_day_FK'=> 1,
        ];
        $this->table('consultation')->insert($rows2)->save();
    }
}
