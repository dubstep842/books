<form name="form" action="/admin/<?php echo $link;?>s/" method="POST">
    <label><?php echo $msg;?></label>
    <input type="text" name="value" class="input" value="<?php echo $id;?>" />            
    <input type="hidden" name="old_value" value="<?php echo $id;?>" />
    <button type="submit" class="button btn1" name="edit" value="<?php echo $link;?>">Сохранить</button>
</form>
