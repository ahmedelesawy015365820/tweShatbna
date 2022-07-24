<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyDetail;
use App\Models\CompanyService;
use App\Models\User;
use App\Notifications\Web\TrustCompanyNotification;
use App\Notifications\Web\TrustDesignNotification;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    use Message;

    public function companyService()
    {
        $services = CompanyService::whereStatus(true)->get();

        return $this->sendResponse(['services' => $services], 'Data exited successfully');
    }

    public function companyOne(Request  $request)
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
                'vision' => 'required',
                'message' => 'required',
                'strategy' => 'required',
                'files.*' => 'file|mimes:jpeg,jpg,png,webp|max:2048|dimensions:min_width=100px,min_height=100,max_width=1000,max_height=1000',
                'nameService' => 'required|array'
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

            $user->CompanyDetail()->create([
                'vision' => $request->vision,
                'message' => $request->message,
                'strategy' => $request->strategy
            ]);

            $nameService = explode(',',$request->nameService[0]);

            $user->CompanyService()->attach($nameService);

            $i = 0;

            foreach ($request->file('files') as $file) {

                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $image = time() . $i . '.' . $file->getClientOriginalName();

                // picture move
                $file->storeAs($user->id, $image, 'trustCompany');

                Company::whereUserId($user->id)->first()->media()->create([
                    'file_name' => $image,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => $i
                ]);

                $i++;
            }

            Company::whereUserId($user->id)->first()->update(['send' => 1]);

            $userCompany = User::find($user->id);

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

    public function getCompanyDetService()
    {
        $services = CompanyService::whereStatus(true)->get();

        return $this->sendResponse(['services' => $services], 'Data exited successfully');
    }

    public function getCompanyDetails() {
        $user = auth()->guard('api')->user();

        $detail = CompanyDetail::whereUserId($user->id)->first();

        $service = $user->CompanyService;

        return $this->sendResponse(['detail' => $detail,'service' =>$service], 'Data exited successfully');
    }

    public function storeCompanyDetail(Request $request)
    {
        DB::beginTransaction();
        try {


            // Validator request
            $v = Validator::make($request->all(), [
                'vision' => 'required',
                'message' => 'required',
                'strategy' => 'required',
                'nameService' => 'required|array'
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $user = auth()->guard('api')->user();

            $user->CompanyService()->sync($request->nameService);

            $detail = CompanyDetail::whereUserId($user->id)->update([
                'vision' => $request->vision,
                'message' => $request->message,
                'strategy' => $request->strategy
            ]);

            DB::commit();
            return $this->sendResponse([], 'Data exited successfully');

        } catch (\Exception $e) {

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }

    }

}
