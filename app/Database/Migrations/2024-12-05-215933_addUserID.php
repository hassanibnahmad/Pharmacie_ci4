<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class addUserID extends Migration
{
    public function up()
    {
         // Supprimer la relation foreingkey dans email de la table ventes et ajouter colomn user_id as foreingkey
        // $this->forge->dropForeignKey('ventes', 'email');
        // $this->forge->dropColumn('ventes', 'email');
        $this->forge->addColumn('ventes', [
            'user_id' => [
                'type'           => 'INT',
                'unsigned'       => true, 
            ], 
        ]);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        
         
    }

    public function down()
    {
        $this->forge->dropForeignKey('ventes', 'user_id');
        $this->forge->dropColumn('ventes', 'user_id');
    }
}
