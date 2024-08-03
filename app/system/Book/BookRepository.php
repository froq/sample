<?php
namespace app\repository;

use froq\app\Repository;
use froq\database\Query;

/**
 * Repository class for books.
 * @data
 */
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
        $query = $this->initQuery();
        $query->select('*')
              ->from('books')
              ->equal('id', $id);

        return $this->db->get($query);

        // Or direct select without query.
        // return $this->db->select('books', '*', where: ['id' => $id]);
    }

    /**
     * Find all books.
     */
    function findAll(Query $query, int $page = 1): ?array {
        $query->select('*')
              ->from('books')
              ->order('id', 'DESC')
              ->paginate($page);

        return $this->db->getAll($query);

        // Or direct select without query.
        // return $this->db->selectAll('books', '*', order: ['id', 'DESC']);
    }

    /**
     * Add a book.
     */
    function add(array $data): ?array {
        try {
            $data['created_at'] = date('Y-m-d H:i:s');

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
        if ($book = $this->find($id)) {
            $data['updated_at'] = date('Y-m-d H:i:s');

            $data = filter($data, fn($v) => isset($v));
            $book = $data = [...$book, ...$data];

            $ok = $this->db->update('books', $data, where: ['id' => $id]);
            return $ok ? $book : null;
        }

        return null;
    }

    /**
     * Delete a book.
     */
    function delete(int $id): ?array {
        if ($book = $this->find($id)) {
            $ok = $this->db->delete('books', where: ['id' => $id]);
            return $ok ? $book : null;
        }

        return null;
    }
}
