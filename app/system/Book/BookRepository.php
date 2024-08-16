<?php declare(strict_types=1);
namespace app\repository;

use froq\app\Repository;
use froq\database\Query;
use froq\pagination\Paginator;
use app\repository\data\{Book, BookDto};

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
    function findAll(Query $query, int $page = 1, ?Paginator &$pager = null): ?array {
        $query->select('*')
              ->from('books')
              ->order('id', 'DESC')
              ->paginate($page, paginator: $pager);

        return $this->db->getAll($query);

        // Or direct select without query & pagination.
        // return $this->db->selectAll('books', '*', order: ['id', 'DESC']);
    }

    /**
     * Add a book.
     */
    function add(BookDto $book): ?array {
        $book = (new Book($book))->save();

        return $book->okay() ? $book->toArray() : null;
    }

    /**
     * Edit a book.
     */
    function edit(int $id, BookDto $book): ?array {
        $book = (new Book($book))->save($id);

        return $book->okay() ? $book->toArray() : null;
    }

    /**
     * Delete a book.
     */
    function delete(int $id): ?array {
        $book = (new Book())->remove($id);

        return $book->okay() ? $book->toArray() : null;
    }
}
