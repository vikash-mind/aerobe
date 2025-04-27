<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEnquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('student_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('candidate_name');
            $table->date('dob');
            $table->string('marital_status');
            $table->string('contact_no');
            $table->string('email');
            $table->string('father_name');
            $table->string('mother_name');
            $table->text('permanent_address');
            $table->text('correspondence_address');
            $table->json('qualification'); // We'll store qualifications as JSON
            $table->string('reference_dropdown')->nullable();
            $table->string('reference_other')->nullable();
            $table->string('country');
            $table->string('visa');
            $table->string('exam');
            $table->string('l_band_score')->nullable();
            $table->string('r_band_score')->nullable();
            $table->string('s_band_score')->nullable();
            $table->string('w_band_score')->nullable();
            $table->string('overall_band_score')->nullable();
            $table->text('details')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_enquiries');
    }
}
