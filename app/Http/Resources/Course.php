<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\School as SchoolResource;
use App\Http\Resources\Student as StudentResource;

use App\Models\School;

class Course extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'year' => $this->year,
            'level' => $this->level,
            'series' => $this->series,
            'shift' => $this->shift,
            'school' => School::findOrFail($this->school_id),
            'qtd_alunos' => count(StudentResource::collection($this->students)),
        ];
    }
}
