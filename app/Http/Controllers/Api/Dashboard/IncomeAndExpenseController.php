<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\IncomeAndExpense;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class IncomeAndExpenseController extends Controller
{
    use Message;
    // get calculate income
    public function calcIncome(Request $request)
    {
        $incomeAndExpense = IncomeAndExpense::with('income')->whereNotNull('income_id')
            ->where(function ($q) use($request){
                $q->when($request->search,function ($q) use($request){
                    return $q->OrWhere('notes','like','%'.$request->search.'%')
                        ->orWhere('amount','like','%'.$request->search.'%')
                        ->orWhere('payment_date','like','%'.$request->search.'%')
                        ->orWhereRelation('income.translations','name','like','%'.$request->search.'%');
                });

            })->latest()->paginate(5);

        return $this->sendResponse(['calcIncome' => $incomeAndExpense], 'Data exited successfully');
    }

    // get calculate expense

    public function calcExpense(Request $request)
    {
        $incomeAndExpense = IncomeAndExpense::with('expense')->whereNotNull('expense_id')
            ->where(function ($q) use($request){
                $q->when($request->search,function ($q) use($request){
                    return $q->OrWhere('notes','like','%'.$request->search.'%')
                        ->orWhere('amount','like','%'.$request->search.'%')
                        ->orWhere('payment_date','like','%'.$request->search.'%')
                        ->orWhereRelation('expense.translations','name','like','%'.$request->search.'%');
                });

            })->latest()->paginate(5);

        return $this->sendResponse(['calcExpense' => $incomeAndExpense], 'Data exited successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // Validator request
            $v = Validator::make($request->all(), [
                'payment_date' => 'required|date',
                'income_id' => 'nullable|exists:incomes,id',
                'expense_id' => 'nullable|exists:expenses,id',
                'notes' => 'required|string|min:3',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            IncomeAndExpense::create($request->all());

            DB::commit();

            return $this->sendResponse([], 'Data exited successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }

    }

    public function edit($id)
    {
        try {

            $income = IncomeAndExpense::find($id)->makeVisible('translations');

            $mainIncome = Income::where('active', 1)->get();

            return $this->sendResponse(['income' => $income, 'mainIncome' => $mainIncome], 'Data exited successfully');

        } catch (\Exception $e) {

            return $this->sendError('An error occurred in the system');

        }
    }

    public function editExpense($id)
    {
        try {

            $expense = IncomeAndExpense::find($id)->makeVisible('translations');

            $mainExpense = Income::where('active', 1)->get();

            return $this->sendResponse(['expense' => $expense, 'mainExpense' => $mainExpense], 'Data exited successfully');

        } catch (\Exception $e) {

            return $this->sendError('An error occurred in the system');

        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try {

            DB::beginTransaction();

            // Validator request
            $v = Validator::make($request->all(), [
                'payment_date' => 'required|date',
                'income_id' => 'nullable|exists:incomes,id',
                'expense_id' => 'nullable|exists:expenses,id',
                'notes' => 'required|string|min:3',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }
            $income_and_expense = IncomeAndExpense::find($id);

            $income_and_expense->update($request->all());

            DB::commit();

            return $this->sendResponse([], 'Data exited successfully');
        } catch (\Exception $e) {

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $income_and_expense = IncomeAndExpense::find($id);
        $income_and_expense->delete();
        return $this->sendResponse([], 'Data exited successfully');
    }
}
