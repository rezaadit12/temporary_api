<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UserResource extends JsonResource
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
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'news_content' => $this->news_content,
            'crated_at' => $time
        ];
    }
}
