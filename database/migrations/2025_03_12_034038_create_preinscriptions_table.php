<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.DB::select('SHOW TABLES');
     */
    public function up(): void
    {
        Schema::create('preinscriptions', function (Blueprint $table) {
            $table->id(); // id: integer, primary key, auto-increment
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // user_id: integer, foreign key
            $table->string('matricule'); // matricule: string
            $table->string('name'); // name: string
            $table->string('surname'); // surname: string
            $table->date('birth_day'); // birth_day: date
            $table->string('birth_place'); // birth_place: string
            $table->string('city'); // city: string
            $table->string('departement'); // departement: string
            $table->string('country'); // country: string
            $table->enum('sex', ['masculin', 'feminin']); // sex: enum
            $table->string('nationality'); // nationality: string
            $table->string('fileUpload');//photo de l'etudiant
            $table->enum('family_status', ['Marié', 'Célibataire']); // family_status: enum
            $table->boolean('disabled'); // disabled: boolean
            $table->date('obtaining'); // obtaining: date
            $table->string('serie'); // serie: string
            $table->foreignId('mention_id')->constrained('mentions'); // mention_id: integer, foreign key
            $table->string('school'); // school: string
            $table->foreignId('speciality_id')->constrained('specialités')->onDelete('cascade'); // speciality_id: integer, foreign key
            $table->string('statut'); // statut: string
            $table->string('statutChief'); // statutChief: string
            $table->foreignId('financement_id')->constrained('financements')->onDelete('cascade'); // financement_id: integer, foreign key
            $table->foreignId('payment_mode_id')->constrained('paiements')->onDelete('cascade'); // payment_mode_id: integer, foreign key
            $table->boolean('study_abroad'); // study_abroad: boolean
            $table->string('annee_passed1'); // annee_passed1: string
            $table->string('annee_passed2'); // annee_passed2: string
            $table->string('annee_passed3'); // annee_passed3: string
            $table->string('annee_passed4'); // annee_passed4: string
            $table->string('full_name'); // full_name: string
            $table->string('phone_number'); // phone_number: string
            $table->string('email'); // email: string
            $table->date('date'); // date: date
            $table->string('signature'); // signature: string
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
