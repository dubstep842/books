<div class="book">
    <h2><?php echo $book['title'];?></h2>
    <p>Цена:<?php echo $book['price'];?> $</p>
    <p>Автор: <?php echo implode(', ', $book['authors']);?></p>
    <p>Жанр: <?php echo implode(', ', $book['genres']);?></p>
    <p>Описание:<br><?php echo $book['description'];?></p>
    
    <form action="/order/" method="POST">
        <label>Адрес:</label>
        <p>
            <input type="text" name="adress" value="" />
        </p>
        <label>ФИО:</label>
        <p>
            <input type="text" name="name" value="" />
        </p>
        <label>Количество экземпляров:</label>
        <p>
            <input type="number" name="amount" value="1" min="1"/>
        </p>
        <p>
            <button type="submit" name="order" value="true">Заказать</button>
        </p>
        <input type="hidden" name="title" value="<?php echo $book['title'];?>"/>
        <input type="hidden" name="author" value="<?php echo implode(', ', $book['authors']);?>"/>
    </form>
</div>