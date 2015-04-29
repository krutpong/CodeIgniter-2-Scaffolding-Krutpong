<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<title><?php echo $title; ?></title>

<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/scaffolding/stylesheet.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv='expires' content='-1' />
<meta http-equiv='pragma' content='no-cache' />

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>

    <!-- jquery Ui -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">

    <!-- jquery datetimepicker -->
    <script src="//cdn.jsdelivr.net/jquery.ui.timepicker.addon/1.4.5/jquery-ui-sliderAccess.js"></script>
    <script src="//cdn.jsdelivr.net/jquery.ui.timepicker.addon/1.4.5/jquery-ui-timepicker-addon.min.css"></script>
    <script src="//cdn.jsdelivr.net/jquery.ui.timepicker.addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>

    <script>
        $(function() {
            $( ".datepicker" ).datetimepicker({ timeFormat: 'HH:mm:ss',dateFormat: 'yy-mm-dd' });
        });
    </script>



    <!-- kcfinder -->
    <script type="text/javascript">

        function openKCFinder(field) {
            window.KCFinder = {
                callBack: function(url) {
                    field.value = url;
                    window.KCFinder = null;
                }
            };
            window.open('/assets/kcfinder/browse.php?type=files&dir=/assets/kcfinder/upload', 'kcfinder_textbox',
                'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
                'resizable=1, scrollbars=0, width=800, height=600'
            );
        }

    </script>

    <!-- ckeditor -->
    <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>


</head>
<body>

<div id="header">
<div id="header_left">
    <div style="display:inline-block">
        <h3>Tables List:</h3>
        <select name="tables" id="tables" onchange="document.location.href = this.options[this.selectedIndex].value">
            <option value="#">select table</option>
            <?php foreach( $tables as $table ) : ?>
                <option value="<?php echo site_url('scaffolding') . '?table=' . $table; ?>"<?php echo ( isset( $_GET['table'] ) && $_GET['table'] == $table ) ? ' selected="selected"' : ""; ?>><?php echo $table ?></option>}
            <?php endforeach; ?>
        </select>
        </div>
    <?php if(!empty($fields)){ ?>

    <div style="display:inline-block">
    <form method="post" action="" >
        <h3>Search:</h3>
        <select name="field" id="tables">
            <option value="">select field</option>
            <?php foreach( $fields as $field ) : ?>
                <option value="<?php echo $field; ?>"<?php echo ( isset( $search_field ) && $search_field == $field ) ? ' selected="selected"' : ""; ?>><?php echo $field ?></option>}
            <?php endforeach; ?>

        </select>
        <input type="text" name="keyword" value="<?php echo $search_keyword; ?>" class="input" />
        <input type="submit" value="Search" class="submit">
    </form>
    </div>
    <?php } ?>
</div>
<div id="header_right">

<?php echo anchor('scaffolding'.$table_url, $this->lang->line('scaff_view_records')); ?> &nbsp;&nbsp;|&nbsp;&nbsp;
<?php echo anchor('scaffolding/add'.$table_url,  $this->lang->line('scaff_create_record')); ?>
</div>
</div>
<br clear="all">
<div id="outer">
<?php

/* End of file header.php */
/* Location: ./application/views/scaffolding/header.php */