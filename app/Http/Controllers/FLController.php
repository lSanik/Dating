<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Models\User;
use App\Services\ExpenseService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class FLController
 * @package App\Http\Controllers
 *
 * @todo: try DesignPatterns
 */
class FLController extends Controller
{
    /**
     * @var ExpenseService
     */
    private $expenseService;

    /**
     * @var array
     */
    private $rules = [
        'girl_id' => 'required',
    ];

    public function __construct(ExpenseService $expenseService)
    {
        $this->expenseService = $expenseService;
    }

    /**
     * Return Girl Name + Surname + Phone
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getFlp(Request $request)
    {
        $this->validate($request, $this->rules);

        if (!(
            (float) $this->getMoney() >= (float) $this->expenseService->getCost(Constants::EXP_FLP)
        )){
            return new JsonResponse('Enough Love Coins on your account', 200);
        }

        if (!$this->expenseService->checkExpense(
            \Auth::user()->id,
            $request->input('girl_id'),
            Constants::EXP_FLP
        )){
            $this->expenseService->setExpense(
                \Auth::user()->id,
                $request->input('girl_id'),
                Constants::EXP_FLP,
                $this->expenseService->getCost(Constants::EXP_FLP)
            );
        }

        $girl = User::select(['first_name', 'last_name', 'phone'])
            ->where('id', '=', (int) $request->input('girl_id'))
            ->first();

        return new JsonResponse($girl, 200);
    }

    /**
     * Return Girl Name + Surname + Email
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getFle(Request $request)
    {
        $this->validate($request, $this->rules);

        if (!(
            (float) $this->getMoney() >= (float) $this->expenseService->getCost(Constants::EXP_FLE)
        )){
            return new JsonResponse('Enough Love Coins on your account', 200);
        }

        if (!$this->expenseService->checkExpense(
            \Auth::user()->id,
            $request->input('girl_id'),
            Constants::EXP_FLE
        )){
            $this->expenseService->setExpense(
                \Auth::user()->id,
                $request->input('girl_id'),
                Constants::EXP_FLE,
                $this->expenseService->getCost(Constants::EXP_FLE)
            );
        }

        $girl = User::select(['first_name', 'last_name', 'email'])
            ->where('id', '=', (int) $request->input('girl_id'))
            ->first();

        return new JsonResponse($girl, 200);
    }
}

