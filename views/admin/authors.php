<?php require_once 'views/layout/header.php';?>
<div class="content">
    <table class="bordered">
        <caption><button type="button" class="add btn2" id="add" value="author">Добавить нового автора</button></caption>
        <thead>
            <tr>
                <th style="width:200px">Авторы книг:</th>
                <th style="width:180px">Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allAuthors as $allAuthor):?>
                <tr>
                    <td><?php echo $allAuthor; ?></td>
                    <td>            
                        <form action="/admin/authors/" method="post">
                            <input type="hidden" name="id" value="<?php echo $allAuthor;?>">
                            <button type="button" class="edit" name="author" value="<?php echo $allAuthor;?>">Изменить</button>
                            <button type="submit" name="v" value="delete">Удалить</button>
                        </form> 
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table> 
</div>
<?php require_once 'views/layout/footer.php';?>