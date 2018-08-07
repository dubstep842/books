<div class="content">
    <form action="/admin/edit/" method="POST">   
        <div class="row">
            Название книги:      
            <input type="text" name="title" value="<?php echo $book['title'];?>" />    
        </div>
        <div class="row">
            Цена: 
            <input type="text" name="price" value="<?php echo $book['price'];?>" />$
        </div>
        <div class="row">
            Автор книги:
            
            <select class="select" name="author1">
                <?php foreach ($authors as $value):
                    echo "<option ";
                    if ($book['authors'][0]==$value){echo 'selected ';}
                    echo "value=\"$value\">$value</option>";
                endforeach;?>
            </select>

            
            
            
            
            <button type="button" class="addNewAuthor btn1">Добавить</button>
            <button <?php if (count($book['authors'])==1){ echo 'disabled';}?> type="button" class="deleteAuthor btn1" id="deleteAuthor">Удалить</button>
            <input type="hidden" name="countAuthors" id="cAuthors" value="<?php echo count($book['authors']);?>" />
            <div id="add_author">
                <?php for($i=2;$i<count($book['authors'])+1;$i++):?>
                    <div class="row" id="<?php echo "author$i";?>">
                        <select class="select" name="<?php echo "author$i";?>">
                            <?php
                            foreach ($authors as $value):
                                echo "<option ";
                                if ($book['authors'][$i-1]==$value){echo 'selected ';}
                                echo "value=\"$value\">$value</option>";
                endforeach;?>
                        </select>
                    </div>
               <?php endfor; ?>
            </div> 
        </div>
        <div class="row">
            Жанр книги:
            <select class="select" name="genre1">
                <?php foreach ($genres as $value):
                    echo "<option ";
                    if ($book['genres'][0]==$value){echo 'selected ';}
                    echo "value=\"$value\">$value</option>";
                endforeach;?>
            </select>

            <button type="button" class="addNewGenre btn1">Добавить</button>
            <button <?php if (count($book['genres'])==1){ echo 'disabled';}?> type="button" class="deleteGenre btn1" id="deleteGenre">Удалить</button>
            <input type="hidden" name="countGenres" id="cGenre" value="<?php echo count($book['genres']);?>" />
            <div id="add_genre">
                <?php for($i=2;$i<count($book['genres'])+1;$i++):?>
                <div class="row" id="<?php echo "genre$i";?>">
                        <select class="select" name="<?php echo "genre$i";?>">
                            <?php
                            foreach ($genres as $value):
                                echo "<option ";
                                if ($book['genres'][$i-1]==$value){echo 'selected ';}
                                echo "value=\"$value\">$value</option>";
                endforeach;?>
                        </select>
                    </div>
               <?php endfor; ?>
            </div> 
        </div>
        <div class="row">Краткое содержание книги:</div>
        <div class="row">
            <textarea name="description"><?php echo $book['description'];?></textarea>
        </div>


        <button type="submit" class="btn1" name="btn" value="<?php echo $book['id'];?>">Сохранить</button>
    </form>
</div>
<script type="text/javascript" src="/template/js/ajax.js"></script>