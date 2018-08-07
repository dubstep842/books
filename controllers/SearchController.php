<?php


class SearchController {
    
    
    /**
     * Если человек порейдет в дерикторирю /search/ без параметров
     * его перебросит на главную страницу
     */
    public function actionIndex(){
        header('Location: /');
    }

    /**
     * Выборка книг по заданному автору
     */
    public function actionAuthor(){
        
        //получаем имя автора, если нету то в корень
        $id = isset($_GET['id']) ? $_GET['id']: header('Location: /');
        
        $obj = new Search();
        $books = $obj->getBooksByAuthor($id);
        
        $objidex = new Index();
        $genres = $objidex->getTable('genres');
        $authors = $objidex->getTable('authors');
        
        require_once 'views/layout_site/header.php';
        //Проверка на наличие книг у заданного автора
        if($books[0]['id']!=NULL){
            require_once 'views/layout_site/book_table.php';
        }else{ 
            echo "Извините, нет книг данного жанра.";
        }
        require_once 'views/layout_site/footer.php';
    }
    
    
    /**
     * Выборка книг по заданному жанру
     */
    public function actionGenre(){
        
        //получаем жанр, если нету то в корень
        $id = isset($_GET['id']) ? $_GET['id']: header('Location: /');
        
        $obj = new Search();
        $books = $obj->getBooksByGenre($id);
        
        $objidex = new Index();
        $genres = $objidex->getTable('genres');
        $authors = $objidex->getTable('authors');
        
        require_once 'views/layout_site/header.php';
        //Проверка на наличие книг заданного жанра
        if($books[0]['id']!=NULL){
            require_once 'views/layout_site/book_table.php';
        }else{ 
            echo "Извините, нет книг данного жанра.";
        }
        require_once 'views/layout_site/footer.php';
    }
    
}
