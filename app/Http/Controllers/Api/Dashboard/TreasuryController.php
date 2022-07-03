<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Treasury;
use Illuminate\Http\Request;
use App\Traits\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TreasuryController extends Controller
{
    use Message;

    /**
     * get main treasury
     */
    public function mainTreasury()
    {
        $treasuries = Treasury::where([
            ['treasury_id', null],
            ['active', 1],
        ])->get();
        return $this->sendResponse(['treasuries' => $treasuries], 'Data exited successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $treasuries = Treasury::with('treasuryParent')->when($request->search, function ($q) use ($request) {
            return $q->whereRelation('translations', 'name', 'like', '%' . $request->search . '%');
        })->paginate(5);

        return $this->sendResponse(['treasuries' => $treasuries], 'Data exited successfully');
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
                'ar.name' => ['required', Rule::unique('treasury_translations', 'name')],
                'en.name' => ['required', Rule::unique('treasury_translations', 'name')],
                'treasury_id' => 'nullable',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }
            $data = $request->only(['ar','en','treasury_id']);

            Treasury::create($data);

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

            $treasury = Treasury::find($id)->makeVisible('translations');

            $mainTreasury = Treasury::where([
                ['treasury_id', null],
                ['active', 1],
            ])->get();

            return $this->sendResponse(['treasury' => $treasury, 'mainTreasury' => $mainTreasury], 'Data exited successfully');

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
    public function update(Request $request, Treasury $treasury)
    {
        try {

            DB::beginTransaction();

            // Validator request
            $v = Validator::make($request->all(), [
                'ar.name' => ['required', Rule::unique('treasury_translations', 'name')->whereNot('treasury_id', $treasury->id)],
                'en.name' => ['required', Rule::unique('treasury_translations', 'name')->whereNot('treasury_id', $treasury->id)],
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }
            $data = $request->only(['ar','en','treasury_id']);
            $treasury->update($data);

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
    public function destroy(Treasury $treasury)
    {
        $treasury->delete();
    }
}