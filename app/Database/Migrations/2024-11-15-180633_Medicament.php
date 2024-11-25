<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Medicament extends Migration
{
    public function up()
    {
        // Check if the table already exists
        if (!$this->db->tableExists('medicament')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'ref' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    ],
                'prix' => [
                    'type' => 'DECIMAL',
                    'constraint' => '10,2', // 10 digits in total, 2 after the decimal point
                    ],                    
                    'quantite' => [
                        'type' => 'INT',
                        'constraint' => 5,
                    ],
                    'date' => [
                        'type' => 'DATE',
                    ],
                    'categorie' => [
                        'type' => 'VARCHAR',
                        'constraint' => 25,
                    ],
                    'description' => [
                        'type' => 'TEXT',
                    ],
                ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('medicament');
        }
    }

    public function down()
    {
        $this->forge->dropTable('medicament', true);
    }
}
?>