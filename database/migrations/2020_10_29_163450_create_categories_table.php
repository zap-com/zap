<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\Sluggable\SlugOptions;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon');
            $table->string('slug');
            $table->timestamps();
        });


        //prendo le categorie dal json il storage
        $file = Storage::get('category.json');
        $categories = json_decode($file);



        foreach ($categories as $cat) {

            $c = new Category();
            $c->name = $cat->name;
            $c->icon = $cat->icon;
            $c->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
