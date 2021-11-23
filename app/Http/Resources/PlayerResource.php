<?php

namespace App\Http\Resources;

use App\DeviceGroup;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;
use Jenssegers\Date\Date;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'patronymic' => $this->patronymic,
            'surname' => $this->surname,
            'gender' => $this->gender,
            'img_url' => $this->img_url,
            'city' => $this->city,
            'region' => $this->region,
            'country' => $this->country,
            'birth' => $this->birth,
            'level' => $this->level,
            'start_playing_year' => $this->start_playing_year,
            'start_tournament_year' => $this->start_tournament_year,
            'start_tournament_month' => $this->start_tournament_month,
            'racket_firm' => $this->racket_firm,
            'racket_model' => $this->racket_model,
            'best_position_single' => $this->best_position_single,
            'best_position_single_date' => $this->best_position_single_date,
            'best_position_pair' => $this->best_position_pair,
            'best_position_pair_date' => $this->best_position_pair_date,
            'partner_id' => $this->partner_id,
            'birth_format' => Date::parse($this->birth)->format('j F Y г.'),
            'age' => $this->age()
        ];
    }
}
