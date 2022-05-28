<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Designer;
use App\Models\User;
use App\Notifications\Web\VerifyDCNotification;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class DesignController extends Controller
{

    use Message;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $design = User::with(['designer:send,user_id','complement:user_id,device'])->whereAuthId(2)->whereJsonContains('role_name','design')
            ->where(function ($q) use($request){
                $q->when($request->search,function ($q) use($request){
                    return $q->OrWhere('email','like','%'.$request->search.'%')
                        ->orWhere('phone','like','%'.$request->search.'%');
                });

            })->latest()->paginate(15);

        return $this->sendResponse(['design' => $design],'Data exited successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $desgin = User::with(['designer.media','designService','designDegree','designDesScience','designDetail'])->find($id);

            return $this->sendResponse(['desgin'=> $desgin],'Data exited successfully');

        }catch (\Exception $e){

            return $this->sendError('An error occurred in the system');

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function status(Request $request)
    {
        try{
            $user = User::find($request->id);

            if($user){

                // Validator request
                $v = Validator::make($request->all(), ['status' => 'required|boolean']);

                if($v->fails()) {
                    return $this->sendError('There is an error in the data',$v->errors());
                }

                $user->update(['status' => $request->status]);

            }else{
                return $this->sendError('ID is not exist');
            }

        }catch(\Exception $e){
            return $this->sendError('An error occurred in the system');
        }
    }

    public function trust(Request $request)
    {
        try{
            $user = User::find($request->id);

            if($user){

                // Validator request
                $v = Validator::make($request->all(), ['trust' => 'required|boolean']);

                if($v->fails()) {
                    return $this->sendError('There is an error in the data',$v->errors());
                }

                $user->designer()->update(['trust' => $request->trust]);

                $user->notify(new VerifyDCNotification());


            }else{
                return $this->sendError('ID is not exist');
            }

        }catch(\Exception $e){
            return $this->sendError('An error occurred in the system');
        }
    }

}
