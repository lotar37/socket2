<?php

namespace App\Http\Resources\Homework;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeworkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'subject_id' => $this->subject_id,
            'class_id' => $this->class_id,
            'set_for_date' => $this->set_for_date,
            'date' => $this->created_at->diffForHumans(),



        ];
    }
}
