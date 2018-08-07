<table class="bordered">
        <thead>
            <tr>
                <th style="width:550px">Книга</th>
                <th style="width:70px">Цена</th>
                <th style="width:120px">Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book):?>
                <tr>
                    <td><h3><?php echo $book['title'];?></h3></td>
                    <td><?php echo $book['price']; ?> $</td>
                    <td>            
                        <form action="/order/book/<?php echo $book['book_url']?>/" method="POST">
                            <button type="submit" class="btn1">Заказать</button>
                        </form> 
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>  