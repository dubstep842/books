<?php require_once 'views/layout/header.php';?>
<div class="content">
    <table class="bordered">
        <caption><button type="button" class="add btn2" id="add" value="genre">Добавить новый жанр</button></caption>
        <thead>
            <tr>
                <th style="width:200px">Жанры книг:</th>
                <th style="width:180px">Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allGenres as $allGenre):?>
                <tr>
                    <td><?php echo $allGenre; ?></td>
                    <td>            
                        <form action="/admin/genres/" method="post">
                            <input type="hidden" name="id" value="<?php echo $allGenre;?>">
                            <button type="button" class="edit" name="genre" value="<?php echo $allGenre;?>">Изменить</button>
                            <button type="submit"  name="v" value="delete">Удалить</button>
                        </form> 
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table> 
</div>    
<?php require_once 'views/layout/footer.php';?>