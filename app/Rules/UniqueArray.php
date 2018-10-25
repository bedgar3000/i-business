<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UniqueArray implements Rule
{
    /**
     * Array de valores a validar
     * 
     * @var array
     */
    var $_array = null;
    
    /**
     * Nombre de la seccion que se esta validando
     * 
     * @var string
     */
    var $_section = null;
    
    /**
     * Nombre de la columna que se esta validando
     * 
     * @var string
     */
    var $_field = null;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($section, $field)
    {
        $this->_array = [];
        $this->_section = $section;
        $this->_field = $field;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (in_array($value, $this->_array))
        {
            return false;
        }
        else 
        {
            array_push($this->_array, $value);
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El '.$this->_field.' :input se encuentra repetido ('.$this->_section.').';
    }
}
