
<?php

include("./include/config.php");
$qu = mysqli_query($bd, "delete from users where id=" . $_GET['pid']);
$row = mysqli_fetch_array($qu);

header('location:./manage-users.php');


?>