<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function($table) {
            $table->increments('id');
            $table->integer('user_id'); // foreign key
            $table->integer('product_id'); // foreign key
            $table->integer('rating');
            $table->string('review');
            $table->integer('upvotes')->default(0);
            $table->integer('downvotes')->default(0);
            $table->index(['user_id', 'product_id']);
            $table->dateTime('created');
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
        Schema::dropIfExists('reviews');
    }
}
