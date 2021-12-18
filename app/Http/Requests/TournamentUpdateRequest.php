<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TournamentUpdateRequest extends FormRequest
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
            'started_at' => ['required'],
            'ended_at' => ['required'],
            'title' => ['required', 'string', 'max:255'],
            'place' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer', 'gt:0'],
            'rank_id' => ['required', 'integer'],
            'players' => ['nullable'],
            'is_groups' => ['nullable'],
            'group_amount' => ['nullable'],
            'status' => ['nullable'],
            'players_collapsed' => ['nullable'],
            'parameters_collapsed' => ['nullable'],
            'settings_collapsed' => ['nullable'],
            'groups_collapsed' => ['nullable'],
            'gate_collapsed' => ['nullable'],
        ];
    }
}
