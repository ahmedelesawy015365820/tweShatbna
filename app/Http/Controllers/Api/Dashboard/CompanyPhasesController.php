<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProjectsManagement\CompanyPhasesRequest;
use App\Models\CompanyPhases;
use App\Traits\Message;
use Illuminate\Http\Request;

class CompanyPhasesController extends Controller
{
    use Message;


    public function index(Request $request)
    {
        $phases = CompanyPhases::
        when($request->search,function($q) use($request){
            $q->whereRelation('translations','name','like','%'.$request->search.'%')
            ->orWhere('client_percentage','like','%'.$request->search.'%')
            ->orWhere('company_percentage','like','%'.$request->search.'%');
        })->latest()->paginate(5);
        return $this->sendResponse(['phases' => $phases],'Data exited successfully');
    }


    public function store(CompanyPhasesRequest $request)
    {

        // picture move
        $image = time().'.'. $request->image->getClientOriginalName();
        $request->image->storeAs('general', $image,'general');
        $data=$request->validated();
        $data['image']=$image;
        CompanyPhases::create($data);
        return $this->sendResponse([],'Data exited successfully');

    }

    public function show($id)
    {
        $phase = CompanyPhases::findOrFail($id);
        return $this->sendResponse(['phase' => $phase],'Data exited successfully');
    }


    public function update(CompanyPhasesRequest $request, $id)
    {

        $data=$request->validated();
        $phase = CompanyPhases::findOrFail($request->id);

        if($request->image){
            unlink(public_path('web/img/general/'.$phase->image));
            // picture move
            $image = time().'.'. $request->image->getClientOriginalName();
            $request->image->storeAs('general', $image,'general');
            $data['image']=$image;
        }


        $phase->update($data);
        $phase->save();
        return $this->sendResponse([],'Data exited successfully');
    }

    public function destroy($id)
    {

        $phase = CompanyPhases::findOrFail($id);
        unlink(public_path('web/img/general/'.$phase->image));
        $phase->delete();
        return $this->sendResponse([],'Deleted successfully');
    }
}
