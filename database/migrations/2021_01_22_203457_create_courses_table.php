<?php

use App\Models\Course;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            // $table->foreignId('category_id')
            //     ->nullable()
            //     ->constrained('categories')
            //     ->onDelete('SET NULL');
            // $table->foreignId('banner_id')
            //     ->nullable()
            //     ->constrained('media')
            //     ->onDelete('SET NULL');
            $table->string('title');
            $table->string('slug');
            $table->float('priority')->nullable();
            $table->string('price', 10);
            $table->string('percent', 5);
            $table->enum('type', Course::$types);
            $table->enum('status', Course::$statuses);
            $table->enum('confirmation_status', Course::$confirmationStatuses);
            $table->longText('body')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
