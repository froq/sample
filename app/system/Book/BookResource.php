<?php
namespace app\repository;

use froq\app\data\Resource;

/**
 * Resource class for books.
 * @data
 */
class BookResource extends Resource {
    /**
     * To filter these fields only.
     */
    protected array $filters = [
        'id', 'name', 'author',
        'created_at', 'updated_at'
    ];

    /**
     * To transform these fields with corresponding fields.
     */
    protected array $transforms = [
        // 'id' => 'ID',
        // 'name' => 'title',
        // 'author' => 'writer',
        'created_at' => 'createdAt',
        'updated_at' => 'updatedAt'
    ];
}
