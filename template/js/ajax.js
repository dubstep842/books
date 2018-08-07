$('button.addNewAuthor').click(function(html) {
    var id = Number(document.getElementById("cAuthors").value)+1;
    document.getElementById("cAuthors").value = id; 
    if (id>1){ 
        document.getElementById('deleteAuthor').removeAttribute('disabled')
    }
    $.ajax({
        type: "POST",
        url: "/admin/form/",
        data: "type=author&id="+id,
                
        success: function(html) {
            $("#add_author").append(html);
        }
    });
});

$('button.addNewGenre').click(function(html) {
    var id = Number(document.getElementById("cGenre").value)+1;
    document.getElementById("cGenre").value = id; 
    if (id>1){ 
        document.getElementById('deleteGenre').removeAttribute('disabled')
    }
    $.ajax({
        type: "POST",
        url: "/admin/form/",
        data: "type=genre&id="+id,
                
        success: function(html) {
            $("#add_genre").append(html);
        }
    });
});

$('button.deleteAuthor').click(function(html) {
    var id = Number(document.getElementById("cAuthors").value);
    document.getElementById("cAuthors").value = id-1; 
    if (id<3){ 
        document.getElementById('deleteAuthor').setAttribute("disabled", "disabled")
    }
    var el = document.getElementById('author'+id);
     el.parentNode.removeChild(el);

    
});
$('button.deleteGenre').click(function(html) {
    var id = Number(document.getElementById("cGenre").value);
    document.getElementById("cGenre").value = id-1; 
    if (id<3){ 
        document.getElementById('deleteGenre').setAttribute("disabled", "disabled")
    }
    var el = document.getElementById('genre'+id);
     el.parentNode.removeChild(el);

    
});


$('button.add').click(function (e){
    var link = $(this).attr('value');
    $.ajax({
        type: "POST",
        url: "/admin/formadd/",
        data: "link="+link,
                
        success: function(html) {
            $("#result").empty();
            $("#result").append(html);
        }
    });
    
	$('.popup, .overlay').css({'opacity':'1', 'visibility':'visible'});
	e.preventDefault();
});

$('button.edit').click(function (e){
    var link = $(this).attr('name');
    var id = $(this).attr('value');
    $.ajax({
        type: "POST",
        url: "/admin/formedit/",
        data: "link="+link+"&id="+id,
                
        success: function(html) {
            $("#result").empty();
            $("#result").append(html);
        }
    });
    
	$('.popup, .overlay').css({'opacity':'1', 'visibility':'visible'});
	e.preventDefault();
});

$('button.add_book').click(function (e){
    $.ajax({
        type: "GET",
        url: "/admin/add/",
                
        success: function(html) {
            $("#result").empty();
            $("#result").append(html);
        }
    });
    
	$('.popup, .overlay').css({'opacity':'1', 'visibility':'visible'});
	e.preventDefault();
});

$('.popup .close_window, .overlay').click(function (){
	$('.popup, .overlay').css({'opacity':'0', 'visibility':'hidden'});
});

$('button.edit_book').click(function (e){
    var id = $(this).attr('value');
    $.ajax({
        type: "POST",
        url: "/admin/edit/",
        data:"id_edit="+id ,
                
        success: function(html) {
            $("#result").empty();
            $("#result").append(html);
        }
    });
    
	$('.popup, .overlay').css({'opacity':'1', 'visibility':'visible'});
	e.preventDefault();
});

$('.popup .close_window, .overlay').click(function (){
	$('.popup, .overlay').css({'opacity':'0', 'visibility':'hidden'});
});