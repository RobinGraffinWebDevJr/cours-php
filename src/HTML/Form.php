<?php
namespace App\HTML;

class Form {

    private $data;

    private $errors;

    public function __construct($data, array $errors)
    {
        $this->data = $data;
        $this->errors = $errors;
    }

    public function input (string $key, string $label): string 
    {
        return <<<HTML
            <div class="from-group">
            <label for="field{$key}">{$label}</label>
            <input type="text" id="field{$key}"class="form-control" name="{$key}" value="" required> 
        </div>
HTML;
    }

    public function textarea (string $name, string $label): string 
    {
        return '';
    }

    /**
     * <div class="from-group">
        <label for="name">Titre</label>
        <input type="text" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?> name="name" value="<?= e($post->getName()) ?>" required> 
        <?php if (isset($errors['name'])): ?>
        <div class="invalid-feedback">
             <?= implode('<br>', $errors['name']) ?>
        </div>
        <?php endif ?>
    </div>
     */


}