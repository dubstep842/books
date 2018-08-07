<?php include_once 'views/layout/header.php';?>
<div class="content">
    <table class="bordered">
        <caption><button type="button" class="add_book btn2">Добавить новую книгу</button></caption>
        <thead>
            <tr>
                <th style="width:300px">Название книги</th>
                <th style="width:50px">Цена</th>
                <th style="width:170px">Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allBooks as $allBook):
                ?>

                <tr>
                    <td><?php echo $allBook['title']; ?></td>
                    <td><?php echo $allBook['price']; ?> $</td>
                    <td>
                        <form action="/admin/" method="post">
                            <input type="hidden" name="id" value="<?php echo $allBook['id'];?>">
                            <button type="button" class="edit_book" name="v" value="<?php echo $allBook['id'];?>">Изменить</button>
                            <button type="submit" name="v" value="delete">Удалить</button>
                        </form> 
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>  
</div>          
<?php include_once 'views/layout/footer.php';?>