<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('wedstrijden', function (Blueprint $table) {
        $table->id();
        $table->foreignId('team1_id')->constrained('teams')->onDelete('cascade');
        $table->foreignId('team2_id')->constrained('teams')->onDelete('cascade');
        $table->dateTime('datum');
        $table->string('locatie');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedstrijden');
    }
};
