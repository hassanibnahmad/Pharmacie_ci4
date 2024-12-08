<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUpdatedAtToVentes extends Migration
{
    public function up()
    {
        $this->forge->addColumn('ventes', [
            'ref' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                ],
        ]);
        $this->forge->addForeignKey('ref', 'medicament', 'ref', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropColumn('ventes', 'ref');
    }
}