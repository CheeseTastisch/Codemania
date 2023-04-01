<?php

namespace App\Concerns\Livewire;

trait ValidatesMultipleInputs
{

    protected function validateMultiple(array $fields, array $rules = null, array $messages = [], array $attributes = []): array
    {
        [$rules, $messages, $attributes] = $this->providedOrGlobalRulesMessagesAndAttributes($rules, $messages, $attributes);

        $rulesForFields = collect($rules)->filter(fn ($rule, $field) => in_array($field, $fields));
        return $this->validate($rulesForFields->toArray(), $messages, $attributes);
    }

}
