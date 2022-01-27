<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
Schema::create('games', function (Blueprint $table) {
$table->id();
$table->foreignId('author_id');
$table->string('name', 256);
$table->text('description')->nullable();
$table->decimal('price', 8, 2)->nullable();
$table->integer('year');
$table->string('steam_page', 256)->nullable();
$table->string('image', 256)->nullable();
$table->boolean('display');
$table->timestamp('created_at')->useCurrent();
$table->timestamp('updated_at')->useCurrent();
});
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
