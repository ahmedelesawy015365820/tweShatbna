<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AdvisorDetail;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdvisorPackageDetailController extends Controller
{
    use Message;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $packages = AdvisorDetail::when($request->search, function ($q) use ($request) {
//            return $q->whereRelation('translations', 'name', 'like', '%' . $request->search . '%');
//        })->latest()->paginate(5);
//
//        return $this->sendResponse(['packages' => $packages], 'Data exited successfully');
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
                'ar.name' => ['required'],
                'en.name' => ['required'],
                'advisor_package_id' => ['required'],
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }
            $data = $request->only(['ar','en','advisor_package_id']);

            AdvisorDetail::create($data);

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

            $package = AdvisorDetail::find($id)->makeVisible('translations');

            return $this->sendResponse(['package' => $package], 'Data exited successfully');

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
    public function show(Request $request,$id)
    {
        $packages = AdvisorDetail::where('advisor_package_id',$id)->when($request->search, function ($q) use ($request) {
            return $q->whereRelation('translations', 'name', 'like', '%' . $request->search . '%');
        })->latest()->paginate(5);

        return $this->sendResponse(['packages' => $packages], 'Data exited successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdvisorDetail $advisorDetail)
    {
        try {

            DB::beginTransaction();

            // Validator request
            $v = Validator::make($request->all(), [
                'ar.name' => ['required'],
                'en.name' => ['required'],
                'advisor_package_id' => ['required'],
            ]);


            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $data = $request->only(['ar','en','advisor_package_id']);

            $advisorDetail->update($data);

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
    public function destroy(AdvisorDetail $advisorDetail)
    {

        $advisorDetail->delete();
        return $this->sendResponse([],'Deleted successfully');

    }
}
