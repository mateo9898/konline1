<?php

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

class AlterConsultation extends AbstractMigration
{
    /**
     * Change.
     *
     * @return void
     */
    public function change()
    {
        $this->execute("ALTER DATABASE CHARACTER SET 'utf8mb4';");
        $this->execute("ALTER DATABASE COLLATE='utf8mb4_unicode_ci';");

$this->table('consultation', [
                'id' => false,
                'primary_key' => ['id_consultation'],
                'engine' => 'InnoDB',
                'encoding' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'comment' => '',
                'row_format' => 'DYNAMIC',
            ])
                ->addColumn('id_consultation', 'integer', [
                    'null' => false,
                    'limit' => MysqlAdapter::INT_REGULAR,
                    'identity' => 'enable',
                ])
                ->addColumn('start', 'time', [
                    'null' => false,
                    'after' => 'id_consultation',
                ])
                ->addColumn('end', 'time', [
                    'null' => false,
                    'after' => 'start',
                ])
                ->addColumn('name', 'string', [
                    'null' => false,
                    'limit' => 255,
                    'collation' => 'utf8mb4_unicode_ci',
                    'encoding' => 'utf8mb4',
                    'after' => 'end',
                ])
                ->addColumn('surname', 'string', [
                    'null' => false,
                    'limit' => 255,
                    'collation' => 'utf8mb4_unicode_ci',
                    'encoding' => 'utf8mb4',
                    'after' => 'name',
                ])
                ->addColumn('id_user_FK', 'integer', [
                    'null' => false,
                    'limit' => MysqlAdapter::INT_REGULAR,
                    'after' => 'end',
                ])
                ->addColumn('id_day_FK', 'integer', [
                    'null' => false,
                    'limit' => MysqlAdapter::INT_REGULAR,
                    'after' => 'id_user_FK',
                ])
                ->addColumn('id_subject_FK', 'integer', [
                    'null' => false,
                    'limit' => MysqlAdapter::INT_REGULAR,
                    'after' => 'id_day_FK',
                ])
                ->addForeignKey('id_user_FK','users','id_user',
                ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION', 'constraint' => 'id_user_FK2'])
                ->addForeignKey('id_day_FK','day_consultation','id_day',
                ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION', 'constraint' => 'id_day_FK'])
                ->addForeignKey('id_subject_FK','subject','id_subject',
                ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION', 'constraint' => 'id_subject_FK'])
                ->create();
    }
}