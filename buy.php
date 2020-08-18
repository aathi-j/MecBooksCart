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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MecBooksCart|Buy</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="style.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>    
<?php
        include 'navbar.php';    
?>
        <div class="container">   
            <div id="search-banner">
                <form name="searchform" id="searchform" method="post">
                    <h2 id="search"><b>Search for the book you want</b></h2>
                    <div class="form-group">
                        <select class="form-control" name="column_name" id="getit"  required=""> 
                            <option value="" selected disabled>Search By</option>   
                            <option value="title">Title</option>
                            <option value="author">Author</option>
                            <option value="dept">Department</option>
                            <option value="semester">Semester/Year</option>
                            <option value="subjectcode">Subject</option>
                        </select>
                    </div>
                    <div class="form-group" id= "deptselect" style="display: none;">
                        <select class="form-control" name="dept" id="dept"> 
                            <option value="" selected disabled>Select Department</option>   
                            <option value="cs">Computer Science and Engineering</option>
                            <option value="ec">Electronics & Communication Engineering</option>
                            <option value="ee">Electronics & Electrical Engineering</option>
                            <option value="eb">Electronics & Biomedical Engineering</option>
                            <option value="na">Not Applicable</option>
                        </select>
                    </div>
                    <div class="form-group" id= "semselect" style="display: none;">
                        <select class="form-control" name="semester" id="semester"> 
                            <option value="" selected disabled>Select Semester/ Year</option>    
                            <option value="s1/s2">First Year</option>
                            <option value="s3/s4">Second Year</option>
                            <option value="s5">Semester 5</option>
                            <option value="s6">Semester 6</option>
                            <option value="s7">Semester 7</option>
                            <option value="s8">Semester 8</option>
                        </select>
                    </div>
                    <div class="form-group" id="enterinfo" style="display: none;">
                        <input type="text" class="form-control" placeholder="Enter as per your choice" name="as_per_choice" >
                    </div>
                    <script>
                        document.getElementById("getit").onchange = function (e) 
                        {
                            if (this.value == "dept") 
                            {
                                document.getElementById("deptselect").style.display="";
                                document.getElementById("semselect").style.display="none";
                                document.getElementById("enterinfo").style.display="none";
                            }                        
                            else if (this.value == "semester") 
                            {
                                document.getElementById("deptselect").style.display="none";
                                document.getElementById("semselect").style.display="";
                                document.getElementById("enterinfo").style.display="none";
                            }                         
                            else 
                            {
                                document.getElementById("deptselect").style.display="none";
                                document.getElementById("semselect").style.display="none";
                                document.getElementById("enterinfo").style.display="";
                            }
                        };
                    </script>
                    <div class="form-group">
                        <button class="btn btn-danger btn-block" name="search" type="submit" formaction="search_list.php" ><span class="glyphicon glyphicon-search"></span>Search</button>
                    </div>
                </form>
            </div>
            <div class="jumbotron" id="list">
                <h1><b>Books For Sale</b></h1>
<?php
                $disp=mysqli_query($con, "SELECT * FROM book, user WHERE book.username=user.username");
                if($disp !== false && $disp->num_rows > 0)
                {
                    while ($li=mysqli_fetch_array($disp)) 
                    {
?>
                        <div class="column">
                            <h2><b><?php echo 'Book Title: '?></b><?php echo $li["title"]?></h2>
                            <h4><b><?php echo 'Author Name: '?></b><?php echo $li["author"]?></h4>
                            <h4><b><?php echo 'Semester: '?></b><?php echo $li["semester"]?></h4>
                            <h4><b><?php echo 'Department: '?></b><?php echo $li["dept"]?></h4>
                            <h4><b><?php echo 'Subject Code: '?></b><?php echo $li["subjectcode"]?></h4>
                            
                        </div>
<?php            
                    } 
                }   
                else
                {
                    echo "<h3><b>Sorry. All books are sold out!</b></h3>";
                    echo "<p>Come back another time.</p>";
                }      
?>    
            </div>   
        </div>
<?php
        include 'footer.php';
?>       
    </body>
</html>