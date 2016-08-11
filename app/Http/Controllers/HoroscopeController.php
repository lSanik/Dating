<?php

namespace App\Http\Controllers;

use App\Models\Horoscope;
use App\Models\Profile;
use App\Models\User;
use App\Services\ExpenseService;
use Carbon\Carbon;
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
     * HoroscopeController constructor.
     * @param ExpenseService $expenseService
     */
    public function __construct(ExpenseService $expenseService)
    {
        $this->middleware('auth');
        $this->expenseService = $expenseService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function handler(Request $request)
    {
        $data = '';

        $this->validate($request, [
           'girl_id' => 'required',
        ]);

        $user_birthday = $this->getBirthday(\Auth::user()->id);
        $girl_birthday = $this->getBirthday($request->input('girl_id'));

        $data = $this->convert($user_birthday, $girl_birthday);
        dump($data);
        //return new JsonResponse($data, 200);
    }

    /**
     * @param \Date $birthday
     * @return int
     */
    private function getZodiac($birthday)
    {
        $zodiac = '';

        return (int) $zodiac;
    }

    /**
     * @param integer $uid
     * @return mixed
     */
    private function getBirthday($uid)
    {
        return Profile::select('birthday')
            ->where('user_id', '=', $uid)
            ->first()->birthday;
    }

    /**
     * @param integer $primary
     * @param integer $secondary
     *
     * @todo: rewrite this shit
     */
    private function getComapre($primary, $secondary)
    {
//        $compare = Horoscope::select('id')
//            ->where('primary', '=', $primary)
//            ->where('secondary', '=', $secondary)
//            ->first();
//
//        return \DB::table('htranslate')->select('text')
//            ->where('compare', '=', $compare->id)
//            ->where('locale', '=', \App::getLocale());
    }

    private function convert($birthday, $date)
    {
        $user_birthday = new Carbon($birthday);
        $girl_bithday = new Carbon($date);

        return ['user' => $user_birthday, 'girl' => $girl_bithday];
    }
}
