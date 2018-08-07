<?php

class Order {
    
    /**
     * Отправка заказа администратору на почту
     * 
     * @param type $name ФИО закащика
     * @param type $adress Адресс закащика
     * @param type $title Название книги
     * @param type $author Авторы книги
     * @param type $amount Количество заказаных книг
     */
    public static function userOrder($name,$adress,$title,$author,$amount){
        $paramsPath = ROOT . '/config/mail_params.php';
        $params = include($paramsPath);
        
        
        $message = "ФИО - $name\r\nАдрес - $adress\r\n"
                . "Книга - $title\r\nАвтор - $author\r\n"
                . "Количество - $amount шт.";
               
         
        $subject = 'Новый заказ книг';
        $message = wordwrap($message, 70, "\r\n");
        $headers = 'From: support@smc.pp.ua' . "\r\n";
        mail($params['mail'], $subject, $message, $headers);

    }
}
