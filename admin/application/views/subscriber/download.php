<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>



        .person{
            font-size: 13px;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

    </style>
</head>

<body>

<table class="" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="15%" align="right">


        </td>
        <td width="85%" align="center">

        </td>

    </tr>
</table>

<br/>
<br/>
<br/>
<table  border="1" class="mainTable" cellpadding="7" cellspacing="0">


    <tr align="center" style="color:white; background-color: lightgrey">

        <td>Sno</td>
        <td>Email</td>
        <td>Date</td>


    </tr>

<?php
$i=1;
foreach($result as $item) {
    ?>
    <tr align="center">
        <td><?php echo $i?></td>
        <td><?php echo $item->sub_email?></td>
        <td><?php echo $item->created_at?></td>

    </tr>
    <?php
    $i++;
}?>






</table>

<br/>
<br/>


</body>
</html>
