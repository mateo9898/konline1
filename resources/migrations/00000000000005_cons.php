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
            'start'=>date("1999-01-01 12:11:11"),
            'end'=> date("1999-01-01 12:11:11"),
            'name'=>'Andrzej',
            'surname'=>'Luszcz',
            'email'=>'andrzej.luszcz@gmail.com',
            'id_user_FK'=> 1,
            'id_subject_FK'=> 1,
        ];
        $this->table('consultation')->insert($rows2)->save();
    }
}
