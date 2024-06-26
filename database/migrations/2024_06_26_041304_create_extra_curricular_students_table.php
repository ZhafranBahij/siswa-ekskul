<?php

use App\Models\Extracurricular;
use App\Models\Student;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('extra_curricular_students', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Extracurricular::class);
            $table->foreignIdFor(Student::class);
            $table->year('tahun_bergabung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extra_curricular_students');
    }
};
