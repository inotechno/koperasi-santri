<?php

namespace App\Http\Resources;

use App\Models\Message;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $count = Message::where([
            ['from', $this->from],
            ['to', $this->to],
        ])->whereNull('read_at')->count();

        return [
            'id' => $this->users->id,
            'name' => $this->users->name,
            'image' => $this->users->image,
            'from' => $this->from,
            'to' => $this->to,
            'time' => Carbon::parse($this->created_at)->format('G:ia'),
            'message' => $this->message,
            'created_at' => $this->created_at,
            'count' => $count
        ];
    }
}
