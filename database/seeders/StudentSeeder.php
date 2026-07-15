<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::updateOrCreate(
            ['ime' => 'Ivan', 'prezime' => 'Ivić'],
            [
                'status' => 'redovni',
                'godiste' => 2002,
                'prosjek' => 4.35,
                'stipendija' => 250.00,
            ]
        );

        Student::updateOrCreate(
            ['ime' => 'Ana', 'prezime' => 'Anić'],
            [
                'status' => 'redovni',
                'godiste' => 2001,
                'prosjek' => 4.80,
                'stipendija' => 350.00,
            ]
        );

        Student::updateOrCreate(
            ['ime' => 'Marko', 'prezime' => 'Marić'],
            [
                'status' => 'izvanredni',
                'godiste' => 1998,
                'prosjek' => 3.65,
                'stipendija' => 0.00,
            ]
        );

        Student::updateOrCreate(
            ['ime' => 'Petra', 'prezime' => 'Petrić'],
            [
                'status' => 'redovni',
                'godiste' => 2003,
                'prosjek' => 4.15,
                'stipendija' => 200.00,
            ]
        );

        Student::updateOrCreate(
            ['ime' => 'Luka', 'prezime' => 'Lukić'],
            [
                'status' => 'izvanredni',
                'godiste' => 1995,
                'prosjek' => 3.20,
                'stipendija' => 0.00,
            ]
        );
    }
}
