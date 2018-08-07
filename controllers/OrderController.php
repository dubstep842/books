<?php


class OrderController {
    
    /**
     * Принятие и обработка нового заказа
     */
    public function actionIndex(){
        //Получаем переменные с глобального массива $_POST
        $adress = filter_input(INPUT_POST, 'adress');
        $name = filter_input(INPUT_POST, 'name');
        $amount = filter_input(INPUT_POST, 'amout');
        $title = filter_input(INPUT_POST, 'title');
        $author = filter_input(INPUT_POST, 'author');

        $obj = new Order();
        $obj->userOrder($name, $adress, $title, $author, $amount);
        require_once 'views/layout_site/header.php';
        require_once 'views/index/order.php';
        require_once 'views/layout_site/footer.php';

    }

    /**
     * Ввывод информации о выбранной книге и формы для заказа
     */
    public function actionBook(){
        //Получение ID выбранной книги
        $id = isset($_GET['id']) ? $_GET['id']: header('Location: /');
        
        $obj = new Search();
        $book = $obj->getBook($id);
        
        $objidex = new Index();
        $genres = $objidex->getTable('genres');
        $authors = $objidex->getTable('authors');
        

        require_once 'views/layout_site/header.php';
        //Проверка на наличие книги
        if($book!=NULL){
            require_once 'views/index/page.php';
        }else{ 
            echo "Извините, нет такой книги.";
        }
        require_once 'views/layout_site/footer.php';
    }
}
