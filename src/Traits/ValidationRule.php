<?php

namespace  Edguy\AdminPanel\Traits;

use Illuminate\Validation\Rule;

trait ValidationRule
{
    public function stringRule($required = true, $max = 255)
    {
        return ['string', Rule::requiredIf($required), 'min:1', "max:$max", 'nullable'];
    }

    public function idRule($table, $required = true): array
    {
        return ['integer', Rule::requiredIf($required), Rule::exists($table, 'id'), 'nullable'];
    }

    public function isRequired($parameter): bool
    {
        $parameter ? $response = false : $response = true;

        return $response;
    }

    public function integerRule($required = false, $max = 100000000000)
    {
        return ['integer', 'nullable', Rule::requiredIf($required), "max:$max"];
    }
}