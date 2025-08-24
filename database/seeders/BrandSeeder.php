<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // DB::insert("insert into brands (name, description, created_at, updated_at) values (?, ?, ?, ?)" , ['Black Dog', 'Black Dog description', now(), now()]); 

        $brands = [
            ['name'=>'Artisan', 'description'=>'Artisan Company' ],
            ['name'=>'Php corporation', 'description'=>'PHP Corporation'],
            ['name'=>'Laravel company', 'description'=>'Laravel Company'],
        ];


        foreach ($brands as $brand) {
                DB::table('brands')->insert([
                'name' => $brand['name'],
                'description' => $brand['description'],
                'created_at'=>now(),
                'updated_at'=>now()
            ]);

        }
    }
}