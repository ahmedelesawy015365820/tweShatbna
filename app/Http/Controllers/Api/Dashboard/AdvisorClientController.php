<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AdvisorClient;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdvisorClientController extends Controller
{
    use Message;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $packages = AdvisorClient::with('country','advisorPackage')->when($request->search, function ($q) use ($request) {
            return $q->whereRelation('translations', 'name', 'like', '%' . $request->search . '%');
        })->latest()->paginate(5);

        return $this->sendResponse(['packages' => $packages], 'Data exited successfully');
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
                'name' => ['required'],
                'email' => ['required|email'],
                'phone' => ['required'],
                'address' => ['required'],
                'note' => ['required'],
                'advisor_package_id' => ['required|exists:advisor_packages,id'],
                'country_id' => ['required|exists:countries,id'],
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }
            $data = $request->only(['name','email','phone','address','note','advisor_package_id','country_id']);

            AdvisorClient::create($data);

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

            $package = AdvisorPackage::find($id)->makeVisible('translations');

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
    public function update(Request $request, AdvisorPackage $advisorPackage)
    {
        try {

            DB::beginTransaction();

            // Validator request
            $v = Validator::make($request->all(), [
                'ar.name' => ['required', Rule::unique('advisor_package_translations', 'name')->whereNot('advisor_package_id', $advisorPackage->id)],
                'en.name' => ['required', Rule::unique('advisor_package_translations', 'name')->whereNot('advisor_package_id', $advisorPackage->id)],
                'ar.description' => ['required'],
                'en.description' => ['required'],
                'price' => ['required'],
            ]);


            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $data = $request->only(['ar','en','price']);

            $advisorPackage->update($data);

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
    public function destroy(AdvisorPackage $advisor_package)
    {
        //
    }
}
