<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tecnologies = ['PHP','JavaScript','Laravel', 'MySQL', 'HTML', 'CSS', 'SCSS', 'Vue.JS', 'Bootstrap', 'Vite'];

        foreach($tecnologies as $technology){
            $newTechnology = new Technology(); 
            $newTechnology->name = $technology;
            $newTechnology->slug = Str::slug($technology, '-');
            $newTechnology->save();
        }
    }
}
