<?php


class Search {
    
    public function getBooksByAuthor($author_url){
        $db = db::getConnection();
        
        $sql = "SELECT `id`,`title`,`description`,`price`,`book_url` "
                . "FROM `authors` "
                . "LEFT JOIN `booksbyauthors` "
                . "ON `booksbyauthors`.`author_book` = `authors`.`author` "
                . "LEFT JOIN `books` "
                . "ON `books`.`id` = `booksbyauthors`.`id_books` "
                . "WHERE `author_url`= :author_url";
        
        $result = $db->prepare($sql);
        $result->execute([$author_url]);
        
        return $result->fetchAll();
    }
    
    public function getBooksByGenre($genre_url){
        $db = db::getConnection();
        
        $sql = "SELECT `id`,`title`,`description`,`price`,`book_url` "
                . "FROM `genres` "
                . "LEFT JOIN `booksbygenres` "
                . "ON `booksbygenres`.`genre_book` = `genres`.`genre` "
                . "LEFT JOIN `books` "
                . "ON `books`.`id` = `booksbygenres`.`id_books` "
                . "WHERE `genre_url`= :genre_url";
        
        $result = $db->prepare($sql);
        $result->execute([$genre_url]);
        
        return $result->fetchAll();
    }
    
    public function getBook($book_url){
        $db = db::getConnection();
        
        $sql = "SELECT id,title,description,price,"
                . "author_book AS author,genre_book AS genre "
                . "FROM `books` "
                . "LEFT JOIN `booksbyauthors` "
                . "ON `booksbyauthors`.`id_books` = id "
                . "LEFT JOIN `booksbygenres` "
                . "ON `booksbygenres`.`id_books` = id "
                . "WHERE `book_url`= :book_url";
        
        $result = $db->prepare($sql);
        $result->execute([$book_url]);
        $count = $result->rowCount();
        $rows=[];
        while ($row = $result->fetch()) {
            $rows['id'] = $row['id'];
            $rows['title'] = $row['title'];
            $rows['description'] = $row['description'];
            $rows['price'] = $row['price'];
            $rowa[] = $row['author'];
            $rowg[] = $row['genre'];
        }
        if ($count){
            foreach (array_unique($rowa) as $value) {
                $rows['authors'][]=$value;
            }
        }
        if ($count){
            foreach (array_unique($rowg) as $value) {
                $rows['genres'][]=$value;
            }
        }
        
        return $rows;
    }
}
