<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\Message;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{

    use Message;

    public function companyShowGet()
    {

        $profile = User::select('id','auth_id')
        ->with(['complement' => function ($q) {
            return $q->select('id','nameCompany','country_id','state_id','user_id')
                ->with('country','state');
        },'CompanyService' => function ($p) {
            return $p->limit(4);
        }])
        ->whereAuthId(2)->whereJsonContains('role_name','company')
        ->whereRelation('company','trust',1)
        ->latest()
        ->paginate(15);

        return $this->sendResponse(['profiles' => $profile],'Data exited successfully');

    }

    public function companyProfile($id)
    {

        $profile = User::select('id','auth_id')
            ->with(['complement' => function ($q) {
                return $q->select('id','nameCompany','country_id','user_id')
                    ->with('country');
            },
                'CompanyService',
                'CompanyDetail:vision,message,strategy,user_id'
            ])
            ->whereAuthId(2)->whereJsonContains('role_name','company')
            ->where(function ($q) use($id){
                return $q->whereRelation('company','trust',1)
                    ->whereRelation('company','user_id',$id);
            })
            ->find($id);

        return $this->sendResponse(['profile' => $profile],'Data exited successfully');

    }

}
