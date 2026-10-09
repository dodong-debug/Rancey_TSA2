<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTsa2AuthAndArchiveFields extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'username',
            ],
        ]);

        $this->forge->addColumn('tasks', [
            'is_archived' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
                'null'       => false,
                'after'      => 'task_date',
            ],
        ]);

        // Keep existing user rows valid. The demo password is set by the seeder.
        $this->db->table('users')->where('username', 'admin01')->update(['password' => null]);
    }

    public function down()
    {
        $this->forge->dropColumn('tasks', 'is_archived');
        $this->forge->dropColumn('users', 'password');
    }
}
