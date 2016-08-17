<?php

namespace App\Services;

use App\Models\Expenses;
use App\Models\Finance;
use App\Models\ServicesPrice;
use App\Models\User;
use Carbon\Carbon;

/**
 * Class ExpenseService
 * @package App\Services
 *
 * todo: refactor
 */
class ExpenseService
{
    /**
     * @var Expenses
     */
    private $expense;

    /**
     * ExpenseService constructor.
     * @param Expenses $expenses
     */
    public function __construct(Expenses $expenses)
    {
        $this->expense = $expenses;
    }

    /**
     * @param $type
     * @return mixed
     *
     * todo: move to another service
     */
    public function getCost($type)
    {
        return ServicesPrice::getValueByTerm($type)->price;
    }

    /**
     * @param integer $user_id
     * @param integer $girl_id
     * @param string $type
     *
     * @return boolean
     */
    public function checkExpense($user_id, $girl_id, $type)
    {
        $expense = $this->expense
            ->where('user_id', '=', $user_id)
            ->where('girl_id', '=', (int) $girl_id)
            ->where('type', '=', $type)
            ->first();
        // todo review and test logic
        if ($expense && $this->checkExpire($expense->id)) {
            return true;
        }

        return false;
    }

    /**
     * @param $id
     * @return bool
     */
    private function checkExpire($id)
    {
        $expire = Carbon::createFromFormat('Y-m-d', Expenses::find($id)->expire);

        if ( !is_null($expire) && $expire->isSameDay(Carbon::now()) ) {
            return false;
        }

        return true;
    }


    /**
     * @param $user_id
     * @param $girl_id
     * @param string $type
     * @param int $expense_count
     * @param null $expire
     */
    public function setExpense($user_id, $girl_id, $type = '', $expense_count = 0, $expire = null)
    {
        $this->expense->insert([
            'user_id' => $user_id,
            'girl_id' => (int) $girl_id,
            'expense' => $expense_count,
            'type' => $type,
            'expire' => $expire,
            'partner_id' => User::getPartnerId($girl_id),
            'created_at' => Carbon::now(),
        ]);

        $this->changeBalance($user_id, $expense_count);
    }

    /**
     * todo move to finance service
     * 
     * @param integer $user_id
     * @param float|integer $cost
     */
    private function changeBalance($user_id, $cost)
    {
        $user = Finance::where('user_id', '=', $user_id)->first();
        $user->amount -= $cost;
        $user->save();
    }
}