<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Loata\AreaCostRequest;
use App\Models\Fines;
use App\Models\AreaCost;
use Illuminate\Http\Request;
use App\Traits\Message;

class AreaCostController extends Controller
{

    use Message;


    public function index(Request $request)
    {
        $costs = AreaCost::with('area','area.state','area.state.country')->
            when($request->search,function($q) use($request){
                $q->where('cost',$request->search)
                ->orWhereRelation('area.translations','name','like','%'.$request->search.'%')
                ->orWhereRelation('area.state.translations','name','like','%'.$request->search.'%')
                ->orWhereRelation('area.state.country.translations','name','like','%'.$request->search.'%');
            })
        ->latest()->paginate(5);
        return $this->sendResponse(['costs' => $costs],'Data exited successfully');
    }


    public function store(AreaCostRequest $request)
    {

        AreaCost::create($request->only(['area_id','cost']));
        return $this->sendResponse([],'Data exited successfully');

    }

    public function show($id)
    {
        $cost = AreaCost::with('area','area.state')->findOrFail($id);
        return $this->sendResponse(['cost' => $cost],'Data exited successfully');
    }


    public function update(AreaCostRequest $request, $id)
    {
        $cost = AreaCost::findOrFail($id);
        $cost->update($request->only(['area_id','cost']));
        $cost->save();
        return $this->sendResponse([],'Data exited successfully');
    }

    public function destroy($id)
    {
        $cost = AreaCost::findOrFail($id);
        $cost->delete();
        return $this->sendResponse([],'Deleted successfully');
    }
}
