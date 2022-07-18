<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Complement;
use App\Models\Country;
use App\Models\State;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AreaController extends Controller
{
    use Message;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $areas = Area::with(['state.country','state'])
        ->when($request->search,function ($q) use($request){
            return $q
            ->whereRelation('translations','name','like','%'.$request->search.'%')
            ->orWhereRelation('state.country.translations','name','like','%'.$request->search.'%')
            ->orWhereRelation('state.translations','name','like','%'.$request->search.'%');
        })->latest()->paginate(10);

        return $this->sendResponse(['areas' => $areas],'Data exited successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {

            $country = Country::get();
            $states = State::where('country_id',1)->get();

            return $this->sendResponse(['country' => $country,'states' => $states],'Data exited successfully');

        }catch (\Exception $e){

            return $this->sendError('An error occurred in the system');

        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            // Validator request
            $v = Validator::make($request->all(), [
                'ar.name' => ['required', Rule::unique('area_translations','name')],
                'en.name' => ['required', Rule::unique('area_translations','name')],
                'country_id'    => 'required|exists:countries,id',
                'state_id'    => 'required|exists:states,id',
                'status'        => 'present'
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $data = $request->only(['en','ar','country_id','status','state_id']);

            $area= Area::create($data);

            DB::commit();
            return $this->sendResponse([],'Data exited successfully');
        }catch (\Exception $e){

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }
    }


    public function edit($id)
    {
        try {

            $area = Area::with('state.country')->find($id)->makeVisible('translations');
            $country = Country::get();
            $states = State::get();

            return $this->sendResponse(['country' => $country,'states' => $states,'area'=>$area],'Data exited successfully');

        }catch (\Exception $e){

            return $this->sendError('An error occurred in the system');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $area = Area::find($id);
            if($area){
                // Validator request
                $v = Validator::make($request->all(), [
                    'ar.name' => ['required', Rule::unique('area_translations','name')->whereNot('area_id',$id)],
                    'en.name' => ['required', Rule::unique('area_translations','name')->whereNot('area_id',$id)],
                    'country_id'    => 'required',
                    'status'        => 'present'
                ]);

                if ($v->fails()) {
                    return $this->sendError('There is an error in the data', $v->errors());
                }

                $data = $request->only(['en','ar','country_id','status','state_id']);

                $area->update($data);

                DB::commit();
                return $this->sendResponse([],'Data exited successfully');
            }else{
                return $this->sendError('ID is not exist');
            }
        }catch (\Exception $e){

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $area = Area::find($id);
            if ($area){
                $area->delete();
                return $this->sendResponse([],'Deleted successfully');
            }else{
                return $this->sendError('ID is not exist');
            }

        }catch (\Exception $e){
            return $this->sendError('An error occurred in the system');
        }
    }




    // get all countries
    public function get_countries(Request $request)
    {
        $countries = Country::where('status',1)->get();
        return $this->sendResponse(['countries' => $countries],'Data exited successfully');

    }
    // get states by country id
    public function country_states(Request $request)
    {
        $states = State::where('status',1)->where('country_id',$request->country_id)->get();
        return $this->sendResponse(['states' => $states],'Data exited successfully');

    }


    //get areas by state id
    public function state_areas(Request $request)
    {
        $areas = Area::where('status',1)->where('state_id',$request->state_id)->get();
        return $this->sendResponse(['areas' => $areas],'Data exited successfully');

    }
}
