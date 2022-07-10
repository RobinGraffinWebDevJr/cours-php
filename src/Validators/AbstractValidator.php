<?php
namespace App\Validators;

use App\Validator;

abstract class AbstractValidator {

    abstract protected $data;
    abstract protected $validator;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->validator = new Validator($data);
    }

    public function validate (): bool 
    {
        return $this->validator->validate();
    }

    public function errors (): array
    {
        return $this->validator->errors();
    }

}