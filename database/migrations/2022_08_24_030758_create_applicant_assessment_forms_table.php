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
        Schema::create('applicant_assessment_forms', function(Blueprint $table){
            $table->foreignId('applicant_id');
            $table->string('education');
            $table->string('experience');
            $table->string('performance_evaluation');
            $table->string('training');
            $table->string('eligibility');
            $table->string('outstanding_accomplishment');
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
        //
    }
};
