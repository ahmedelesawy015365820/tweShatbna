<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProjectsManagement\DesignersFinesRequest;
use App\Models\Fines;
use Illuminate\Http\Request;
use App\Traits\Message;

class DesignersFinesController extends Controller
{

    use Message;


    public function index(Request $request)
    {
        $designer_fines = Fines::
        where(function($q) use($request){
            $q->when($request->search,function($q) use($request){
                $q->where('from',$request->search)
                ->orWhere('to',$request->search)
                ->orWhere('percentage',$request->search);
            });
        })
        ->where(function($q) use($request){
            $q->when($request->type == 2 || $request->type == 1,function($q) use($request){
                 $q->where('type', $request->type == 2 ? '0' : $request->type);
            });
        })
        ->latest()->paginate(5);
        return $this->sendResponse(['designer_fines' => $designer_fines],'Data exited successfully');
    }


    public function store(DesignersFinesRequest $request)
    {

        Fines::create($request->all());
        return $this->sendResponse([],'Data exited successfully');

    }

    public function show($id)
    {
        $designerFines = Fines::findOrFail($id);
        return $this->sendResponse(['fine' => $designerFines],'Data exited successfully');
    }


    public function update(DesignersFinesRequest $request, $id)
    {
        $designerFines = Fines::findOrFail($id);
        $designerFines->update($request->all());
        $designerFines->save();
        return $this->sendResponse([],'Data exited successfully');
    }

    public function destroy($id)
    {
        $designerFines = Fines::findOrFail($id);
        $designerFines->delete();
        return $this->sendResponse([],'Deleted successfully');
    }
}
