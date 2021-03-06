<?php
if(!session_id())
  session_start();
if($_SESSION['teacherlogon'] != 1){
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
   <script>
   $( function() {
     $( "#tabs" ).tabs();
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
  </script>
 </head>
 <body>
   <div class="header"> <!-- title header -->
     <div class="container">
      <!--  <img src="resources/logo.png"> -->
        <i class="fa fa-fire fa-lg"></i>
        <span>Welcome to the Teacher page. Your shedule, at your fingertips.</span>
     </div>
    </div>
    <div class="banner"> <!--banner -->
      <div class="container">
        <div class="headline">
          <h4>Welcome back,</h4>
          <h1><?php echo $_SESSION["firstname"]."!"?></h1>
        </div>
      </div>
    </div> <!-- end of banner -->
  <div id="tabs">
      <ul>
        <li><a href="#tabs-1">Manage Classes</a></li>
        <li><a href="#tabs-2">Statistics</a></li>
      </ul>
      <div id="tabs-1">
       <div class="form-container">
        <div>
         <h4>Choose a date to see the schedule.</h4>
         <form id="schedule" method="post">
           Date: <input type="text" id="datepicker" name="date" required>
           <br><br>
           <input type="submit" value="See Schedule" name="sched">
           <br><br>
           <?php include 'schedule.php';?>
         </form>
        </div>
        <div>
          <h4>Add a new class to the schedule!</h4>
          <form id="class-add" method="post">
            <input type="text" id="datepicker2" name="date" required>
            <br><br>
            <select name="class-time" method="post" required>
              <option value="">Choose a time..</option>
              <option value="1">6:00am-8:30am</option>
              <option value="2">9:00am-10:30am</option>
              <option value="3">11:00am-12:30pm</option>
              <option value="4">1:00pm-2:30pm</option>
              <option value="5">3:00pm-4:30pm</option>
            </select>
            <?php include 'class_selection.php' ?>
            <br><br>
            <input type="submit" value="Add class" name="add-class">
          </form>
        </div>
        <div>
          <h4>Want to try teaching a new type of class?</h4>
          <p>Ask your branch manager to add new class types!</p>
       </div>
     </div>
    </div>
      <div id="tabs-2">
        <h4>Be the best teacher you can be.</h4>
        <p> Make use of our detailed reports to see information about your classes.</p>
        <form id="class-info" method="post">
          <select name="statistic" required>
            <option value="">Show me...</option>
            <option value="1">Most popular</option>
            <option value="2">Least popular</option>
          </select>
          <select name="subject" required>
            <option value="">About..</option>
            <option value="1">Class Type</option>
            <option value="2">Day of the Week</option>
            <option value="3">Time Block</option>
          </select><br><br>
          <input type="submit" value="Show Me!" name="submit">
        </form>
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
