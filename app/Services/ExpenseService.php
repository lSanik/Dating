<?php

namespace App\Services;

use App\Models\Expenses;
use App\Models\ServicesPrice;
use App\Models\User;
use Carbon\Carbon;

class ExpenseService
{
    /**
     * @var Expenses
     */
    private $expense;


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

        if ($expense) {
            return true;
        }

        return false;
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
    }
}