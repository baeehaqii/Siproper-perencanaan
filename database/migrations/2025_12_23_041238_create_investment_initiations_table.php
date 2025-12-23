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
        Schema::create('investment_initiations', function (Blueprint $table) {
            $table->id();
            $table->enum('sumber_investment', ['info_lahan', 'proposal', 'rencana']);
            $table->string('nama_investasi');
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['draft', 'review', 'pending','approved','rejected'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investment_initiations');
    }
};
