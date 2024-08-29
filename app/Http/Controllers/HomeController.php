<?php

namespace App\Http\Controllers;

use App\Models\Features;
use App\Models\Home;
use App\Models\HomePhoto;
use App\Models\Photo;
use Illuminate\Http\Request;
use function Sodium\add;

class HomeController extends Controller
{
    public function get()
    {
        $homes = Home::all();
        foreach ($homes as $home) {
            $features = Features::all()->where('home_id', '=', $home->id);
            $keyFeatures = [];

            foreach ($features as $feature) {
                $keyFeatures[] = $feature->description;
            }

            $home_img = Home::find($home->id);
            $photos = $home_img->photos;
            $photo_url = [];

            foreach ($photos as $photo) {
                $photo_url[] = $photo->url;
            }


            $data = [
                'name' => $home->name,
                'description' => $home->description,
                'location' => $home->location,
                'price' => $home->price,
                'mainImg' => $home->mainImg,
                'images' => $photo_url,
                'bedroomsQuantity' => $home->bedroomsQuantity,
                'bathroomsQuantity' => $home->bathroomsQuantity,
                'area' => $home->area,
                'keyFeatures' => $keyFeatures,
                'listingPrice' => $home->listingPrice,
                'additionalFees' => [
                    'propertyTransferTax' => $home->propertyTransferTax,
                    'legalFees' => $home->legalFees,
                    'homeInspection' => $home->homeInspection,
                    'propertyInsurance' => $home->propertyInsurance,
                    'mortgageFees' => $home->mortgageFees
                ],
                'monthlyCosts' => [
                    'propertyTaxes' => $home->propertyTaxes,
                    'homeownersAssociationFee' => $home->homeownersAssociationFee,
                ],
                'totalInitialCosts' => [
                    'listingPrice' => $home->listingPrice,
                    'additionalFees' => ($home->propertyTransferTax + $home->legalFees + $home->homeInspection + $home->propertyInsurance),
                    'downPayment' => $home->downPayment,
                    'mortgageAmount' => $home->mortgageAmount,
                ],
                'monthlyExpenses' => [
                    'propertyTaxes' => $home->propertyTaxes,
                    'homeownersAssociationFee' => $home->homeownersAssociationFee,
                    'mortgagePayment' => $home->mortgagePayment,
                    'propertyInsurance' => $home->propertyInsurance
                ]
            ];
        }
        return $data;
    }

    public function getById($id) {
        $home = Home::all()->where('id', '=', $id);
        $features = Features::all()->where('home_id', '=', $id);
        $keyFeatures = [];

        foreach ($features as $feature) {
            $keyFeatures[] = $feature->description;
        }

        $home_img = Home::find($id);
        $photos = $home_img->photos;
        $photo_url = [];

        foreach ($photos as $photo) {
            $photo_url[] = $photo->url;
        }


        $data = [
            'name' => $home[0]->name,
            'description' => $home[0]->description,
            'location' => $home[0]->location,
            'price' => $home[0]->price,
            'mainImg' => $home[0]->mainImg,
            'images' => $photo_url,
            'bedroomsQuantity' => $home[0]->bedroomsQuantity,
            'bathroomsQuantity' => $home[0]->bathroomsQuantity,
            'area' => $home[0]->area,
            'keyFeatures' => $keyFeatures,
            'listingPrice' => $home[0]->listingPrice,
            'additionalFees' => [
                'propertyTransferTax' => $home[0]->propertyTransferTax,
                'legalFees' => $home[0]->legalFees,
                'homeInspection' => $home[0]->homeInspection,
                'propertyInsurance' => $home[0]->propertyInsurance,
                'mortgageFees' => $home[0]->mortgageFees
            ],
            'monthlyCosts' => [
                'propertyTaxes' => $home[0]->propertyTaxes,
                'homeownersAssociationFee' => $home[0]->homeownersAssociationFee,
            ],
            'totalInitialCosts' => [
                'listingPrice' => $home[0]->listingPrice,
                'additionalFees' => ($home[0]->propertyTransferTax + $home[0]->legalFees + $home[0]->homeInspection + $home[0]->propertyInsurance),
                'downPayment' => $home[0]->downPayment,
                'mortgageAmount' => $home[0]->mortgageAmount,
            ],
            'monthlyExpenses' => [
                'propertyTaxes' => $home[0]->propertyTaxes,
                'homeownersAssociationFee' => $home[0]->homeownersAssociationFee,
                'mortgagePayment' => $home[0]->mortgagePayment,
                'propertyInsurance' => $home[0]->propertyInsurance
            ]
        ];
        return $data;
    }
}
