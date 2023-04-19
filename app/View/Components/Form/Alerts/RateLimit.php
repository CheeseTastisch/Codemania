<?php

namespace App\View\Components\Form\Alerts;

use App\Models\Components\Modeled\Model;
use Closure;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RateLimit extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $message,
        public string $from = 'message',
        public string|null $value = null,
        public string $error = '',
        public string $poll = '',
    )
    {
        if ($this->from !== 'message' && $this->value === null) {
            throw new Exception('RateLimit component requires a value when not using the message');
        }

        if ($this->from === 'message' && $this->error === '') {
            throw new Exception('RateLimit component requires an error when using message');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.alerts.rate-limit');
    }
}
