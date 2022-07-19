<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProjectsManagement\DesignersFinesRequest;
use App\Models\Fines;
use Illuminate\Http\Request;
use App\Traits\Message;

class SizesServiceController extends Controller
{

    use Message;


    public function index(Request $request)
    {

        return $this->sendResponse(['designer_fines' => $designer_fines],'Data exited successfully');
    }



    public function show($id)
    {
        $designerFines = Fines::findOrFail($id);
        return $this->sendResponse(['fine' => $designerFines],'Data exited successfully');
    }

}
