<?php

class Admin {
    
    /**
     * Получение всех книг с бд
     * 
     * @return type массив всех книг
     */
    public function getAllBooks(){
        $db = db::getConnection();
        
        $sql = "SELECT * FROM books ORDER by id Desc";
        
        $result = $db->prepare($sql);
        $result->execute([]);
        
        return $result->fetchAll();
    }
    
    public function getBook($id){
        $db = db::getConnection();
        
        $sql = "SELECT id,title,description,price,"
                . "author_book AS author,genre_book AS genre "
                . "FROM `books` "
                . "LEFT JOIN `booksbyauthors` "
                . "ON `booksbyauthors`.`id_books` = id "
                . "LEFT JOIN `booksbygenres` "
                . "ON `booksbygenres`.`id_books` = id "
                . "WHERE `id`= :id";
        
        $result = $db->prepare($sql);
        $result->execute([$id]);
        while ($row = $result->fetch()) {
            $rows['id'] = $row['id'];
            $rows['title'] = $row['title'];
            $rows['description'] = $row['description'];
            $rows['price'] = $row['price'];
            $rowa[] = $row['author'];
            $rowg[] = $row['genre'];
        }
        foreach (array_unique($rowa) as $value) {
            $rows['authors'][]=$value;
        }
        foreach (array_unique($rowg) as $value) {
            $rows['genres'][]=$value;
        }
        
        return $rows;
    }

        public function addBooks($title,$desc,$price){
        
        $db = db::getConnection();
        
        $book_url = Translit::translitURL($title);
        $sql = "INSERT INTO `books`(`title`, `description`, `price`, `book_url`) "
                . "VALUES "
                . "(:title,:desc,:price,:book_url)";
        
        $result = $db->prepare($sql);
        $result->execute([$title,$desc,$price,$book_url]);
        return $result;
    }
    
    public function getNewIdBook(){
        $db = db::getConnection();
        
        $sql = "SELECT MAX(id) AS id FROM `books`";
        
        $result = $db->prepare($sql);
        $result->execute([]);
        
        return $result->fetch()['id'];
         
    }

        public function addBooksByAuthors($id_books,$author_book){
        
        $db = db::getConnection();
        
        $sql = "INSERT INTO `booksbyauthors`(`id_books`, `author_book`) "
                . "VALUES (:id_books,:author_book)";
        
        $result = $db->prepare($sql);
        $result->execute([$id_books,$author_book]);
    }
    
    public function addBooksByGernes($id_books,$genre_book){
        
        $db = db::getConnection();
        
        $sql = "INSERT INTO `booksbygenres`(`id_books`, `genre_book`) "
                . "VALUES (:id_books,:genre_book)";
        
        $result = $db->prepare($sql);
        $result->execute([$id_books,$genre_book]);
    }
    
    public function addGenres($genre){
        
        $db = db::getConnection();
        $genre_url = Translit::translitURL($author);
        $sql = "INSERT INTO `genres`(`genre`,`genre_url`) VALUES (:genre,:genre_url)";
        
                $result = $db->prepare($sql);
        $result->execute([$genre,$genre_url]);
    }
    
    /**
     * 
     * @param type $author
     */
    public function addAuthors($author){
        
        $db = db::getConnection();
        
        $author_url = Translit::translitURL($author);
        $sql = "INSERT INTO `authors`(`author`,`author_url`) VALUES (:author , :author_url)";
        
                $result = $db->prepare($sql);
        $result->execute([$author,$author_url]);
    }
    
    public function getAuthorOrGenreList($type){
        $db = db::getConnection();
        $table = $type.'s';
        $sql = "SELECT * FROM $table";
        
        $result = $db->prepare($sql);
        $result->execute([]);
        
        while ($row = $result->fetch()){
            $List[] = $row[$type];
        }
        
        return $List;
    }
    
    public function deleteAuthorOrGenreList($table,$id){
        $db = db::getConnection();
        
        switch ($table){
            case 'authors': $sql = "DELETE FROM authors WHERE author = :id"; break;
            case 'genres': $sql = "DELETE FROM genres WHERE genre = :id"; break;
            case 'books' : $sql = "DELETE FROM books WHERE id= :id"; break;
        }
        
        $result = $db->prepare($sql);
        $result->execute([$id]);
        
    }
    
    public function editAuthorOrGenreList($table,$old,$id){
        $db = db::getConnection();
        
        switch ($table){
            case 'author': $sql = "UPDATE `authors` SET `author`=:id ,`author_url`=:url WHERE `author`=:old"; break;
            case 'genre': $sql = "UPDATE `genres` SET `genre`=:id ,`genre_url`=:url WHERE `genre`=:old"; break;
        }
        $url = Translit::translitURL($id);
        $result = $db->prepare($sql);
        $result->execute([$id,$url,$old]);
        
    }
    
    public function editBook($id,$title,$desc,$price){
        $db = db::getConnection();
        
        $book_url = Translit::translitURL($title);
        $sql = "UPDATE `books` SET `title`=:title "
                . ",`description`=:desc ,`price`=:price, `book_url`= :book_url"
                . " WHERE `id`= :id";
        $result = $db->prepare($sql);
        $result->execute([$title,$desc,$price,$book_url,$id]);
    }
    
    public function deleteBookAuthorsOrBookGenres($table,$id){
        $db = db::getConnection();
        
        switch ($table){
            case 'authors': $sql = "DELETE FROM booksbyauthors WHERE id_books = :id"; break;
            case 'genres': $sql = "DELETE FROM booksbygenres WHERE id_books = :id"; break;
        }
        
        $result = $db->prepare($sql);
        $result->execute([$id]);
        
    }

}
