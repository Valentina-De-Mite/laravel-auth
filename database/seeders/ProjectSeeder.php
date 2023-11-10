<?php

namespace Database\Seeders;
use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {

        for ($i = 0; $i<10; $i++)
        {
            $Project = new Project ();
            $Project->title = $faker->realText($maxNbChars = 15, $indexSize = 2);
            $Project-> cover_image = $faker->imageUrl(640, 480, 'animals', true);
            $Project-> description = $faker->realText($maxNbChars = 150, $indexSize = 4);
            $Project-> git_link = 'https://github.com/Valentina-De-Mite';
            $Project-> link = $faker->url();
            $Project-> save();



            
        }
    }
}
