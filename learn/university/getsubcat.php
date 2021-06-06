<?php
include('includes/config.php');

if (!empty($_POST["coid"])) {
  $id = intval($_POST['coid']);
  if (!is_numeric($coid)) {

    echo htmlentities("invalid coursename");
    exit;
  } else {
    $stmt = mysqli_query($bd, "SELECT * FROM addnewcourse WHERE  coid=" . $_POST['coid']);
?><option selected="selected">University Name </option><?php
                                                        while ($row = mysqli_fetch_array($stmt)) {
                                                        ?>
      <option value="<?php echo htmlentities($row['uname']); ?>"><?php echo htmlentities($row['uname']); ?></option>
<?php
                                                        }
                                                      }
                                                    }
?>