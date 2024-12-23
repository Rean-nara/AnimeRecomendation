<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAdmin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_admin' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'profilepics' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'fullname' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);
        $this->forge->addKey('id_admin', true);
        $this->forge->createTable('admin');
    }

    public function down()
    {
        $this->forge->dropTable('admin');
    }
}
