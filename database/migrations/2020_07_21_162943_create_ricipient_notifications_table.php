<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRicipientNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ricipient_notifications', function (Blueprint $table) {
            $table->bigInteger('notification_id')->unsigned()->index();
            $table->string('email');
            $table->boolean('status');

            $table->foreign("notification_id")->references("id")->on("notifications")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ricipient_notifications');
    }
}
