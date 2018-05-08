<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codpro');
            $table->string('coduni');
            $table->string('codprv');
            $table->string('prod_name');
            $table->tinyInteger('base_pro')->default(0);
            $table->Integer('umb')->nullable();
            $table->string('ean13', 15)->nullable();
            $table->decimal('net_weight_base_pro', 8, 3)->nullable()->default(0.000);
            $table->decimal('gross_weight_base_pro', 8, 3)->nullable()->default(0.000);
            $table->decimal('long_base_pro', 5, 1)->nullable()->default(0.0);
            $table->decimal('width_base_pro', 5, 1)->nullable()->default(0.0);
            $table->decimal('height_base_pro', 5, 1)->nullable()->default(0.0);
            $table->decimal('volume_base_pro', 10, 1)->nullable()->default(0.0);
            $table->tinyInteger('manage_inner_pack')->default(0)->unsigned();
            $table->Integer('umb_inner_pack')->nullable();
            $table->string('dun_inner_pack')->nullable();
            $table->decimal('net_weight_inner_pack', 8, 3)->nullable()->default(0.000);
            $table->decimal('gross_weight_inner_pack', 8, 3)->nullable()->default(0.000);
            $table->decimal('long_inner_pack', 5, 1)->nullable()->efault(0.0);
            $table->decimal('width_inner_pack', 5, 1)->nullable()->default(0.0);
            $table->decimal('height_inner_pack', 5, 1)->nullable()->default(0.0);
            $table->decimal('volume_inner_pack', 10, 1)->nullable()->default(0.0);
            $table->tinyInteger('handle_master_box')->default(0)->unsigned();
            $table->Integer('umb_manage_box')->nullable();
            $table->string('dun_manage_box')->nullable();
            $table->decimal('net_weight_manage_box', 8, 3)->nullable()->default(0.000);
            $table->decimal('gross_weight_manage_box', 8, 3)->nullable()->default(0.000);
            $table->decimal('long_manage_box', 5, 1)->nullable()->default(0.0);
            $table->decimal('width_manage_box', 5, 1)->nullable()->default(0.0);
            $table->decimal('height_manage_box', 5, 1)->nullable()->default(0.0);
            $table->decimal('volume_manage_box', 10, 1)->nullable()->default(0.0);
            $table->tinyInteger('handle_layer')->default(0)->unsigned();
            $table->Integer('umb_layer')->nullable();
            $table->string('dun_layer')->nullable();
            $table->decimal('net_weight_layer', 5, 1)->nullable()->default(0.000);
            $table->decimal('gross_weight_layer', 5, 1)->nullable()->default(0.000);
            $table->decimal('long_layer', 5, 1)->nullable()->default(0.0);
            $table->decimal('width_layer', 5, 1)->nullable()->default(0.0);
            $table->decimal('height_layer', 5, 1)->nullable()->default(0.0);
            $table->decimal('volume_layer', 10, 1)->nullable()->default(0.0);
            $table->tinyInteger('handle_pallet')->nullable()->default(0)->unsigned();
            $table->Integer('umb_pallet')->nullable();
            $table->string('dun_pallet')->nullable();
            $table->decimal('net_weight_pallet', 5, 1)->nullable()->default(0.000);
            $table->decimal('gross_weight_pallet', 5, 1)->nullable()->default(0.000);
            $table->decimal('long_pallet', 5, 1)->nullable()->default(0.0);
            $table->decimal('width_pallet', 5, 1)->nullable()->default(0.0);
            $table->decimal('height_pallet', 5, 1)->nullable()->default(0.0);
            $table->decimal('volume_pallet', 10, 1)->nullable()->default(0.0);
            $table->string('ump')->nullable();
            $table->text('transport_group')->nullable();
            $table->Integer('lead_time')->nullable();
            $table->string('main_supplier')->nullable();
            $table->string('workweek')->nullable();
            $table->tinyInteger('product_with_expiration')->default(0)->unsigned();
            $table->string('lifetime_product_base')->nullable();
            $table->Integer('special_storage_of_product')->nullable();
            $table->tinyInteger('sun_exposure')->default(0)->unsigned();
            $table->Integer('temperature')->nullable();
            $table->Integer('humidity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
