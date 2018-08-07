<?php

class IndexController {
    
    /**
     * Вывод пользователю всех книг, авторов, жанров
     * 
     * @param type $id - на главной странице нету выбраных категорий
     */
    public function actionIndex($id = false){
        $obj = new Index();
        
        $authors = $obj->getTable('authors');
        $genres = $obj->getTable('genres');
        $books = $obj->getTable('books');
        
        require_once 'views/layout_site/header.php';
        require_once 'views/layout_site/book_table.php';    
        require_once 'views/layout_site/footer.php';

    }
}
