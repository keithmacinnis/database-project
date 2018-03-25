<?php
if(!session_id())
  session_start();
  if($_SESSION['managerlogin'] != 1){
    header('Location: index.php');
  }
 ?>
<!DOCTYPE html>
<html>
 <head>
   <title>Bhakti: Wellness your way.</title>
   <link href="style.css" type="text/css" rel="stylesheet"/>
   <link rel="stylesheet" type="text/css"
     href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="resources/jquery-ui-1.12.1.custom/jquery-ui.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

   <script>
   $( function() {
     $( "#tabs" ).tabs();
     $( "#stat-tabs" ).tabs();
     } );

   </script>
   <script>
   $( function() {
     $( "#datepicker" ).datepicker({
         dateFormat: 'yy-mm-dd',
         minDate: 0
         });
   } );
  $( function() {
    $( "#datepicker2" ).datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: 0
        });
  } );
  $( function() {
    $( "#datepicker3" ).datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: 0
        });
  } );
  $( function() {
   $( "#accordion" ).accordion();
 } );
  </script>
 </head>
 <body>
   <div class="header"> <!-- title header -->
     <div class="container">
      <!--  <img src="resources/logo.png"> -->
        <i class="fa fa-fire fa-lg"></i>
        <span>Welcome to the Management page. Your business, at your fingertips.</span>
     </div>
    </div>
    <div class="banner"> <!--banner -->
      <div class="container">
        <div class="headline">
          <h4>Welcome back,</h4>
          <h1><?php echo $_SESSION["firstname"]?></h1>
        </div>
      </div>
    </div> <!-- end of banner -->
  <div id="tabs">
      <ul>
        <li><a href="#tabs-1">Manage Classes</a></li>
        <li><a href="#tabs-2">Manage Staff</a></li>
        <li><a href="#tabs-3">Statistics</a></li>
        <li><a href="#tabs-4">Detailed Reports</a></li>
      </ul>
      <div id="tabs-1">
       <div class="form-container">
       <div>
        <h4>See the schedule of any date.</h4>
        <form id="schedule" method="post">
          <input type="text" id="datepicker" name="date" required>
          <br><br>
          <input type="submit" value="See Schedule" name="sched">
          <br><br>
          <?php include 'schedule.php';?>
        </form>
       </div>
       <div id="accordion">
         <h4>Add classes to the schedule.</h4>
         <div>
          <form id="class-date" method="post">
           <input type="text" id="datepicker2" name="date" required>
           <br><br>
           <input type="submit" value="Select Date" name="add-date">
           </form>
           <?php if( isset($_POST['add-date'])){
             $_SESSION['date'] = $_POST['date'];
             echo "<form id='class-add' method='post'>";
             include 'available.php';
             echo "<br>";
             include 'class_selection.php';
             echo "<br>";
             include 'teacher_selection.php';
             echo"   <br><br>
               <input type='submit' value='Add class' name='add'>
             </form>";

           }
           include 'add_class.php';
          ?>

       </div>
         <h4>Remove classes from the schedule.</h4>
         <div>
            <form id="class-rm" method="post">
              <input type="text" id="datepicker3" name="date" required>
              <br><br>
              <input type="submit" value="Choose Date" name="remove-date">
            </form>
            <?php if (isset($_POST['remove-date'])){
              $_SESSION['date'] = $_POST['date'];

              echo"<form id='rm' method='post'>";
              include 'class_view.php';
              echo"<br><br>
              <input type='submit' value='Remove Class' name='rm'>
              </form>";
            }
             include 'remove_class.php';
             ?>
         </div>
         <h4> Add a new type of class. </h4>
         <div>
            <form id="add-classtype" method="post">
              <input type="text" name="newclass" required>
              <br><br>
              <input type="submit" value="Add class" name="add-classtype">
            </form>
         </div>
         <h4> Remove an existing class type. </h4>
         <div>
           <p> Warning: Removing a class type will remove all classes of that type
             from the schedule!</p>
           <form id="rm-classtype" method="post">
             <?php include 'class_selection.php' ?>
             <br><br>
             <input type="submit" value="Remove" name="remove-classtype">
           </form>
           <?php include 'remove_classtype.php';?>
         </div>
      </div>
    </div>
  </div>
      <div id="tabs-2">
        <div class="form-container">
          <div>
            <h4>Add teachers to your studio.</h4>
            <form id="add-teachers" method="post">
              Teacher First Name<br>
              <input type="text" name="teacherfirstname" required>
              <br><br>
              Teacher Last Name<br>
              <input type="text" name="teacherlastname" required>
              <br><br>
              Teacher Username:<br>
              <input type="text" name="teacherusername" required>
              <br><br>
              Teacher Password:<br>
              <input type="text" name="teacherpassword" required>
              <br><br>
              <input type="submit" value="Add new teacher" name="add-teacher">
              <?php include 'add_teacher.php'; ?>
            </form>
          </div>
          <div>
            <h4>Remove a teacher and all of their classes from your studio.</h4>
            <form id="rm-teachers" method="post">
              <?php include 'teacher_selection.php';?><br><br>
              <input type="submit" value="Remove Teacher" name="rm-teacher">
            </form>
        </div>
      </div>
    </div>
      <div id="tabs-3">
      		  <div id="stat-tabs">
			<ul>
			<li><a href="#stat-tabs-1">Member Joins by Month</a></li>
			<li><a href="#stat-tabs-2">Customer Report</a></li>
			<li><a href="#stat-tabs-3">Teacher Report</a></li>
			<li><a href="#stat-tabs-4">Class Report</a></li>
			</ul>
	<div id="stat-tabs-1">
      	<?php include 'stats.php';?>

      			  <script type="text/javascript">
			    google.charts.load("current", {packages:['corechart']});
			    google.charts.setOnLoadCallback(drawChart);
			    function drawChart() {
			      var data = google.visualization.arrayToDataTable([
			        ["Month", "New Members", { role: "style" } ],
			        ["Jan", <?php echo $_SESSION["janStat"]?>, "blue"],
			        ["Feb", <?php echo $_SESSION["febStat"]?>, "silver"],
			        ["March", <?php echo $_SESSION["marchStat"]?>, "gold"],
			        ["April", <?php echo $_SESSION["aprilStat"]?>, "green"]
			      ]);

			      var memberView = new google.visualization.DataView(data);
			      memberView.setColumns([0, 1,
			                       { calc: "stringify",
			                         sourceColumn: 1,
			                         type: "string",
			                         role: "annotation" },
			                       2]);

			      var options = {
			        title: "Member joins by Month",
			        width: 600,
			        height: 400,
			        bar: {groupWidth: "95%"},
			        legend: { position: "none" },
			      };
			      var memberChart = new google.visualization.ColumnChart(document.getElementById("columnchart_values_member"));
			      memberChart.draw(memberView, options);
			  }
			  </script>
	<div id="columnchart_values_member" style="width: 900px; height: 300px;"></div>
	<p><br/><br/><br/><br/><br/><br/><br/><br/></p>
	</div>
	<div id="stat-tabs-2">
		<?php include 'studentCount.php';?>
		<p>As of today, you have <?php echo $_SESSION["countNumberOfStudents"]?> students enrolled! </p>
      		<?php include 'customerReport.php';?>
	<p><br/><br/><br/><br/><br/><br/><br/><br/></p>
	</div>

      </div>
      <div id="tabs-4">
        <h4>Dive in to the details.</h4>
        <p>Our system provides detailed reports so that you can run the best version of your business.</p>
        			
        <form id="detailed" method="post">
          <select name="details" required>
            <option value="">Select..</option>
            <option value="1">Customer Report</option>
            <option value="2">Teacher Report</option>
            <option value="3">Class Report</option>
          </selct><br><br>
          <input type="submit" value="Get Report" name="report">
      </div>
  </div>
  <footer>
    <nav>
      <ul class="container">
        <li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook fa-lg"></i></a></li>
        <li><a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter fa-lg"></i></a></li>
        <li><a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram fa-lg"></i></a></li>
        <li><a href="logout.php">Log out</a></li>
      <ul>
    </nav>
  </footer>
 </body>
</html>
