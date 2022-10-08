<?php
use App\Models\Buku;
use App\Models\User;
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
        Schema::create('member_transactions', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->uuid('transaction_id');
            $table->string('payment_channel');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('buku_id');
            $table->string('xendit_transaction_id')->nullable();
            $table->bigInteger('price');
            $table->bigInteger('final_price');
            $table->string('status');
            $table->dateTime('transaction_exp');
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('users');
            $table->foreign('buku_id')->references('id')->on('bukus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_transactions');
    }
};
