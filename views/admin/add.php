<div class="content">
    <form action="/admin/add/" method="POST">   
        <div class="row">
            Название книги:      
            <input type="text" name="title" value="" />    
        </div>
        <div class="row">
            Цена: 
            <input type="text" name="price" value="0" />$
        </div>
        <div class="row">
            Автор книги:
            <select class="select" name="author1">
                <?php foreach ($authors as $value):
                    echo "<option value=\"$value\">$value</option>";
                endforeach;?>
            </select>
            <button type="button" class="addNewAuthor btn1">Добавить</button>
            <button disabled type="button" class="deleteAuthor btn1" id="deleteAuthor">Удалить</button>
            <input type="hidden" name="countAuthors" id="cAuthors" value="1" />
            <div id="add_author"></div> 
        </div>
        <div class="row">
            Жанр книги:
            <select class="select" name="genre1">
                <?php foreach ($genres as $value):
                    echo "<option value=\"$value\">$value</option>";
                endforeach;?>
            </select>
            <button type="button" class="addNewGenre btn1">Добавить</button>
            <button disabled type="button" class="deleteGenre btn1" id="deleteGenre">Удалить</button>
            <input type="hidden" name="countGenres" id="cGenre" value="1" />
            <div id="add_genre"></div> 
        </div>
        <div class="row">Краткое содержание книги:</div>
        <div class="row">
            <textarea name="description"></textarea>
        </div>


        <button type="submit" class="btn1" name="btn" value="save">Сохранить</button>
    </form>
</div>
<script type="text/javascript" src="/template/js/ajax.js"></script>
