<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\Message;
use Illuminate\Http\Request;

class DesignProfileController extends Controller
{
    use Message;

    public function designShowGet()
    {

        $profile = User::select('id','auth_id','name')
            ->with(['complement' => function ($q) {
                return $q->select('id','country_id','state_id','user_id')
                    ->with('country','state');
            },'designService' => function ($p) {
                return $p->limit(4);
            }])
            ->whereAuthId(2)->whereJsonContains('role_name','design')
            ->whereRelation('designer','trust',1)
            ->latest()
            ->paginate(15);

        return $this->sendResponse(['profiles' => $profile],'Data exited successfully');

    }

    public function designProfile($id)
    {

        $profile = User::select('id','auth_id')
            ->with(['complement' => function ($q) {
                return  $q->select('id','country_id','state_id','user_id')
                    ->with('country');
            },
                'designService',
                'designDetail:vision,message,strategy,user_id'
            ])
            ->whereAuthId(2)
            ->whereJsonContains('role_name','design')
            ->where(function ($q) use($id){
                return $q->whereRelation('designer','trust',1)
                    ->whereRelation('designer','user_id',$id);
            })
            ->find($id);

        return $this->sendResponse(['profile' => $profile],'Data exited successfully');

    }

}
