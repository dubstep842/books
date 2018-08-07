<?php

class AdminController {
   
    public function actionIndex(){
        
        $obj = new Admin();
 
        $id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING);
        $version = filter_input(INPUT_POST, 'v',FILTER_SANITIZE_STRING);
        if (isset($id) && ($version == 'delete')){
            $obj->deleteAuthorOrGenreList('books', $id);
        }
        
        
        $allBooks = $obj->getAllBooks();
        
        $allGenres = $obj->getAuthorOrGenreList('genre');
        
        require_once 'views/admin/index.php';
    }
        
    
    public function actionAdd(){

        $title = filter_input(INPUT_POST, 'title',FILTER_SANITIZE_STRING);
        $desc = filter_input(INPUT_POST, 'description',FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, 'price',FILTER_VALIDATE_FLOAT);
        $btn = filter_input(INPUT_POST, 'btn',FILTER_SANITIZE_STRING);
        
        if (isset($btn) && isset($title) && isset($desc) && isset($price)) {
            $obj = new Admin();
            $obj->addBooks($title,$desc,$price);
            $newIdBook = $obj->getNewIdBook();
            $countAuthors = filter_input(INPUT_POST, 'countAuthors' ,FILTER_VALIDATE_INT);
            for ($i = 1; $i < $countAuthors+1; $i++) {
                $name_author = filter_input(INPUT_POST, 'author'.$i);
                $obj->addBooksByAuthors($newIdBook, $name_author);
            }
            $countGenres = filter_input(INPUT_POST, 'countGenres' ,FILTER_VALIDATE_INT);
            for ($i = 1; $i < $countGenres+1; $i++) {
                $name_genre = filter_input(INPUT_POST, 'genre'.$i);
                $obj->addBooksByGernes($newIdBook, $name_genre);
            }
            header('Location:/admin/');
        }else{
            $obj = new Admin();
            $authors=$obj->getAuthorOrGenreList('author');
            $genres=$obj->getAuthorOrGenreList("genre");
            require_once 'views/admin/add.php';
        }
    }
    public function actionEdit(){
        $id_edit = filter_input(INPUT_POST, 'id_edit',FILTER_VALIDATE_INT);
        if ($id_edit>0){
            $obj = new Admin();
            $book = $obj->getBook($id_edit);
            $authors=$obj->getAuthorOrGenreList('author');
            $genres=$obj->getAuthorOrGenreList("genre");
            require_once 'views/admin/edit.php'; 
        }
        
        $title = filter_input(INPUT_POST, 'title',FILTER_SANITIZE_STRING);
        $desc = filter_input(INPUT_POST, 'description',FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, 'price',FILTER_VALIDATE_FLOAT);
        $id = filter_input(INPUT_POST, 'btn',FILTER_VALIDATE_INT);
        if (isset($id) && isset($title) && isset($desc) && isset($price)) {
            $objedit = new Admin();
            
            $objedit->editBook($id,$title,$desc,$price);

            $countAuthors = filter_input(INPUT_POST, 'countAuthors' ,FILTER_VALIDATE_INT);
            $objedit->deleteBookAuthorsOrBookGenres('authors', $id);
            for ($i = 1; $i < $countAuthors+1; $i++) {
                $name_author = filter_input(INPUT_POST, 'author'.$i);
                $objedit->addBooksByAuthors($id, $name_author);
            }
            $countGenres = filter_input(INPUT_POST, 'countGenres' ,FILTER_VALIDATE_INT);
            $objedit->deleteBookAuthorsOrBookGenres('genres', $id);
            for ($i = 1; $i < $countGenres+1; $i++) {
                $name_genre = filter_input(INPUT_POST, 'genre'.$i);
                $objedit->addBooksByGernes($id, $name_genre);
            }
            header('Location:/admin/');
        }
        
    }


    public function actionForm(){
        
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
        if ($id>1){
            $obj = new Admin();     
            switch ($type){
                case "author": $list=$obj->getAuthorOrGenreList('author'); break;
                case "genre": $list=$obj->getAuthorOrGenreList("genre"); break; 
            }
            require_once 'views/admin/form.php';
        }
    }
    
    public function actionAuthors(){
        $obj = new Admin();
        
        $id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING);
        $version = filter_input(INPUT_POST, 'v',FILTER_SANITIZE_STRING);
        if (isset($id) && ($version == 'delete')){
            $obj->deleteAuthorOrGenreList('authors', $id);
        }
        if (filter_input(INPUT_POST, 'save') =='author'){
            $value = filter_input(INPUT_POST, 'value',FILTER_SANITIZE_STRING);
            if (isset($value)){
                $obj->addAuthors($value);
            }
        }
        if (filter_input(INPUT_POST, 'edit') =='author'){
            $value = filter_input(INPUT_POST, 'value',FILTER_SANITIZE_STRING);
            $old_value = filter_input(INPUT_POST, 'old_value',FILTER_SANITIZE_STRING);
            if (isset($value) && isset($old_value)){
                 $obj->editAuthorOrGenreList('author',$old_value,$value);     
            }
        }
        $allAuthors = $obj->getAuthorOrGenreList('author');
        
        require_once 'views/admin/authors.php';
    }
    
    public function actionGenres(){
        $obj = new Admin();
        
        $id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING);
        $version = filter_input(INPUT_POST, 'v',FILTER_SANITIZE_STRING);
        if (isset($id) && ($version == 'delete')){
                $obj->deleteAuthorOrGenreList('genres', $id);
        }  
        if (filter_input(INPUT_POST, 'save') =='genre'){
            $value = filter_input(INPUT_POST, 'value',FILTER_SANITIZE_STRING);
            if (isset($value)){
                 $obj->addGenres($value);     
            }
        }
        if (filter_input(INPUT_POST, 'edit') =='genre'){
            $value = filter_input(INPUT_POST, 'value',FILTER_SANITIZE_STRING);
            $old_value = filter_input(INPUT_POST, 'old_value',FILTER_SANITIZE_STRING);
            if (isset($value) && isset($old_value)){
                 $obj->editAuthorOrGenreList('genre',$old_value,$value);     
            }
        }
        $allGenres = $obj->getAuthorOrGenreList('genre');
        
        require_once 'views/admin/genres.php';
    }

    
    public function actionFormadd(){
        
        $link= filter_input(INPUT_POST, 'link',FILTER_SANITIZE_STRING);
        
        switch ($link){
            case 'author': $msg="Введите нового автора:"; break;
            case 'genre': $msg="Введите новый жанр:"; break;
        }
        require_once 'views/admin/formadd.php';
    }
    
    public function actionFormedit(){
        
        $link= filter_input(INPUT_POST, 'link',FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        
        switch ($link){
            case 'author': $msg="Исправление автора:"; break;
            case 'genre': $msg="Исправление жанра:"; break;
        }
        require_once 'views/admin/formedit.php';
    }
    
}
