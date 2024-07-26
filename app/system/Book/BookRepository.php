<?php
namespace app\repository;

use froq\app\Repository;

class BookRepository extends Repository {
    /**
     * Create a table (if not exists).
     */
    function init(): void {
        $this->db->execute(<<<SQL
            CREATE TABLE IF NOT EXISTS "books" (
                "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                "name" varchar(255) NOT NULL,
                "author" varchar(100) NOT NULL,
                "created_at" DATETIME NOT NULL,
                "updated_at" DATETIME
            )
        SQL);
    }

    /**
     * Find a book.
     */
    function find(int $id): ?array {
        return $this->db->select('books', '*', where: ['id' => $id]);
    }

    /**
     * Find all books.
     */
    function findAll(): ?array {
        return $this->db->selectAll('books', '*', order: ['id', 'DESC']);
    }

    /**
     * Add a book.
     */
    function add(array $data): ?array {
        $data['created_at'] = date('Y-m-d H:i:s');

        try {
            // No RETURNING support for version < 3.35 in SQLite.
            $id = $this->db->insert('books', $data);
            return $id ? $this->find($id) : null;
        } catch (\Throwable) {
            return null;
        }
    }

    /**
     * Edit a book.
     */
    function edit(int $id, array $data): ?array {
        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($book = $this->find($id)) {
            $data = filter($data, fn($v) => isset($v));
            $book = $data = [...$book, ...$data];

            $ok = $this->db->update('books', $data, where: ['id' => $id]);
            return $ok ? $book : null;
        }
    }

    /**
     * Delete a book.
     */
    function delete(int $id): ?array {
        if ($book = $this->find($id)) {
            $ok = $this->db->delete('books', where: ['id' => $id]);
            if ($ok) {
                return $book;
            }
        }
        return null;
    }
}
