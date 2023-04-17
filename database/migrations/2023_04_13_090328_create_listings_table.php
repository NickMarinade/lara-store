<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('tags');
            $table->string('trailer');
            $table->string('website');
            $table->string('logo')->nullable();
            $table->longText('description');
            $table->timestamps();
        });

        DB::unprepared('
            CREATE TRIGGER `auto_generate_slug` BEFORE INSERT ON `listings`
            FOR EACH ROW BEGIN
              SET NEW.slug = REPLACE(LOWER(NEW.title), \' \', \'-\');
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
        DB::unprepared('DROP TRIGGER IF EXISTS `auto_generate_slug`');
    }
};
