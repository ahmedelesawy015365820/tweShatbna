<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Loata\WeightCostRequest;
use App\Models\Fines;
use App\Models\WeightCost;
use Illuminate\Http\Request;
use App\Traits\Message;

class WeightCostController extends Controller
{

    use Message;


    public function index(Request $request)
    {
        $costs = WeightCost::
            when($request->search,function($q) use($request){
                $q->where('from',$request->search)
                ->orWhere('to',$request->search)
                ->orWhere('cost',$request->search);
            })
        ->latest()->paginate(5);
        return $this->sendResponse(['costs' => $costs],'Data exited successfully');
    }


    public function store(WeightCostRequest $request)
    {

        WeightCost::create($request->validated());
        return $this->sendResponse([],'Data exited successfully');

    }

    public function show($id)
    {
        $cost = WeightCost::findOrFail($id);
        return $this->sendResponse(['cost' => $cost],'Data exited successfully');
    }


    public function update(WeightCostRequest $request, $id)
    {
        $cost = WeightCost::findOrFail($id);
        $cost->update($request->validated());
        $cost->save();
        return $this->sendResponse([],'Data exited successfully');
    }

    public function destroy($id)
    {
        $cost = WeightCost::findOrFail($id);
        $cost->delete();
        return $this->sendResponse([],'Deleted successfully');
    }
}
