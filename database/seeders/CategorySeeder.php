<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // \App\Models\Category::factory(5)->create();

        $category = array(
            [ 'name' => 'Pediatri', 'created_by' => 1 ],
            [ 'name' => 'Ginekologi', 'created_by' => 1 ],
            [ 'name' => 'Neurologi', 'created_by' => 1 ],
            [ 'name' => 'Kesehatan Masyarakat', 'created_by' => 1 ],
            [ 'name' => 'Lainnya', 'created_by' => 1 ],
        );

        DB::table('categories')->insert($category);
    }
}
