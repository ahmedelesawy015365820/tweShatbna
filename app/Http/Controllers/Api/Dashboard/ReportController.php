<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\IncomeAndExpense;
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
                $q->when($request->start_date && $request->end_date, function ($q) use ($request) {
                    $q->whereDate('payment_date', ">=", $request->from_date)
                        ->whereDate('payment_date', "<=", $request->to_date);
                });
            })->latest()->paginate(5);

        return $this->sendResponse(['incomes' => $incomeAndExpense], 'Data exited successfully');
    }
}
