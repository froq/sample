<?php declare(strict_types=1);

namespace app\repository\data;

use froq\app\data\InputInterface;
use froq\common\interface\Arrayable;

/**
 * DTO for books.
 * @data
 */
class BookDto implements InputInterface, Arrayable {
    public ?int $id;
    public ?string $name;
    public ?string $author;
    public ?string $created_at;
    public ?string $updated_at;

    /**
     * Simple validation check.
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
            'created_at' => $this->created_at ?? null,
            'updated_at' => $this->updated_at ?? null,
        ];
    }
}
