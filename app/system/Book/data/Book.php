<?php
namespace app\repository\data;

use froq\database\entry\Entry;
use app\library\Date;

/**
 * Entry for books.
 * @data
 */
class Book extends Entry {
    /**
     * Accept a book DTO only.
     * @override
     */
    function __construct(BookDto $book = null) {
        parent::__construct($book?->toArray());
    }

    /**
     * Find a book & fill its data using the found row.
     *
     * Note: Since no RETURNING support for version < 3.35 in SQLite,
     * calling this method (SELECT) in others back to fill all data fields.
     */
    function find(int $id): self {
        $this->query('books')
             ->select('*')
             ->equal('id', $id);

        $this->reset();
        $this->commit();

        return $this;
    }

    /**
     * Save a book (insert / update).
     */
    function save(int $id = null): self {
        $data = $this->toData(['name', 'author']);
        $date = new Date();

        if ($id === null) {
            $this->query('books')->insert([
                ...$data, ...['created_at' => $date]
            ]);
        } else {
            $this->query('books')->update([
                ...$data, ...['updated_at' => $date]
            ])
            ->equal('id', $id);
        }

        $this->commit();

        // Use given or insert id.
        $this->find($id ?? $this->result()->id() ?? 0);

        return $this;
    }

    /**
     * Remove a book.
     */
    function remove(int $id): self {
        if ($this->find($id)) {
            $this->query('books')
                 ->delete()
                 ->equal('id', $id);

            $this->commit();
        }

        return $this;
    }
}
