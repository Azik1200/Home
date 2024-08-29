<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('homes')->insert([
            'name' => 'Seaside Serenity Villa',
            'description' => 'Discover your own piece of paradise with the Seaside Serenity Villa. T With an open floor plan, breathtaking ocean views from every room, and direct access to a pristine sandy beach, this property is the epitome of coastal living.',
            'location' => 'Malibu, California',
            'price' => '$1,250,000',
            'mainImg' => 1,
            'bedroomsQuantity' => '04',
            'bathroomsQuantity' => '03',
            'area' => '2,500 Square Feet',
            'listingPrice' => 1250000,
            'propertyTransferTax' => 25000,
            'legalFees' => 3000,
            'homeInspection' => 500,
            'propertyInsurance' => 1200,
            'mortgageFees' => 'Varies',
            'propertyTaxes' => 1250,
            'homeownersAssociationFee' => 300,
            'downPayment' => 250000,
            'mortgageAmount' => 1000000,
            'mortgagePayment' => 'Varies'
        ]);

        $features = ['Expansive oceanfront terrace for outdoor entertaining','Gourmet kitchen with top-of-the-line appliances','Private beach access for morning strolls and sunset views', 'Master suite with a spa-inspired bathroom and ocean-facing balcony', 'Private garage and ample storage space'];

        foreach ($features as $feature) {
            DB::table('features')->insert([
                'home_id' => 1,
                'description' => $feature
        ]);
        }

        $photos = ['1.img', '2.img', '3.img', '4.img', '5.img', '6.img', '7.img', '8.img', '9.img', '10.img'];

        foreach ($photos as $photo) {
            DB::table('photos')->insert([
                'url' => $photo
            ]);
        }

        $dbs = DB::table('photos')->where('id' ,'>' ,0)->pluck('id')->toArray();

        foreach ($dbs as $db) {
            DB::table('home_photo')->insert([
                'home_id' => 1,
                'photo_id' => 2
            ]);
        }
    }
}
