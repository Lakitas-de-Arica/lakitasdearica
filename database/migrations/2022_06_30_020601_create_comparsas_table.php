<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateComparsasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comparsas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->date('date');
            $table->string('location')->nullable();
            $table->text('members');
            $table->text('extract')->nullable();
            $table->text('text')->nullable();
            $table->text('text_1')->nullable();
            $table->text('text_2')->nullable();
            $table->text('text_3')->nullable();
            $table->text('text_4')->nullable();
            $table->text('text_5')->nullable();
            $table->text('text_6')->nullable();
            $table->string('link')->nullable();
            $table->string('web')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->boolean('source_form')->default(false);
            $table->boolean('contact')->default(false);
            $table->boolean('publish')->default(false);
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
        Schema::dropIfExists('comparsas');
    }
}
