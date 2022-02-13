<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingModifierPricingOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_modifier_pricing_option', function (Blueprint $table) {
            $table->unsignedInteger('pricing_modifier_id');
            $table->unsignedInteger('pricing_option_id');
            $table->dateTime('valid_from');
            $table->dateTime('valid_to')->nullable();
            $table->boolean('active')->default(0);
            $table->foreign('pricing_modifier_id')->references('id')->on('pricing_modifiers');
            $table->foreign('pricing_option_id')->references('id')->on('pricing_options');
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
        Schema::dropIfExists('pricing_option_pricing_modifiers');
    }
}
