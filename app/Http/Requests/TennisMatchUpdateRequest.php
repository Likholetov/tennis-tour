<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TennisMatchUpdateRequest extends FormRequest
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
            'expected_court' => ['string', 'max:20'],
            'court' => ['string', 'max:20'],
            'title' => ['string', 'max:50'],
            'tournament_id' => ['required', 'integer', 'gt:0'],
            'score' => ['string', 'max:50'],
            'warm_up' => ['string', 'max:10'],
            'start' => ['string', 'max:10'],
            'end' => ['string', 'max:10'],
        ];
    }
}
