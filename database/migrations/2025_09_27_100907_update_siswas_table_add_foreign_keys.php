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
        Schema::table('siswas', function (Blueprint $table) {
            // Drop old columns first
            $table->dropColumn(['jurusan', 'added_by']);
            
            // Add new foreign key columns
            $table->foreignId('jurusan_id')->nullable()->constrained('jurusans')->onDelete('set null');
            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->onDelete('set null');
            $table->foreignId('added_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('teacher_id')->nullable()->constrained('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            // Drop foreign key columns
            $table->dropForeign(['jurusan_id']);
            $table->dropForeign(['kelas_id']);
            $table->dropForeign(['added_by']);
            $table->dropForeign(['teacher_id']);
            
            $table->dropColumn(['jurusan_id', 'kelas_id', 'added_by', 'teacher_id']);
            
            // Add back old columns
            $table->string('jurusan', 100)->nullable();
            $table->string('added_by')->nullable();
        });
    }
};
