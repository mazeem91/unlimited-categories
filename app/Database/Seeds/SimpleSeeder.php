<?php namespace App\Database\Seeds;

class SimpleSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'title' => 'Category A',
            'parent_id'    => null
        ];
        $this->db->table('categories')->insert($data);

        $data = [
            'title' => 'Category B',
            'parent_id'    => null
        ];
        $this->db->table('categories')->insert($data);
    }
}
