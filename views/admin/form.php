<div class="row"  id="<?php echo $type.$id;?>">
    <select class="select" name="<?php echo $type.$id;?>">
        <?php foreach ($list as $value):
            echo "<option value=\"$value\">$value</option>";
        endforeach;?>
    </select>
</div>