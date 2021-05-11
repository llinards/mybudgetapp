<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function getAllExpenses()
    {
        $allExpenses = Expense::get();
        return response()->json($allExpenses);
    }

    
}
