<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProjectsManagement\PhaseBandsRequest;
use App\Models\PhaseBand;
use App\Traits\Message;
use Illuminate\Http\Request;

class PhaseBandsController extends Controller
{
    use Message;

    public function index(Request $request)
    {
        $bands = PhaseBand::
        when($request->search,function($q) use($request){
            $q->whereRelation('translations','name','like','%'.$request->search.'%');
        })->latest()->paginate(5);
        return $this->sendResponse(['bands' => $bands],'Data exited successfully');
    }


    public function store(PhaseBandsRequest $request)
    {
        PhaseBand::create($request->validated());
        return $this->sendResponse([],'Data exited successfully');
    }

    public function show($id)
    {
        $band = PhaseBand::findOrFail($id);
        return $this->sendResponse(['band' => $band],'Data exited successfully');
    }


    public function update(PhaseBandsRequest $request, $id)
    {
        $band = PhaseBand::findOrFail($request->id);
        $band->update($request->validated());
        $band->save();
        return $this->sendResponse([],'Data exited successfully');
    }

    public function destroy($id)
    {
        $band = PhaseBand::findOrFail($id);
        $band->delete();
        return $this->sendResponse([],'Deleted successfully');
    }
}
