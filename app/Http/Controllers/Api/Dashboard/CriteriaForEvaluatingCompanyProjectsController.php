<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProjectsManagement\CompanyCriteriaRequest;
use App\Models\CriteriaForEvaluatingCompanyProjects;
use App\Traits\Message;
use Illuminate\Http\Request;

class CriteriaForEvaluatingCompanyProjectsController extends Controller
{
    use Message;


    public function index(Request $request)
    {
        $criteria = CriteriaForEvaluatingCompanyProjects::
        when($request->search,function($q) use($request){
            $q->where('percentage',$request->search)
            ->orWhereRelation('translations','name','like','%'.$request->search.'%');
        })->latest()->paginate(5);
        return $this->sendResponse(['criteria' => $criteria],'Data exited successfully');
    }


    public function store(CompanyCriteriaRequest $request)
    {
        CriteriaForEvaluatingCompanyProjects::create($request->validated());
        return $this->sendResponse([],'Data exited successfully');

    }

    public function show($id)
    {
        $criterion = CriteriaForEvaluatingCompanyProjects::findOrFail($id);
        return $this->sendResponse(['criterion' => $criterion],'Data exited successfully');
    }


    public function update(CompanyCriteriaRequest $request, $id)
    {
        $criterion = CriteriaForEvaluatingCompanyProjects::findOrFail($request->id);
        $criterion->update($request->validated());
        $criterion->save();
        return $this->sendResponse([],'Data exited successfully');
    }

    public function destroy($id)
    {
        $criterion = CriteriaForEvaluatingCompanyProjects::findOrFail($id);
        $criterion->delete();
        return $this->sendResponse([],'Deleted successfully');
    }
}
