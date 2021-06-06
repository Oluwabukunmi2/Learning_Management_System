<?php

include("./include/config.php");
$qu = mysqli_query($bd, "select * from university where uid=" . $_GET['id']);
$row = mysqli_fetch_array($qu);

echo $row['apstatus'];

if ($row['apstatus'] != 'approved') {
	$abc = mysqli_query($bd, "update university set apstatus='approved' where uid=" . $_GET['id']);
	header('location:./manageuniversityaccount.php');
} else {
}
