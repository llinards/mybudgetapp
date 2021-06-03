<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function getAllExpenses()
    {
        $allExpenses = Expense::where('user_id', 1)->orderBy('created_at', 'DESC')->get();
        return $allExpenses;
    }

    public function addNewExpense(Request $request)
    {
        try {
            $this->validate($request, [
                'amount' => 'required',
                'name' => 'required',
                'status' => 'required'
            ]);

            $newExpense = new Expense();
            //TODO: dynamic user id
            $newExpense->user_id = 1;
            $newExpense->amount = $request->amount;
            $newExpense->name = $request->name;
            $newExpense->status = $request->status;

            $newExpense->save();

            return true;
        } catch (\Exception $e) {
            return 'Error!';
        }
    }

    public function deleteExpense(Request $request)
    {
        try {
            Expense::destroy($request->id);
            return true;
        } catch (\Exception $e) {
            return 'Error!';
        }
    }
}
