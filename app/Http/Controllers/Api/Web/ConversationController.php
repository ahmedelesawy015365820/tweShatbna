<?php

namespace App\Http\Controllers\Api\Web;

use App\Events\MessageAddEvent;
use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConversationController extends Controller
{

    use Message;

    public function index(Request $request)
    {

        $user_id = auth('api')->user()->id;

        $conversations = Conversation::
            whereRelation('users', 'user_id',$user_id)
            ->with('users')
            ->when($request->search,function ($q) use($request,$user_id){
                return $q->whereRelation('users', 'name','like','%'.$request->search.'%')
                        ->whereRelation('users', 'user_id',$user_id);
            })
            ->get();

        return $this->sendResponse(['conversations' => $conversations,'user' => $user_id],'Data exited successfully');
    }

    public function show($id)
    {
        $conversation = \App\Models\Message::
        with('media')
        ->whereRelation('conversation','uuid',$id)
        ->get();

        return $this->sendResponse(['conversation' => $conversation ],'Data exited successfully');
    }

    public function addMessage(Request $request)
    {

        // Validator request
        $v = Validator::make($request->all(), [
            'body' => 'nullable|string',
            'uuid' => 'required',
            'attachment' => 'nullable',
            'attachment.*' => 'nullable'.($request->hasFile('attachment')?'|mimes:jpeg,jpg,png,gif,bmp,svg|max:202400':''),
        ]);

        if ($v->fails()) {
            return response()->json(['errors' =>  $v->errors()]);
        }

        $data['body'] = $request->body;
        $data['user_id'] = auth()->id();

        $conversation = Conversation::where('uuid',$request->uuid)->first();

        $message = $conversation->message()->create($data);


        if($request->hasFile('attachment')) {
            $i = 0;

            foreach ($request->file('attachment') as $file) {

                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $image = time() . $i . '.' . $file->getClientOriginalName();

                // picture move
                $file->storeAs('attachment', $image, 'general');

                $message->media()->create([
                    'file_name' => $image,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => $i
                ]);

                $i++;
            }

        }

        $conversation->update([
            'last_message_at' => now()
        ]);

        broadcast(new MessageAddEvent($message,$message->media))->toOthers();

    }

}
