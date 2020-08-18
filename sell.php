<?php
    include("connection.php");
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MecBooksCart|Sell</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="style.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
    </head>
    <body>
<?php
        include 'navbar.php'; 
?>
        <div class="form-container">
            <form name="myForm" id="form"  method="post" >  
                <h2 class="text-center">Sell a Book</h2>  
                <div class="form-group">
                    <b>Book ISBN :</b><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                        <input type="text" class="form-control" placeholder="Enter book ISBN" name="isbn" required>   
                    </div>
                </div>
<?php
                if(isset($_POST['sell'])!='')
                {
                    $isbn=$_POST["isbn"];
                    $sql = mysqli_query($con, "SELECT * from book WHERE isbn = '$isbn'");
                    if(mysqli_num_rows($sql) > 0)
                    {
?>
                        <div class="alert alert-danger">Book with this isbn already exists!</div>                                     
<?php
                    }
                }    
?>
                <div class="form-group">    
                    <b>Book Name:</b><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                        <input type="text" class="form-control" placeholder="Enter book name" name="title" required>
                    </div>
                </div>
                <div class="form-group">
                    <b>Book Author:</b><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" placeholder="Enter author name"  name="author" required >
                    </div>
                </div>
                <div class="form-group">
                    <b>Department</b><br>
                    <div class="input-group">  
                        <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>   
                        <select class="form-control" id="dept" name="dept" required> 
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
                        <select class="form-control" id="sem" name="sem" required>
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
                        <input type="text" class="form-control" placeholder="Enter subject code(eg. CS301)" name="subjectcode" required>
                    </div>
                </div>                               
                <div class="form-group">
                    <button class="btn btn-primary btn-block" name="sell" type="submit" >Add Book</button>
                </div> 
            </form>  
        </div>

<?php
        if(isset($_POST['sell'])!='')
        {
            $isbn=test_input($_POST['isbn']);
            $title=test_input($_POST['title']);
            $author=test_input($_POST['author']);
            $dept=test_input($_POST['dept']);
            $sem=test_input($_POST['sem']);
            $subjectcode=test_input($_POST['subjectcode']);
            $username=$_SESSION['username'];
            $insert_1=mysqli_query($con, "INSERT INTO book(isbn, title, author, dept, subjectcode, semester, username ) VALUES('$isbn', '$title', '$author', '$dept', '$subjectcode', '$sem', '$username')");
            if($insert_1)
            {
?>
                <script type="text/javascript">    
                        alert ("Book added successfully");
                window.location.replace("bs.php");
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


