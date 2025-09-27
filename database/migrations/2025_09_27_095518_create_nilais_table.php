<?php

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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->string('mata_pelajaran');
            $table->decimal('nilai', 5, 2);
            $table->string('semester');
            $table->string('tahun_ajaran');
            $table->enum('jenis_nilai', ['tugas', 'uts', 'uas', 'praktik']);
            $table->text('keterangan')->nullable();
            $table->foreignId('guru_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
