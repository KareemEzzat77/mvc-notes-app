<?php

namespace Main\core;

class Validator
{
    protected $data;
    protected $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function required($field)
    {
        if (empty(trim($this->data[$field] ?? ''))) {
            $this->errors[$field][] = 'This field is required';
        }
        return $this;
    }

    public function min($field, $length)
    {
        if (strlen($this->data[$field] ?? '') < $length) {
            $this->errors[$field][] = "Must be at least $length characters";
        }
        return $this;
    }

    public function email($field)
    {
        if (!filter_var($this->data[$field] ?? '', FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field][] = 'Invalid email';
        }
        return $this;
    }

    public function fails()
    {
        return !empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }
}
