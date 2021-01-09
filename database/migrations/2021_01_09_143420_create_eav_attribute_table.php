<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEavAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eav_attribute', function (Blueprint $table) {
            $table->bigIncrements('attribute_id');
            $table->integer('entity_group_id');
            $table->string('attribute_code');
            $table->string('attribute_type');
            $table->string('frontend_label');
            $table->string('source_model');
            $table->smallInteger('is_required');
            $table->string('default_value');

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
        Schema::dropIfExists('eav_attribute');
    }
}
