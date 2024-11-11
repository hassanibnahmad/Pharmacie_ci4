<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Medicament extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true
            ], 
            'ref' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'prix' => [
                'type'       => 'INT',
                'constraint' => '100',
            ],
            'quantite' => [
                'type' => 'INT',
                'constraint' => '100',
            ],
            'date' => [
                'type'       => 'DATE',
            ],
            'categorie' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'description' => [
                'type'       => 'TEXT',
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('medicament');
    }

    public function down()
    {
        $this->forge->dropTable('medicament');
    }
}
