<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\Sponser;
use App\Traits\Message;
use Illuminate\Http\Request;

class SponserController extends Controller
{

    use Message;

    public function getSponser($id)
    {
        $sponser = Sponser::with('details.media','media:mediable_id,file_name')->find($id);

        return $this->sendResponse(['sponser' => $sponser],'Deleted successfully');
    }
}
