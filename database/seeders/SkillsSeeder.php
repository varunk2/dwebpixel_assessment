<?php

namespace Database\Seeders;

use App\Models\Skills;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = ['Laravel', 'Vue', 'Inertia', 'React', 'Livewire', 'Git', 'HTML', 'CSS', 'JavaScript', 'TailwindCSS'];

        foreach($skills as $skill) {
            Skills::create([
                'name' => $skill
            ]);
        }
    }
}
