
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('menu')->nullable();
            $table->string('id_user')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('pajak')->nullable();
            $table->string('total')->nullable();
            $table->string('bayar')->nullable();
            $table->string('kembali')->nullable();
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
        Schema::dropIfExists('pembayarans');
    }
};
