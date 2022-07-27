<?php

use App\Models\Comparsa;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultimediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multimedia', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->date('date');
            $table->string('format');
            $table->string('file');
            $table->text('description')->nullable();
            $table->string('link')->nullable();
            $table->boolean('publish')->default(false);
            $table->boolean('gallery')->default(false);
            $table->boolean('gallery_history_1')->default(false);
            $table->boolean('gallery_history_2')->default(false);
            $table->foreignIdFor(Comparsa::class);
            $table->foreignIdFor(User::class, 'created_user_id')->nullable();
            $table->foreignIdFor(User::class, 'updated_user_id')->nullable();
            $table->index(['slug']);
            $table->softDeletes();
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
        Schema::dropIfExists('multimedia');
    }
}
