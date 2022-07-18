<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Sponser;
use App\Traits\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    use Message;

    public function get()
    {
        $sponser = Sponser::with('media:mediable_id,file_name')->get();
        $banner = Banner::with('media:mediable_id,file_name')->get()->first();

        return $this->sendResponse(['sponser' => $sponser,'banner' => $banner], 'Data exited successfully');
    }


}
