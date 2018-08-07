<?php


class SearchController {
    
    public function actionIndex(){
        header('Location: /');
    }

        public function actionAuthor(){
        $id = isset($_GET['id']) ? $_GET['id']: header('Location: /');
        
        $obj = new Search();
        $books = $obj->getBooksByAuthor($id);
        
        $objidex = new Index();
        $genres = $objidex->getTable('genres');
        $authors = $objidex->getTable('authors');
        
        require_once 'views/layout_site/header.php';
        if($books[0]['id']!=NULL){
            require_once 'views/layout_site/book_table.php';
        }else{ 
            echo "Извините, нет книг данного жанра.";
        }
        require_once 'views/layout_site/footer.php';
    }
    
    public function actionGenre(){
        $id = isset($_GET['id']) ? $_GET['id']: header('Location: /');
        
        $obj = new Search();
        $books = $obj->getBooksByGenre($id);
        
        $objidex = new Index();
        $genres = $objidex->getTable('genres');
        $authors = $objidex->getTable('authors');
        
        require_once 'views/layout_site/header.php';
        if($books[0]['id']!=NULL){
            require_once 'views/layout_site/book_table.php';
        }else{ 
            echo "Извините, нет книг данного жанра.";
        }
        require_once 'views/layout_site/footer.php';
    }
    
}
