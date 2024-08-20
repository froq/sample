<?php declare(strict_types=1);

namespace app\repository\data;

use froq\common\interface\Arrayable;
use froq\app\data\{InputInterface, InputValidator};

/**
 * DTO for books.
 * @data
 */
class BookDto implements Arrayable, InputInterface {
    public ?int $id;
    public ?string $name;
    public ?string $author;

    /**
     * Validation rules.
     */
    public function validations(): array {
        return [
            'id' => ['type' => 'int', 'nullable', 'drop' => 'null'],
            'name' => ['type' => 'string', 'required', 'apply' => 'strip'],
            'author' => ['type' => 'string', 'required', 'apply' => 'strip'],
        ];
    }

    /**
     * Validation checker.
     */
    public function validate(array &$errors = null): bool {
        $validator = new InputValidator($this);
        $data = $validator->collect();

        return $validator->validate($data, $errors);
    }

    /**
     * Or simple validation check.
     */
    public function isValid(): bool {
        return !empty($this->name)
            && !empty($this->author);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array {
        return [
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
            'author' => $this->author ?? null,
        ];
    }
}
