<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNotification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_notification', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->bigInteger('notification_id')->unsigned()->index();

            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
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
        Schema::dropIfExists('user_notification');
    }
}
