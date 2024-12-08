<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEmailColomn extends Migration
{
    public function up()
    {
        //ajouter colomn email dans la table ventes
        $this->forge->addColumn('ventes', [
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ], 
        ]);
        
    }

    public function down()
    {
        //
    }
}
