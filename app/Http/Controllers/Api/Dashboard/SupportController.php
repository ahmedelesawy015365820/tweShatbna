<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactSupport;
use App\Traits\Message;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    use Message;

    public function index(Request $request)
    {
        $supports = ContactSupport::select('id','first','last','email')->when($request->search,function ($q) use($request){
            return $q->OrWhere('email','like','%'.$request->search.'%');
        })->latest()->paginate(15);

        return $this->sendResponse(['supports' => $supports],'Data exited successfully');
    }

    public function show($id)
    {

        try {

            $support = ContactSupport::find($id);

            return $this->sendResponse(['support'=> $support],'Data exited successfully');

        }catch (\Exception $e){

            return $this->sendError('An error occurred in the system');

        }

    }

    public function destroy($id)
    {
        try {
            $Support = ContactSupport::find($id);
            if ($Support){

                $Support->delete();

                return $this->sendResponse([],'Deleted successfully');
            }else{
                return $this->sendError('ID is not exist');
            }

        }catch (\Exception $e){
            return $this->sendError('An error occurred in the system');
        }
    }
}
