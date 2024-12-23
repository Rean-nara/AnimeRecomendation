<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAnime extends Migration
{
    public function up()
    {
        // Definisi tabel
        $this->forge->addField([
            'id_anime' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'japanese_title' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'poster' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'navbar_cover' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'genre' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'score' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'total_episode' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'duration' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'release_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'studio' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'producer' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'synopsis' => [
                'type' => 'VARCHAR',
                'constraint' => 225,
                'null' => true,
            ]
        ]);

        // Menambahkan Primary Key
        $this->forge->addKey('id_anime', true);

        // Membuat tabel
        $this->forge->createTable('anime');
    }

    public function down()
    {
        // Menghapus tabel
        $this->forge->dropTable('anime');
    }
}
