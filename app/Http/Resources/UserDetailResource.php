<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class UserDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        setlocale(LC_ALL, 'IND');
        $time = Carbon::parse($this->created_at)->formatLocalized('%d %B %Y');

        return [
            'id' => $this->id,
            'title' => $this->title,
            'news_content' => $this->news_content,
            'crated_at' => $time,
            'author' => $this->author, 
            'writer' => $this->whenLoaded('writer'),
            'comments' => $this->whenLoaded('comments', function(){
                return collect($this->comments)->each(function($comment){
                    $comment->commentator;
                    return $comment;
                });
            }),
            'comment_total' => $this->whenLoaded('comments', function(){
                return $this->comments->count();
            }),
        ];
    }
}
