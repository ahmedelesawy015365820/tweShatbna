<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\IncomeAndExpense;
use App\Models\TransferringTreasury;
use App\Traits\Message;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    use Message;
    // income platform report
    public function incomePlatformReport(Request $request)
    {
        $incomeAndExpense = IncomeAndExpense::with('income', 'user')->whereNotNull('income_id')
            ->where(function ($q) use ($request) {
                $q->when($request->search, function ($q) use ($request) {
                    return $q->OrWhere('notes', 'like', '%' . $request->search . '%')
                        ->orWhere('amount', 'like', '%' . $request->search . '%')
                        ->orWhere('payment_date', 'like', '%' . $request->search . '%')
                        ->orWhere('payer', 'like', '%' . $request->search . '%')
                        ->orWhereRelation('user', 'name', 'like', '%' . $request->search . '%')
                        ->orWhereRelation('income.translations', 'name', 'like', '%' . $request->search . '%');
                });
            })->where(function ($q) use ($request) {
                $q->when($request->from_date && $request->to_date, function ($q) use ($request) {
                    $q->whereDate('payment_date', ">=", $request->from_date)
                        ->whereDate('payment_date', "<=", $request->to_date);
                });
            })->where(function ($q) use ($request) {
                $q->when($request->income_id, function ($q) use ($request) {
                    $q->where('income_id', $request->income_id);
                });
            })->latest()->paginate(15);

        return $this->sendResponse(['incomes' => $incomeAndExpense], 'Data exited successfully');
    }

    // expense platform report
    public function expensePlatformReport(Request $request)
    {
        $incomeAndExpense = IncomeAndExpense::with('expense', 'user')->whereNotNull('expense_id')
            ->where(function ($q) use ($request) {
                $q->when($request->search, function ($q) use ($request) {
                    return $q->OrWhere('notes', 'like', '%' . $request->search . '%')
                        ->orWhere('amount', 'like', '%' . $request->search . '%')
                        ->orWhere('payment_date', 'like', '%' . $request->search . '%')
                        ->orWhere('payer', 'like', '%' . $request->search . '%')
                        ->orWhereRelation('user', 'name', 'like', '%' . $request->search . '%')
                        ->orWhereRelation('expense.translations', 'name', 'like', '%' . $request->search . '%');
                });
            })->where(function ($q) use ($request) {
                $q->when($request->from_date && $request->to_date, function ($q) use ($request) {
                    $q->whereDate('payment_date', ">=", $request->from_date)
                        ->whereDate('payment_date', "<=", $request->to_date);
                });
            })->where(function ($q) use ($request) {
                $q->when($request->expense_id, function ($q) use ($request) {
                    $q->where('expense_id', $request->expense_id);
                });
            })->latest()->paginate(15);

        return $this->sendResponse(['incomes' => $incomeAndExpense], 'Data exited successfully');
    }

    // transferring Treasury Platform Report

    public function transferringTreasuryPlatformReport(Request $request)
    {
        $incomeAndExpense = TransferringTreasury::with('fromTreasury', 'user','toTreasury')
            ->where(function ($q) use ($request) {
                $q->when($request->search, function ($q) use ($request) {
                    return $q->OrWhere('notes', 'like', '%' . $request->search . '%')
                        ->orWhere('amount', 'like', '%' . $request->search . '%')
                        ->orWhereRelation('user', 'name', 'like', '%' . $request->search . '%')
                        ->orWhereRelation('fromTreasury.translations', 'name', 'like', '%' . $request->search . '%')
                        ->orWhereRelation('toTreasury.translations', 'name', 'like', '%' . $request->search . '%');
                });
            })->where(function ($q) use ($request) {
                $q->when($request->from_date && $request->to_date, function ($q) use ($request) {
                    $q->whereDate('created_at', ">=", $request->from_date)
                        ->whereDate('created_at', "<=", $request->to_date);
                });
            })->latest()->paginate(15);

        return $this->sendResponse(['incomes' => $incomeAndExpense], 'Data exited successfully');
    }

    // income treasury platform report
    public function incomeTreasuryPlatformReport(Request $request)
    {
        $incomeAndExpense = IncomeAndExpense::with('income', 'user')->whereNotNull('income_id')
            ->where(function ($q) use ($request) {
                $q->when($request->search, function ($q) use ($request) {
                    return $q->OrWhere('notes', 'like', '%' . $request->search . '%')
                        ->orWhere('amount', 'like', '%' . $request->search . '%')
                        ->orWhere('payment_date', 'like', '%' . $request->search . '%')
                        ->orWhere('payer', 'like', '%' . $request->search . '%')
                        ->orWhereRelation('treasury.translations', 'name', 'like', '%' . $request->search . '%')
                        ->orWhereRelation('user', 'name', 'like', '%' . $request->search . '%')
                        ->orWhereRelation('income.translations', 'name', 'like', '%' . $request->search . '%');
                });
            })->where(function ($q) use ($request) {
                $q->when($request->from_date && $request->to_date, function ($q) use ($request) {
                    $q->whereDate('payment_date', ">=", $request->from_date)
                        ->whereDate('payment_date', "<=", $request->to_date);
                });
            })->where(function ($q) use ($request) {
                $q->when($request->treasury_id, function ($q) use ($request) {
                    $q->where('treasury_id', $request->treasury_id);
                });
            })->latest()->paginate(15);

        return $this->sendResponse(['incomes' => $incomeAndExpense], 'Data exited successfully');
    }

    // expense treasury platform report
    public function expenseTreasuryPlatformReport(Request $request)
    {
        $incomeAndExpense = IncomeAndExpense::with('expense', 'user')->whereNotNull('expense_id')
            ->where(function ($q) use ($request) {
                $q->when($request->search, function ($q) use ($request) {
                    return $q->OrWhere('notes', 'like', '%' . $request->search . '%')
                        ->orWhere('amount', 'like', '%' . $request->search . '%')
                        ->orWhere('payment_date', 'like', '%' . $request->search . '%')
                        ->orWhere('payer', 'like', '%' . $request->search . '%')
                        ->orWhereRelation('treasury.translations', 'name', 'like', '%' . $request->search . '%')
                        ->orWhereRelation('user', 'name', 'like', '%' . $request->search . '%')
                        ->orWhereRelation('expense.translations', 'name', 'like', '%' . $request->search . '%');
                });
            })->where(function ($q) use ($request) {
                $q->when($request->from_date && $request->to_date, function ($q) use ($request) {
                    $q->whereDate('payment_date', ">=", $request->from_date)
                        ->whereDate('payment_date', "<=", $request->to_date);
                });
            })->where(function ($q) use ($request) {
                $q->when($request->treasury_id, function ($q) use ($request) {
                    $q->where('treasury_id', $request->treasury_id);
                });
            })->latest()->paginate(15);

        return $this->sendResponse(['incomes' => $incomeAndExpense], 'Data exited successfully');
    }

    // Daily Balance platform report
    public function dailyBalancePlatformReport(Request $request)
    {
        $incomeAndExpense = IncomeAndExpense::with('expense','income','user')
           ->where(function ($q) use ($request) {
                $q->when($request->from_date && $request->to_date, function ($q) use ($request) {
                    $q->whereDate('payment_date', ">=", $request->from_date)
                        ->whereDate('payment_date', "<=", $request->to_date);
                });
           })->where(function ($q) use ($request) {
                $q->when($request->treasury_id, function ($q) use ($request) {
                    $q->where('treasury_id', $request->treasury_id);
                });
        })->get();

        return $this->sendResponse(['incomes' => $incomeAndExpense], 'Data exited successfully');
    }
}
