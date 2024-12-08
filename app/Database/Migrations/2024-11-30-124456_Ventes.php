<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ventes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'medicament_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'quantite' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'montant_total' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('medicament_id', 'medicament', 'id', 'CASCADE', 'CASCADE');
        // la structure de addForeignKey est la suivante: addForeignKey('clé étrangère', 'table parent', 'clé parent', 'CASCADE', 'CASCADE')
        // CASCADE: supprimer ou mettre à jour les enregistrements enfants lorsque l'enregistrement parent est supprimé ou mis à jour 
        // si je supprime un médicament, je veux que toutes les ventes associées à ce médicament soient également supprimées ou mises à jour en conséquence 
        // il y a deux CASCADE, le premier est pour la suppression et le deuxième est pour la mise à jour
        $this->forge->createTable('ventes');
    }

    public function down()
    {
        $this->forge->dropTable('ventes');
    }
}
