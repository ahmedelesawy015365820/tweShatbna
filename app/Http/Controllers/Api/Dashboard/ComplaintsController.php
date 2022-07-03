<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Traits\Message;
class ComplaintsController extends Controller
{
    use Message;
    public function index(Request $request)
    {
        $complaints = Complaint::when($request->search,function($q) use($request){

        })->paginate(5);
        return $this->sendResponse(['complaints' => $complaints],'Data exited successfully');
    }

    public function show($id)
    {
        $complaint = Complaint::findOrFail($id);
        return $this->sendResponse(['complaint' => $complaint],'Data exited successfully');
    }


    public function update(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->update($request->all());
        $complaint->save();
        return $this->sendResponse([],'Data exited successfully');
    }


}
