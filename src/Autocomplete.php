<?php

namespace Mxms\Autocomplete;

use Laravel\Nova\Fields\Field;

class Autocomplete extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'autocomplete';

    public function items(array $items)
    {
        return $this->withMeta(['items' => $items]);
    }
}
