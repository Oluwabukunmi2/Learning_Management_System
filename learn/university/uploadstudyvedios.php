<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {

  if (isset($_POST['submit'])) {
    $upv = $_SESSION['id'];
    $coursename = $_POST['coursename'];
    $websitelink = $_POST['websitelink'];

    $query = mysqli_query($bd, "insert into uploadvedio(coursename,websitelink) values('$coursename','$websitelink')");

    echo '<script> alert("Your vedio link has been successfully uploaded ")</script>';
  }
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>E-Learn | University Upload Study Vedios</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script>
      function getCat(val) {
        //alert('val');

        $.ajax({
          type: "POST",
          url: "getsubcat.php",
          data: 'catid=' + val,
          success: function(data) {
            $("#subcategory").html(data);

          }
        });
      }
    </script>

  </head>

  <body>

    <section id="container">
      <?php include("includes/header.php"); ?>
      <?php include("includes/sidebar.php"); ?>
      <section id="main-content">
        <section class="wrapper">
          <h3><i class="fa fa-angle-right"></i> Upload Study Vedios</h3>

          <!-- BASIC FORM ELELEMNTS -->
          <div class="row mt">
            <div class="col-lg-12">
              <div class="form-panel">


                <?php if ($successmsg) { ?>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Well done!</b> <?php echo htmlentities($successmsg); ?>
                  </div>
                <?php } ?>

                <?php if ($errormsg) { ?>
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg); ?>
                  </div>
                <?php } ?>

                <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data">

                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Select Course</label>
                    <div class="col-sm-4">
                      <select name="coursename" class="form-control" onChange="getCat(this.value);" required="">
                        <option>Select Course</option>
                        <?php
                        $university = $_SESSION['login'];
                        $sql = mysqli_query($bd, "select coursename from addnewcourse where uname='$university'");
                        while ($rw = mysqli_fetch_array($sql)) {
                        ?>
                          <option><?php echo $rw[0]; ?></option>
                        <?php
                        }
                        ?>
                      </select>
                      <br />
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Wbsite Link</label>
                      <div class="col-sm-4">
                        <input type="text" name="websitelink" required="required" value="<?php echo htmlentities($row['heading']); ?>" class="form-control">
                      </div>

                      <br />
                      <div class="form-group">
                        <div class="col-sm-10" style="padding-left:25% ">
                          <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                        </div>
                      </div>

                </form>
              </div>
            </div>
          </div>



        </section>
      </section>
      <?php include("includes/footer.php"); ?>
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

    <!--custom switch-->
    <script src="assets/js/bootstrap-switch.js"></script>

    <!--custom tagsinput-->
    <script src="assets/js/jquery.tagsinput.js"></script>

    <!--custom checkbox & radio-->

    <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


    <script src="assets/js/form-component.js"></script>


    <script>
      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });
    </script>

  </body>

  </html>
<?php } ?>