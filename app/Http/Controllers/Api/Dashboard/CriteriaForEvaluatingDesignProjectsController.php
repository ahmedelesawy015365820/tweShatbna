<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProjectsManagement\DesignCriteriaRequest;
use App\Models\CriteriaForEvaluatingDesignProjects;
use App\Traits\Message;
use Illuminate\Http\Request;

class CriteriaForEvaluatingDesignProjectsController extends Controller
{
    use Message;


    public function index(Request $request)
    {
        $criteria = CriteriaForEvaluatingDesignProjects::
        when($request->search,function($q) use($request){
            $q->where('percentage',$request->search)
            ->orWhereRelation('translations','name','like','%'.$request->search.'%');
        })->latest()->paginate(5);
        return $this->sendResponse(['criteria' => $criteria],'Data exited successfully');
    }


    public function store(DesignCriteriaRequest $request)
    {

        CriteriaForEvaluatingDesignProjects::create($request->validated());
        return $this->sendResponse([],'Data exited successfully');

    }

    public function show($id)
    {
        $criterion = CriteriaForEvaluatingDesignProjects::findOrFail($id);
        return $this->sendResponse(['criterion' => $criterion],'Data exited successfully');
    }


    public function update(DesignCriteriaRequest $request, $id)
    {
        $criterion = CriteriaForEvaluatingDesignProjects::findOrFail($request->id);
        $criterion->update($request->validated());
        $criterion->save();
        return $this->sendResponse([],'Data exited successfully');
    }

    public function destroy($id)
    {
        $criterion = CriteriaForEvaluatingDesignProjects::findOrFail($id);
        $criterion->delete();
        return $this->sendResponse([],'Deleted successfully');
    }
}
