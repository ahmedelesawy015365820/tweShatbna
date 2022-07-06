<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Complement;
use App\Models\User;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    use Message;

    public function clientOne(Request  $request)
    {

        DB::beginTransaction();
        try {

            // Validator request
            $v = Validator::make($request->all(), [
                'name' => 'required',
                'address' => 'required',
                'iban' => 'required',
                'swift' => 'present',
                'files' => 'required',
                'files.*' => 'file|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=100px,min_height=100,max_width=1000,max_height=1000',
                'phone' => 'nullable|unique:users,phone',
                'country' => 'nullable',
                'state' => 'nullable',
                'code' => 'nullable',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $user = auth()->guard('api')->user();

            $user->banks()->create([
                'name' => $request->name,
                'address' => $request->address,
                'iban' => $request->iban,
                'swift' => $request->swift
            ]);

            $i = 0;

            foreach ($request->file('files') as $file) {

                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $image = time() . $i . '.' . $file->getClientOriginalName();

                // picture move
                $file->storeAs($user->id, $image, 'trustClient');

                Client::whereUserId($user->id)->first()->media()->create([
                    'file_name' => $image,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => $i
                ]);

                $i++;
            }

            if($request->code != ''){

                User::find($user->id)->update([
                    'phone' => $request->phone,
                    'code' => $request->code
                ]);

                Complement::whereUserId($user->id)->first()->update([
                    'country_id ' => $request->country,
                    'state_id ' => $request->state
                ]);

            }

            Client::whereUserId($user->id)->first()->update(['send' => 1]);

//            $userCompany = User::find($user->id);

//            User::whereAuthId(1)->each(function ($admin) use($userCompany){
//                $admin->notify(new TrustCompanyNotification($userCompany));
//            });

            DB::commit();
            return $this->sendResponse([], 'Data exited successfully');

        } catch (\Exception $e) {

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }
    }

}
