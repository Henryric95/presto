<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories=['Sport', 'Multimedia', 'Motori', 'Abbigliamento', 'Giocattoli', 'Immobili'];
        foreach ($categories as $category){
            DB::table('categories')->insert([
                'name'=>$category, 
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }

        
    }
}
