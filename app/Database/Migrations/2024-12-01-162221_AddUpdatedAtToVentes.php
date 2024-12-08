<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUpdatedAtToVentes extends Migration
{
    public function up()
    {
        $this->forge->addColumn('ventes', [
            'prix_med' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'constraint' => 5,
            ],
        ]);
        $this->forge->addForeignKey('prix_med', 'medicament', 'prix', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropColumn('ventes', 'prix_med');
    }
}