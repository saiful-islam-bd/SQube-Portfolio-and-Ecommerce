<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_teams', function (Blueprint $table) {
            $table->id();
            $table->string('landing_team_name');
            $table->string('landing_team_designation');
            $table->string('landing_team_paragraph');
            $table->string('landing_team_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landing_teams');
    }
};
