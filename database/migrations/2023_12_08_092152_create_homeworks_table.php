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
        Schema::create('homeworks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('set_for_date');
            $table->string('title');
            $table->mediumText('content');
            $table->timestamps();

            $table->index('subject_id', 'hw_subject_idx');
            $table->index('class_id', 'hw_class_idx');
            $table->index('user_id', 'hw_user_idx');
            $table->foreign('subject_id', 'hw_subject_fk')->on('subjects')->references('id');
            $table->foreign('class_id', 'hw_school_class_fk')->on('school_classes')->references('id');
            $table->foreign('user_id', 'hw_user_fk')->on('users')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homeworks');
    }
};
