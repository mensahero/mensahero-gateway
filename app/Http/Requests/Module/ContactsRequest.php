<?php

namespace App\Http\Requests\Module;

use App\Concerns\ContactSources;
use App\Concerns\MobileCountryCode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactsRequest extends FormRequest
{
    public function rules(): array
    {
        return $this->isMethod('POST') ? $this->createRules() : [];
    }

    public function createRules(): array
    {
        return [
            'name'         => ['required', 'string', 'max:255'],
            'mobile'       => ['required', 'string', 'max:255', 'unique:contacts,mobile'],
            'country_code' => ['required', Rule::enum(MobileCountryCode::class)],
            'source'       => ['required', Rule::enum(ContactSources::class)],
        ];
    }
}
