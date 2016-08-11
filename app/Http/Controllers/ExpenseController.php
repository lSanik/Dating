<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\ServicesPrice;
use App\Models\User;
use App\Services\ExpenseService;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Constants;
use Illuminate\Support\Facades\Auth;

/**
 * Class ExpanseController
 */
class ExpenseController extends Controller
{
    private $service;

    public function __construct(ExpenseService $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function handler(Request $request)
    {
        $this->validate($request, [
            'girl_id' => 'required',
            'type' => 'required',
        ]);

        if (!in_array($request->input('type'), Constants::getExpTypes())) {
            throw new \Exception('Expense type not found!');
        }

        dump($this->getMoney());
        dump($this->service->getCost($request->input('type')));

        $this->service->setExpense(
            Auth::user()->id,
            $request->input('girl_id'),
            $this->service->getCost($request->input('type'))
        );

        //return response('Success' , 200);
    }

}
