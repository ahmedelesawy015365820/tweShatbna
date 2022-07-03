<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SizingOne;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SizingOneController extends Controller
{
    use Message;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $advisors = SizingOne::when($request->search, function ($q) use ($request) {
            return $q->whereRelation('translations', 'name', 'like', '%' . $request->search . '%');
        })->latest()->paginate(5);

        return $this->sendResponse(['packages' => $advisors], 'Data exited successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // Validator request
            $v = Validator::make($request->all(), [
                'ar.name' => 'required', Rule::unique('sizing_one_translations', 'name'),
                'en.name' => 'required', Rule::unique('sizing_one_translations', 'name'),
                'ar.description' => 'required',
                'en.description' => 'required',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $data = $request->only(['ar','en']);
            SizingOne::create($data);

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

            $advisor = SizingOne::find($id)->makeVisible('translations');

            return $this->sendResponse(['package' => $advisor], 'Data exited successfully');

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
    public function update(Request $request, SizingOne $sizingOne)
    {
        try {

            DB::beginTransaction();

            // Validator request
            $v = Validator::make($request->all(), [
                'ar.name' => ['required', Rule::unique('sizing_one_translations', 'name')->whereNot('sizing_one_id', $sizingOne->id)],
                'en.name' => ['required', Rule::unique('sizing_one_translations', 'name')->whereNot('sizing_one_id', $sizingOne->id)],
                'ar.description' => ['required'],
                'en.description' => ['required'],
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }
            $data = $request->only(['ar','en']);
            $sizingOne->update($data);

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
    public function destroy(SizingOne $sizingOne)
    {
        $sizingOne->delete();
        return $this->sendResponse([], 'Data exited successfully');
    }
}
