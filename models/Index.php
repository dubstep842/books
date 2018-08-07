<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author MaLuTkA
 */
class Index {
    
    /**
     * Получение всех даных с указанной таблицы
     * 
     * @param type $table название таблицы для выборки
     * @return type массив с строками таблицы
     */
    public function getTable($table){
        $db = db::getConnection();
        $sql = "SELECT * FROM $table";
        
        $result = $db->prepare($sql);
        $result->execute([]);
                
        return $result->fetchAll();
    }
}
