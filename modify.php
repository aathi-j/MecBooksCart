<?php
    include 'connection.php';
    session_start();
    include 'navbar.php';
    if(!isset($_SESSION['username']))
    {
        header('location:login.php');
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MecBooksCart|Modify</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="style.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
<?php
        if(isset($_POST['modify'])!='' or isset($_POST['conf_modify'])!='')
        {
            $isbn=$_POST['isbn'];
            $fetch=mysqli_query($con, "SELECT * FROM book WHERE isbn='$isbn'");
            $el = mysqli_fetch_array($fetch, MYSQLI_ASSOC);
?>       
            <div class="form-container">
                <form  id="form" method="post" >   
                    <div class="form-group">
                        <h2>Book ISBN : <?php echo $el["isbn"];?> </h2>
                        <input type="hidden" name="isbn" value="<?php echo $el["isbn"];?>">
                    </div>
                    <div class="form-group">    
                        <b>Book Name:</b><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                            <input type="text" class="form-control" value="<?php echo $el["title"];?>"  name="title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <b>Book Author:</b><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" value="<?php echo $el["author"];?>"  name="author" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <b>Department</b><br>
                        <div class="input-group">  
                            <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>   
                            <select class="form-control" id="dept" name="dept" value="<?php echo $el["dept"];?>" required> 
                                <option value="" selected disabled>Select your Department</option>   
                                <option value="cs">Computer Science & Engineering</option>
                                <option value="ec">Electronics & Communication Engineering</option>
                                <option value="ee">Electronics & Electrical Engineering</option>
                                <option value="eb">Electronics & Biomedical Engineering</option>
                                <option value="na">Not Applicable</option>
                            </select>  
                        </div> 
                    </div> 
                    <div class="form-group">
                        <b>Semester/Year</b><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                            <select class="form-control" id="sem" name="sem" value="<?php echo $el["sem"];?>" required>
                                <option value="" selected disabled>Select your Year/Semester</option>    
                                <option value="s1/s2">First Year</option>
                                <option value="s3/s4">Second Year</option>
                                <option value="s5">Semester 5</option>
                                <option value="s6">Semester 6</option>
                                <option value="s7">Semester 7</option>
                                <option value="s8">Semester 8</option>
                            </select>     
                        </div> 
                    </div>
                    <div class="form-group">    
                        <b>Subject Code:</b><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                            <input type="text" class="form-control" value="<?php echo $el["subjectcode"];?>" name="subjectcode" required>
                        </div>
                    </div>                               
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" name="conf_modify" type="submit" >Modify Book</button>    
                    </div>   
                </form> 
            </div>      
<?php
        }
        else
        {
?>
            <script type="text/javascript">    
                alert ("Please select a book");
                window.location.replace("sell_list.php");
            </script>
<?php
        }
        if(isset($_POST['conf_modify'])!='')
        {
            $isbn=test_input($_POST['isbn']);    
            $title=test_input($_POST['title']);
            $author=test_input($_POST['author']);
            $dept=test_input($_POST['dept']);
            $sem=test_input($_POST['sem']);
            $subjectcode=test_input($_POST['subjectcode']);
            $username=$_SESSION['username'];
            $up=mysqli_query($con, "UPDATE book SET title='$title', author='$author', dept='$dept', semester='$sem', subjectcode='$subjectcode', username='$username' WHERE isbn='$isbn'");
            if($up)
            {
?>     
                <script type="text/javascript">    
                        alert ("Book modified successfully ");
                        window.location.replace("sell_list.php");
                </script>
<?php
            }    
        }              
        function test_input($data) 
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        } 
        include 'footer.php';              
?>
    </body>
</html>