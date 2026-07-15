<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_korisnik_moze_dodati_studenta(): void
    {

        $user = User::factory()->create();

        $studentPodaci = [
            'ime' => 'Ivan',
            'prezime' => 'Ivić',
            'status' => 'redovni',
            'godiste' => 2002,
            'prosjek' => 4.25,
            'stipendija' => 300.00,
        ];

        $response = $this
            ->actingAs($user)
            ->post(route('students.store'), $studentPodaci);

        $response->assertRedirect(route('students.index'));

        $this->assertDatabaseHas('students', [
            'ime' => 'Ivan',
            'prezime' => 'Ivić',
            'status' => 'redovni',
            'godiste' => 2002,
        ]);
    }

    public function test_korisnik_moze_urediti_studenta(): void
    {
        $user = User::factory()->create();

        $student = Student::create([
            'ime' => 'Ivan',
            'prezime' => 'Ivić',
            'status' => 'redovni',
            'godiste' => 2002,
            'prosjek' => 3.50,
            'stipendija' => 200.00,
        ]);

        $noviPodaci = [
            'ime' => 'Ivan',
            'prezime' => 'Horvat',
            'status' => 'izvanredni',
            'godiste' => 2002,
            'prosjek' => 4.25,
            'stipendija' => 300.00,
        ];

        $response = $this
            ->actingAs($user)
            ->put(route('students.update', $student), $noviPodaci);

        $response->assertRedirect(route('students.index'));

        $this->assertDatabaseHas('students', [
            'id' => $student->id,
            'ime' => 'Ivan',
            'prezime' => 'Horvat',
            'status' => 'izvanredni',
            'godiste' => 2002,
        ]);

        $this->assertDatabaseMissing('students', [
            'id' => $student->id,
            'prezime' => 'Ivić',
            'status' => 'redovni',
        ]);
    }
    public function test_korisnik_moze_obrisati_studenta(): void
    {
        $user = User::factory()->create();

        $student = Student::create([
            'ime' => 'Petar',
            'prezime' => 'Petrić',
            'status' => 'redovni',
            'godiste' => 2001,
            'prosjek' => 4.10,
            'stipendija' => 250.00,
        ]);

        $response = $this
            ->actingAs($user)
            ->delete(route('students.destroy', $student));

        $response->assertRedirect(route('students.index'));

        $this->assertDatabaseMissing('students', [
            'id' => $student->id,
        ]);
    }

}
