<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateNamesTable
 */
class CreateNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('names', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shortname')->nullable();
            $table->string('fullname')->nullable();
            $table->string('nickname')->nullable();
            $table->string('code')->nullable();
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->morphs('nameable');
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
        Schema::dropIfExists('names');
    }
}
