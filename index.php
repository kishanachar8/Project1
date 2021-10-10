
<?php
require_once "connection.php";
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<body>
<center>
<form action="" method="POST">
            <label>Movie Name</label></br>
            <input name="movie_name" placeholder="Movie Name" required="" /></br></br>

            <label>Actor Name</label></br>
            <input name="actor_name" placeholder="Actor Name" required="" /></br></br>

            <label>Actress Name</label></br>
            <input name="actress_name" type="text" placeholder="Actress Name" /></br></br>

            <label>Year</label></br>
            <input name="year_name" type="year" placeholder="Year" required="" /></br></br>

            <label>Director Name</label></br>
            <input name="director_name" type="text" placeholder="Director Name" required="" /></br></br>
            <input type="submit" value="ADD" name="submit">


        </form>



</body>

<?php 

if(isset($_POST['submit']))
  {
    $movie=$_POST['movie_name'];
    $actor=$_POST['actor_name'];
    $actress=$_POST['actress_name'];
    $year=$_POST['year'];
    $dirname=$_POST['director_name'];
  
   
   /*Query to add movie details*/

    $sql = "INSERT INTO storemovies (movie_name, actor_name, actress_name, year_name, director_name) VALUES ('$movie','$actor','$actress','$year','$dirname')";
    
    mysqli_query($link,$sql) or die("Querry Error");
   
    if(1)
    {
        
        echo "<script> window.location.assign('index.php'); </script>";
    }
   
  }
  
?>


<table border="3px" ; padding="10px" ; style="width:50%;">

<caption>Added Data</caption>


        <tr>
	    <th>Movie_Name</th>
            <th>Actor_Name</th>
            <th>Actress_Name</th>
            <th>Year</th>
            <th>Director_Name</th> 
        </tr>






        <?php
        error_reporting(0);
                   $fetchQuery="SELECT * from storemovies";
                   mysqli_query($link,$fetchQuery) or die("Querry Error");
                   $run=mysqli_query($link,$fetchQuery);
                   while($row=mysqli_fetch_array($run))
                   {
                   ?>
        <center>
		<tr>
		<td><?php echo $row['movie_name']; ?></td>
		<td><?php echo $row['actor_name']; ?></td>
		<td><?php echo $row['actress_name']; ?></td>
		<td><?php echo $row['year_name']; ?></td>
		<td><?php echo $row['director_name']; ?></td>
		</tr>
        </center>

        <?php } ?>
</table></br>
<caption>To fetch movie details by actor name</caption>
<form action="" method="post">

<input name="actor_name" placeholder="Actor Name" required="" /></br></br>

<input type="submit" value="submit" name="query_submit">

</form>


<?php 

if(isset($_POST['query_submit']))
  {
    $myactors=$_POST['actor_name'];
  }
?>


<table border="2px" ; padding="10px" ; style="width:50%;">
          <tr>
	    <th>Movie_Name</th>
            <th>Actor_Name</th>
            <th>Actress_Name</th>
            <th>Year</th>
            <th>Director_Name</th> 
        </tr>
        <?php
        /*Extra query to fetch movie details by actor name*/
                   $fetchQuery="SELECT * from storemovies where actor_name='$myactors' ";
                   mysqli_query($link,$fetchQuery) or die("Querry Error");
                   $run=mysqli_query($link,$fetchQuery);
                   while($row=mysqli_fetch_array($run))
                   {
                   ?>
      <center>
	<tr>
	<td><?php echo $row['movie_name']; ?></td>
	<td><?php echo $row['actor_name']; ?></td>
	<td><?php echo $row['actress_name']; ?></td>
	<td><?php echo $row['year_name']; ?></td>
	<td><?php echo $row['director_name']; ?></td>
	</tr>
        </center>

        <?php } ?>
</table>

</center>
</html>