<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PersianDatePicker extends Component
{
    /** @var string */
    public $format;

    /** @var string */
    public $placeholder;

    /** @var array */
    public $options;

    public function __construct(
        string $name,
        string $id = null,
        ?string $value = '',
        string $format = 'DD/MM/YYYY',
        string $placeholder = null,
        array $options = []
    ) {
        parent::__construct($name, $id, 'text', $value);

        $this->format = $format;
        $this->placeholder = $placeholder ?? $format;
        $this->options = $options;
    }

    public function options(): array
    {
        return array_merge([
            'format' => $this->format,
        ], $this->options);
    }

    public function jsonOptions(): string
    {
        if (empty($this->options())) {
            return '';
        }

        return ', ...'.json_encode((object) $this->options());
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.persian-date-picker');
    }
}
