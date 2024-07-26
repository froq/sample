<?php
namespace app\repository\data;

use froq\app\data\InputInterface as Dto;
use froq\common\interface\Arrayable;

/**
 * DTO for books.
 */
class BookDto implements Dto, Arrayable {
    var ?int $id;
    var ?string $name;
    var ?string $author;
    var ?string $created_at;
    var ?string $updated_at;

    /**
     * Simple validation check.
     */
    function isValid(): bool {
        return !empty($this->name)
            && !empty($this->author);
    }

    /**
     * @inheritDoc
     */
    function toArray(): array {
        return [
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
            'author' => $this->author ?? null,
            'created_at' => $this->created_at ?? null,
            'updated_at' => $this->updated_at ?? null,
        ];
    }
}
