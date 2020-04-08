<?php

use Cake\Chronos\Chronos;
use Phinx\Migration\AbstractMigration;

/**
 * Fixtures
 */
class Admin extends AbstractMigration
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
            'id_user' => 1,
            'name' => 'Mateusz',
            'surname'=> 'Kowalski',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'email' => 'admin@example.com',
            'role' => 'ROLE_ADMIN',
        ];

        $rows[] = [
            'id_user' => 2,
            'name' => 'Andrzej',
            'surname'=> 'Nowak',
            'password' => password_hash('user', PASSWORD_DEFAULT),
            'email' => 'user@example.com',
            'role' => 'ROLE_USER',
        ];

        $this->table('users')->insert($rows)->save();
    }
}
