<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use App\Traits\Message;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    use Message;

    public function index()
    {
        $privacy = Privacy::latest()->first();

        return $this->sendResponse(['privacy' => $privacy],'Data exited successfully');
    }
}
