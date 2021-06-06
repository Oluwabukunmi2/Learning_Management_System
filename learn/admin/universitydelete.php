
<?php

include("./include/config.php");
$qu = mysqli_query($bd, "delete from university where uid=" . $_GET['pid']);
$row = mysqli_fetch_array($qu);

header('location:./viewuniversity.php');


?>