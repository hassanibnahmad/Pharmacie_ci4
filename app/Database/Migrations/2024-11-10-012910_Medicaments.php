<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Medicaments extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'ref' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'prix' => [
                'type' => 'double',
                'constraint' => 11,
            ],
            'quantite' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'date' => [
                'type' => 'DATE',
            ],
            'categorie' => [
                'type' => 'varchar',
                'constraint' => 11,
            ],
            'description' => [
                'type' => 'TEXT',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('medicaments');
    }

    public function down()
    {
        $this->forge->dropTable('medicaments');
    }
}
