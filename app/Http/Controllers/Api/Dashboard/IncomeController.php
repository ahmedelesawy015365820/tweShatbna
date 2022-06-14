<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class IncomeController extends Controller
{
    use Message;

    /**
     * get main treasury
     */
    public function mainIncome()
    {
        $incomes = Income::where([
            ['income_id', null],
            ['active', 1],
        ])->get();
        return $this->sendResponse(['incomes' => $incomes], 'Data exited successfully');
    }

    /**
     * activation treasury
     */
    public function activationIncome($id)
    {
        $income = Income::find($id);

        if ($income->active == 1)
        {
            $income->update([
                "active" => 0
            ]);
        }else{
            $income->update([
                "active" => 1
            ]);
        }


        return $this->sendResponse([], 'Data exited successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $incomes = Income::with('parent')->when($request->search, function ($q) use ($request) {
            return $q->whereRelation('translations', 'name', 'like', '%' . $request->search . '%');
        })->paginate(5);

        return $this->sendResponse(['incomes' => $incomes], 'Data exited successfully');
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
                'ar.name' => ['required', Rule::unique('income_translations', 'name')],
                'en.name' => ['required', Rule::unique('income_translations', 'name')],
                'income_id' => 'nullable',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            Income::create($request->all());

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

            $income = Income::find($id)->makeVisible('translations');

            $mainIncome = Income::where([
                ['income_id', null],
                ['active', 1],
            ])->get();

            return $this->sendResponse(['income' => $income, 'mainIncome' => $mainIncome], 'Data exited successfully');

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
    public function update(Request $request, Income $income)
    {
        try {

            DB::beginTransaction();

            // Validator request
            $v = Validator::make($request->all(), [
                'ar.name' => ['required', Rule::unique('income_translations', 'name')->whereNot('income_id', $income->id)],
                'en.name' => ['required', Rule::unique('income_translations', 'name')->whereNot('income_id', $income->id)],
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $income->update($request->all());

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
    public function destroy(Income $income)
    {
        $income->delete();

        return $this->sendResponse([], 'Data exited successfully');
    }
}
