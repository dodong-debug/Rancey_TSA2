<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Tsa2DemoSeeder extends Seeder
{
    public function run()
    {
        $users = $this->db->table('users');
        $user = $users->where('username', 'admin01')->get()->getRowArray();
        $passwordHash = password_hash('Password123!', PASSWORD_DEFAULT);

        if ($user) {
            $users->where('id', $user['id'])->update(['password' => $passwordHash]);
            return;
        }

        $users->insert([
            'username'   => 'admin01',
            'password'   => $passwordHash,
            'full_name'  => 'Demo Administrator',
            'email'      => 'admin@example.com',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
