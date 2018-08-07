<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/template/css/main.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <title>Books Shop</title>
    </head>
    
    <body>
        <div class="wrapper">
            <header class="header">
                <ul class="nav">
                <li class="nav"><a href="/">Главная страница</a></li>
                </ul>
                
            </header>
            <div class="content">
                <div class="rightCol">
            <h3>Жанры книг:</h3>
            <ul class="rightNav">
                <?php foreach ($genres as $genre):?>
                    <li>
                        <a href="/search/genre/<?php echo $genre['genre_url'];?>/" <?php if ($id == $genre['genre_url']){echo'class="active"';} ?>>
                        <?php echo $genre['genre'];?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
            <h3>Авторы книг:</h3>
            <ul class="rightNav">
                <?php foreach ($authors as $author):?>
                <li>
                    <a href="/search/author/<?php echo $author['author_url'];?>/"<?php if ($id == $author['author_url']){echo'class="active"';} ?>>
                        <?php echo $author['author'];?>
                    </a>
                </li>
                <?php endforeach;?>  
            </ul>
    </div>