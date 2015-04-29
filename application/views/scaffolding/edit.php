<p><?php echo anchor('scaffolding'.$table_url, '&lt; '.$this->lang->line('scaff_view_all'));?></p>

<?php echo form_open('scaffolding/update/'.$this->uri->segment(3).$table_url); ?>

<table border="0" cellpadding="3" cellspacing="1">
<?php foreach($fields as $field): ?>

<?php if ($field->primary_key == 1) continue; ?>

<tr>
	<td><?php echo  $field->name; ?></td>
	

    <?php if ($field->type == 'mediumtext'){ ?>
        <td><textarea class="textarea ckeditor" name="<?php echo $field->name; ?>" cols="60" rows="10" ><?php $f = $field->name; echo form_prep($query->$f); ?></textarea></td>
    <?php }elseif ($field->type == 'enum'){ ?>
        <td><select name="<?php echo $field->name; ?>">
                <?php foreach($field->enum_value as $key => $value){ ?>
                    <option value="<?php echo $value; ?>"  <?php $f = $field->name; if($value == $query->$f) echo 'selected'; ?> ><?php echo $value; ?></option>
                <?php } ?>
            </select></td>
    <?php }elseif ($field->type == 'datetime'){ ?>
        <td><input class="input <?php echo 'datepicker' ?>" name="<?php echo $field->name; ?>" value="<?php $f = $field->name; echo form_prep($query->$f); ?>" size="60" /></td>
    <?php }else{ ?>
        <td><input class="input" name="<?php echo $field->name; ?>" <?php if(strpos($field->name,'image') !== FALSE) echo 'onclick="openKCFinder(this)"'; ?> value="<?php $f = $field->name; echo form_prep($query->$f); ?>" size="60" /></td>
    <?php } ?>



</tr>
<?php endforeach; ?>
</table>

<input type="submit" class="submit" value="Update" />

<?php echo form_close(); 

/* End of file edit.php */
/* Location: ./application/views/scaffolding/edit.php */