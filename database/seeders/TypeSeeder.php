<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Science', 'Economy', 'Sport', 'Art', 'Music', 'History', 'Programming'];
        foreach($types as $type){

            $newType = new Type();
            $newType->type_name = $type;
            $newType->slug = Str::slug($type, '-');
            $newType->save();
        };
    }
}
