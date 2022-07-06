<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class NewsLetterController extends Controller
{

    use Message;

    public function index(Request $request)
    {
        $newLetters = NewsLetter::select('id','email')->when($request->search,function ($q) use($request){
            return $q->OrWhere('email','like','%'.$request->search.'%');
        })->latest()->paginate(15);

        return $this->sendResponse(['newLetters' => $newLetters],'Data exited successfully');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{

            // Validator request
            $v = Validator::make($request->all(), [
                'email' => 'required|string|email|unique:news_letters,email',
            ]);

            if ($v->fails()) {
                return $this->sendError('There is an error in the data', $v->errors());
            }

            $data = $request->only(['email']);

            NewsLetter::create($data);

            DB::commit();
            return $this->sendResponse([],'Data exited successfully');

        }catch (\Exception $e){

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }
    }

    public function edit($id)
    {
        try {

            $newsLetter = NewsLetter::find($id);

            if($newsLetter){
                return $this->sendResponse([ 'newsLetter'=> $newsLetter],'Data exited successfully');
            }else{
                return $this->sendError('ID is not exist');
            }

        }catch (\Exception $e){

            return $this->sendError('An error occurred in the system');

        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{

            $newsLetter = NewsLetter::find($id);

            if($newsLetter){

                // Validator request
                $v = Validator::make($request->all(), [
                    'email' => 'required|email|unique:news_letters,email,'.$id,
                ]);

                if ($v->fails()) {
                    return $this->sendError('There is an error in the data', $v->errors());
                }

                $data = $request->only(['email']);

                $newsLetter->update($data);

                DB::commit();

                return $this->sendResponse([],'Data exited successfully');


            }else{
                return $this->sendError('ID is not exist');
            }

        }catch (\Exception $e){

            DB::rollBack();
            return $this->sendError('An error occurred in the system');
        }
    }

    public function destroy($id)
    {
        try {
            $newLetter = NewsLetter::find($id);
            if ($newLetter){

                $newLetter->delete();

                return $this->sendResponse([],'Deleted successfully');
            }else{
                return $this->sendError('ID is not exist');
            }

        }catch (\Exception $e){
            return $this->sendError('An error occurred in the system');
        }
    }
}
