<?php
    include 'connection.php';
    session_start();
    if (!isset($_SESSION['username'])) 
    {
        header('location:login.php');
    }
    if (isset($_POST['delete']) != '') 
    {
        $isbn = $_POST['isbn'];
        $delete_1 = mysqli_query($con, "DELETE FROM book WHERE isbn='$isbn'");
        if ($delete_1) 
        {
?>
            <script type="text/javascript">
                alert("Book deleted successfully ");
                window.location.replace("sell_list.php");
            </script>
<?php
        }
    }
    else 
    {
?>
        <script type="text/javascript">
            alert("Please select a book");
            window.location.replace("sell_list.php");
        </script>
<?php
    }
?>