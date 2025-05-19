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
        Schema::table('clubs', function (Blueprint $table) {
            // Entferne die Spalte 'color'
            $table->dropColumn('color');

            // Neue Spalten hinzufügen
            $table->boolean('send_to_church')->default(false)->after('updated_at');
            $table->boolean('send_to_community')->default(false)->after('send_to_church');
            $table->string('address')->nullable()->after('send_to_community');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clubs', function (Blueprint $table) {
            // Füge 'color' wieder hinzu
            $table->string('color')->nullable();

            // Entferne die neu hinzugefügten Spalten
            $table->dropColumn('send_to_church');
            $table->dropColumn('send_to_community');
            $table->dropColumn('address');
        });
    }
};
