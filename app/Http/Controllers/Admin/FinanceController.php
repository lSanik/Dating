<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expenses;
use App\Models\ServicesPrice;
use App\Services\ExpenseService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //\Auth::user()->hasRole(['Owner']);

        view()->share('heading', 'Finance');
        view()->share('new_ticket_messages', parent::getUnreadMessages());
        view()->share('unread_ticket_count', parent::getUnreadMessagesCount());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.finance.index');
    }

    public function control()
    {
        $plans = ServicesPrice::all();

        return view('admin.finance.control')->with([
            'plans' => $plans,
        ]);
    }

    public function saveData(Request $request, $id)
    {
        $fin = ServicesPrice::find($id);
        $fin->price = $request->input('price');
        $fin->save();

        \Session::flash('flash_success', 'Обновлено');

        return redirect('/'.\App::getLocale().'/admin/finance/control');
    }

    public function stat()
    {
        //todo: move to service
        $rate = ServicesPrice::where('name', '=', 'ex_rate')->first();

        if( \Auth::user()->hasRole('Owner')) {
            
            $prevMonth = \DB::select(
                'SELECT expenses.*  ,users.id as uid, users.first_name, users.last_name FROM expenses
                 RIGHT JOIN users ON users.id = expenses.partner_id
                 WHERE MONTH(`expenses`.`created_at`) = MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH)) 
                 AND YEAR(`expenses`.`created_at`) = YEAR(NOW())'
                );

            $month = \DB::select(
                'SELECT expenses.*  ,users.id as uid, users.first_name, users.last_name FROM expenses
                 RIGHT JOIN users ON users.id = expenses.partner_id
                 WHERE MONTH(`expenses`.`created_at`) = MONTH(NOW()) 
                 AND YEAR(`expenses`.`created_at`) = YEAR(NOW()) '
                );

        } else {

            $prevMonth = \DB::select(
                'SELECT * FROM expenses
           WHERE MONTH(`created_at`) = MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH)) 
           AND YEAR(`created_at`) = YEAR(NOW())
           AND `partner_id` = '. \Auth::user()->id);

            $month = \DB::select(
                'SELECT * FROM expenses 
             WHERE MONTH(`created_at`) = MONTH(NOW()) 
             AND YEAR(`created_at`) = YEAR(NOW()) 
             AND `partner_id` = '.\Auth::user()->id);
        }

        $amount = 0;
        $l_amount = 0;

        foreach ($month as $m) {
            $amount += ($m->expense / 2);
        }

        foreach ($prevMonth as $p) {
            $l_amount += ($p->expense / 2);
        }

        return view('admin.finance.stat')->with([
            'stat' => $this->getAll(),
            'rate' => $rate,
            'month' => $month,
            'prevMonth' => $prevMonth,
            'amount' => $amount,
            'l_amount' => $l_amount,
        ]);
    }

    /**
     * @return mixed
     */
    private function getAll()
    {
        if ( \Auth::user()->hasRole('Owner') ) {
            return Expenses::orderBy('expenses.created_at', 'DESC')
                ->select([
                    'expenses.id as eid', 'expenses.user_id', 'expenses.girl_id', 'expenses.expense',
                    'expenses.created_at', 'expenses.type', 'expenses.partner_id as epid',
                    'users.id as uid', 'users.first_name', 'users.last_name', 'users.partner_id',
                ])
                ->join('users', 'users.id', '=', 'expenses.user_id')
                ->paginate(25);
        } else {
            return Expenses::orderBy('expenses.created_at', 'DESC')
                ->select([
                    'expenses.id as eid', 'expenses.user_id', 'expenses.girl_id', 'expenses.expense',
                    'expenses.created_at', 'expenses.type', 'expenses.partner_id as epid',
                    'users.id as uid', 'users.first_name', 'users.last_name', 'users.partner_id',
                ])
                ->join('users', 'users.id', '=', 'expenses.user_id')
                ->where('expenses.partner_id', '=', \Auth::user()->id)
                ->paginate(25);
        }
    }
}
