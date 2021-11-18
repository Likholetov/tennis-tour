<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:30'],
            'patronymic' => ['required', 'string', 'max:30'],
            'surname' => ['required', 'string', 'max:100'],
            'gender' => ['required', 'in:не указан,мужской,женский'],
            'city' => ['string', 'max:100', 'nullable'],
            'region' => ['string', 'max:100', 'nullable'],
            'img_url' => ['string', 'max:100', 'nullable'],
            'birth' => ['date', 'nullable'],
            'level' => ['integer', 'nullable'],
            'start_playing_year' => ['integer', 'nullable'],
            'start_tournament_year' => ['integer', 'nullable'],
            'start_tournament_month' => ['string', 'max:15', 'nullable'],
            'racket_firm' => ['string', 'max:50', 'nullable'],
            'racket_model' => ['string', 'max:50', 'nullable'],
            'best_position_single' => ['integer', 'nullable'],
            'best_position_single_date' => ['date', 'nullable'],
            'best_position_pair' => ['integer', 'nullable'],
            'best_position_pair_date' => ['date', 'nullable'],
            'partner_id' => ['unsignedBigInteger', 'nullable'],
        ];
    }
}
