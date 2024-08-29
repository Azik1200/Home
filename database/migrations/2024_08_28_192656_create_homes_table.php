<?php

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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('location');
            $table->string('price');
            $table->integer('mainImg');
            $table->string('bedroomsQuantity');
            $table->string('bathroomsQuantity');
            $table->string('area');
            $table->double('listingPrice');
            $table->double('propertyTransferTax');
            $table->double('legalFees');
            $table->double('homeInspection');
            $table->double('propertyInsurance');
            $table->string('mortgageFees');
            $table->double('propertyTaxes');
            $table->double('homeownersAssociationFee');
            $table->double('downPayment');
            $table->double('mortgageAmount');
            $table->string('mortgagePayment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
