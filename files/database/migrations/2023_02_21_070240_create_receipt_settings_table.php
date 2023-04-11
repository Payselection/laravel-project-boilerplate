<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('receipt_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Setting::class);
            $table->string('inn');
            $table->string('email');
            $table->string('address');
            $table->string('sno')->default('osn');
            $table->string('vat')->default('none');
            $table->string('item_type')->default('award');
            $table->string('payment_type')->default('full_payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipt_settings');
    }
};
