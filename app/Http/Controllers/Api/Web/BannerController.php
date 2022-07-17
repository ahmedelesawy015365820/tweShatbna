<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Traits\Message;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use Message;

    public function banner()
    {
        $banner = Banner::with('media:mediable_id,file_name')->get()->first();
        return $this->sendResponse(['banner' => $banner], 'Data exited successfully');
    }
}
