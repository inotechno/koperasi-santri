<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChatResource;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends BaseController
{
    public function index(Request $request)
    {
        $message = Message::with('toUser', 'fromUser')->where('to', $request->user_id)->orWhere('from', $request->user_id)->get();
        // dd($message->toSql());
        return $this->sendResponse(ChatResource::collection($message), 'Chat retrieved successfully');
    }
}
