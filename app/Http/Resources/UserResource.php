<?php

namespace App\Http\Resources;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $to = [
            ['to', auth()->user()->id],
            ['from', $this->id]
        ];

        $message = Message::where([
            ['from', auth()->user()->id],
            ['to', $this->id]
        ])->orWhere($to)->latest()->first();

        $count = Message::where($to)->whereNull('read_at')->count();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'from' => $message->from ?? '',
            'to' => $message->to ?? '',
            'message' => $message->message ?? '',
            'count' => $count
        ];
    }
}
