<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\MessageResource;
use App\Http\Resources\UserResource;

class ChatController extends Controller
{
    // public function index()
    // {
    //     // $messages = Message::with(['toUser', 'fromUser'])->groupBy('from')->where('to', Auth::id())->get();
    //     $users = User::whereHas('to_messages', function ($query) {
    //         return $query->where('to', Auth::id());
    //     })->get();
    //     dd($users);
    //     return view('chat', [
    //         'title' => 'Chat',
    //         'messages' => $messages
    //     ]);
    // }

    public function index($query = 'all')
    {
        $data = User::all();

        $field = ['id', 'name', 'email', 'image'];
        $id = auth()->user()->id;

        if ($query === 'all') {

            $users = Message::with(['fromUser', 'toUser'])
                ->where('messages.to', $id)
                ->orWhere('messages.from', $id)
                ->latest();

            $keys = [];

            foreach ($users->get() as $key => $user) {
                if ($user->fromUser->id == $id) {
                    $keys[$key] = $user->toUser->id;
                } else {
                    $keys[$key] = $user->fromUser->id;
                }
            }

            $keys = array_unique($keys);

            $ids = implode(',', $keys);

            $users = User::whereIn('id', $keys);

            if (!empty($key)) {
                $users = $users->orderByRaw(DB::raw("FIELD(id, $ids)"));
            }
        } else {

            $users = User::where('name', 'like', "%{$query}%")->where('id', '!=', $id);
        }

        $users = UserResource::collection($users->get($field));

        // dd($users);
        return view('chat', [
            'user' => $data,

            'title' => 'Chat',
            'users' => $users
        ]);
    }

    // public function getMessages(Request $request)
    // {
    //     // dd($request);
    //     try {
    //         $messages = Message::where('to', Auth::id())->where('from', intval($request->from))->get();
    //         // dd($messages);
    //         return response()->json($messages);
    //     } catch (\Throwable $th) {
    //         return response()->json($th);
    //     }
    // }

    public function getMessages($id)
    {
        $to = [
            ['from', $id],
            ['to', auth()->user()->id]
        ];

        $messages = Message::with('users')->where($to);

        $first = $messages;

        if ($first->exists()) {
            Message::where($to)->update(['read_at' => now()]);
        }

        $messages = $messages->orWhere([
            ['from', auth()->user()->id],
            ['to', $id]
        ])->get();

        $messages = MessageResource::collection($messages);
        // dd($messages);
        return response()->json($messages);
    }

    protected function sendMessage(Request $request)
    {
        $message = Message::create([
            'from' => $request->to,
            'to' => Auth::id(),
            'message' => $request->message
        ]);

        $message = new MessageResource($message);
        return response()->json($message);
    }
}
