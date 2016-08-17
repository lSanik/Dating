<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Models\Horoscope;
use App\Models\Profile;
use App\Models\User;
use App\Services\ExpenseService;
use App\Services\ZodiacSignService;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use Psy\Util\Json;
use Symfony\Component\HttpFoundation\JsonResponse;

class HoroscopeController extends Controller
{
    /**
     * @var ExpenseService
     */
    private $expenseService;

    /**
     * @var ZodiacSignService
     */
    private $zodiac;

    /**
     * HoroscopeController constructor.
     * @param ExpenseService $expenseService
     * @param ZodiacSignService $zodiac
     */
    public function __construct(ExpenseService $expenseService, ZodiacSignService $zodiac)
    {
        $this->middleware('auth');
        $this->expenseService = $expenseService;
        $this->zodiac = $zodiac;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function handler(Request $request)
    {
        /*
         * Todo: refactor this shit with re-DB
         */
        $data = '';

        $this->validate($request, [
           'girl_id' => 'required',
        ]);

        //todo: move to service
        if (!(
            (float) $this->getMoney() >= (float) $this->expenseService->getCost(Constants::EXP_FLP)
        )){
            return new JsonResponse('Enough Love Coins on your account', 404);
        }

        if (!$this->expenseService->checkExpense(
                \Auth::user()->id,
                $request->input('girl_id'),
                Constants::EXP_HOROSCOPE)
        ){
            $this->expenseService->setExpense(
                \Auth::user()->id,
                $request->input('girl_id'),
                Constants::EXP_HOROSCOPE,
                $this->expenseService->getCost(Constants::EXP_HOROSCOPE)
            );
        }

        //@todo: check
        if ($this->getBirthday(\Auth::user()->id) == '') {
            return new JsonResponse('Please fill your profile data');
        }

        $ud = \DB::table('hdate')
            ->where(
                'name',
                '=',
                $this->zodiac->getSignByBirthday(
                    $this->getBirthday(\Auth::user()->id)
                )
            )->first();

        $gd = \DB::table('hdate')
            ->where(
                'name',
                '=',
                $this->zodiac->getSignByBirthday(
                    $this->getBirthday(
                        $request->input('girl_id')))
            )->first();

        $hc = \DB::table('hcompare')
            ->where('primary', '=', $ud->id)
            ->where('secondary', '=', $gd->id)
            ->first();
        
        $zodiac = \DB::table('htranslate')
            ->where('compare', '=', $hc->id)
            ->where('locale', '=', \App::getLocale())
            ->first();

        return new JsonResponse($zodiac);
    }

    /**
     * @param integer $user_id
     * @return mixed
     */
    private function getBirthday($user_id)
    {
        return \DB::table('profile')->where('user_id', '=', $user_id)->first()->birthday ?: '';
    }
}

