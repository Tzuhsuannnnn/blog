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
        Schema::create('issue_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('issue_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
        
            $table->foreign('issue_id')->references('id')->on('issues')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        
            $table->primary(['issue_id', 'tag_id']); //設定複合鍵(主鍵)
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issue_tag');
    }
};
