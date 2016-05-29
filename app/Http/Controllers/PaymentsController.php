<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\ServicesPrice;

class PaymentsController extends Controller
{

    /**
     * @return mixed
     */
    public function addBalance()
    {
        $prices = ServicesPrice::all();

        return view('client.payment.payment')->with([
            'prices' => $prices
        ]);
    }

    /**
     * @return mixed
     */
    public function checkOut(Request $request)
    {

        return view('client.payment.checkout')->with([
            
        ]);
    }
}
