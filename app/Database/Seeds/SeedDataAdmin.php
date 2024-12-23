<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedDataAdmin extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'Rean',
                'email' => 'rean@mail.to',
                'password' => password_hash('asdqwe', PASSWORD_DEFAULT),
                'profilepics' => 'ab67616d0000b273b087fd36ebf4b061b10fc6da.jpg',
                'fullname' => 'Rean Nara',
                'role' => 'Superuser'
            ],
            [
                'username' => 'Dewi',
                'email' => 'dewi@mail.to',
                'password' => password_hash('19803', PASSWORD_DEFAULT),
                'profilepics' => '52ce6cc969fac753f4ae985997b147e7.jpg',
                'fullname' => 'Nico Dewi',
                'role' => 'Superuser'
            ],
            [
                'username' => 'Admin',
                'email' => 'admin@mail.to',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'profilepics' => '9d965ef5940ca21f50f5e17acc3b1290.jpg',
                'fullname' => 'Admin',
                'role' => 'Admin'
            ]
        ];
        $this->db->table('admin')->insertBatch($data);
    }
}