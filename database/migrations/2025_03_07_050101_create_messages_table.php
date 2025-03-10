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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chat_id')->unsigned();
            $table->foreign('chat_id')->references('id')->on('chat_lists')->onDelete('cascade');

            $table->unsignedBigInteger('participant_id')->unsigned();
            $table->foreign('participant_id')->references('id')->on('participants')->onDelete('cascade');

            $table->unsignedBigInteger('replied_message_id')->unsigned()->nullable();
            $table->foreign('replied_message_id')->references('id')->on('messages')->onDelete('cascade');

            $table->longText('message');
            $table->string('message_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
