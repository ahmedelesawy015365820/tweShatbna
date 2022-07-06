<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;

use App\Models\Setting;
use App\Models\SizingClient;
use App\Models\SizingOne;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SizingServiceController extends Controller
{

    use Message;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sectionOne()
    {
        $packages = SizingOne::get();

        return $this->sendResponse(['advisorOnes' => $packages], 'Data exited successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first(['price_sizing','contact_sizing']);
        return $this->sendResponse(['setting' => $setting], 'Data exited successfully');

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
                'country_id' => 'required|exists:countries,id',
                'state_id' => 'required|exists:states,id',
                'location' => 'required',
                'space' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'note' => 'required',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }
            $data = $request->only(['country_id','state_id','location','space','name','phone','note']);

            $setting = Setting::first();

            $data['total_amount'] = $request->space * $setting->price_sizing;

            SizingClient::create($data);

            DB::commit();

            return $this->sendResponse([], 'Data exited successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }

    }

    public function edit($id)
    {
        //
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
    public function update(Request $request, SizingClient $sizingClient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SizingClient $sizingClient)
    {
        //
    }

}
