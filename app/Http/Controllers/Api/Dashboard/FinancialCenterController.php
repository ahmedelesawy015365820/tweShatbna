<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Restriction;
use App\Models\SubAccount;
use App\Traits\Message;
use Illuminate\Http\Request;

class FinancialCenterController extends Controller
{
    use Message;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $assets = SubAccount::where([['main_account_id',1],['sub_account_id',null]])->with('restriction')
            ->whereHas('restriction',function ($q) use ($request){
            $q->whereHas('dailyRestriction',function ($q) use ($request){
                $q->whereDate('date', "<=", $request->to_date);
            });
        })->get();


        $liabilities = SubAccount::where('main_account_id',2)->with('restriction')->whereHas('restriction',function ($q) use ($request){
            $q->whereHas('dailyRestriction',function ($q) use ($request){
                $q->whereDate('date', ">=", $request->from_date)->whereDate('date', "<=", $request->to_date);
            });
        })->get();

        return $this->sendResponse(['assets' => $assets], 'Data exited successfully');
    }
}
