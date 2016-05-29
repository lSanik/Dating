<?php

namespace App\Http\Controllers;

use App\Models\ServicesPrice;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * @return mixed
     */
    public function addBalance()
    {
        $prices = ServicesPrice::all();

        return view('client.payment.payment')->with([
            'prices' => $prices,
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
