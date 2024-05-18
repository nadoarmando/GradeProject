<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Grade</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
</style>
    <div class="container">
    <form action="index.php" method="post">
    <img src="img\img1.png" alt="graduate-image" style="width:20%">
    <p><h2 style="text-align:center">Student results for the first semester of the year 2023/24</h2></p>
    <label for="input-name"> <p style="color:black"><h4 style="color:black">Enter your name:</h4></p></label>
    <input type="text" name="name" class="input-name" placeholder="Name must be quadrilateral" required>
    <input type="submit" name="Show-result" value="Show-result" class="result-submit">
    </form>

<?php
if (isset ($_POST['Show-result'])) {
    $name = $_POST['name'];
    require_once "database.php";
    $sql = "SELECT *FROM grade WHERE fullName ='$name'";
    $res = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $sum = 0;
    if (mysqli_num_rows($res) > 0) {
        session_start();
         $_SESSION['user'] = "yes";
         /*header("location: index.php");*/
        echo "<p><h3 style='text-align:center'>$name</h3></p>";
        echo "<table class='styled-table'>
        <thead>
            <tr>
                <th>Subject</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>";
        $subjects = array('Math', 'Arabic', 'English', 'Physics', 'Economy', 'French');

        // Loop through each subject
        foreach ($subjects as $subject) {
            // Fetch the result for the current subject
            $result = $user[$subject];
            $sum += $result;
            // Determine the row color based on the result
            $rowColor = ($result < 50) ? "red-row" : "normal-row";
            echo "<tr class='$rowColor'>
                <td>$subject</td>
                <td>$result</td>
            </tr>";
        }
        echo "<tr style='text-align:center'>
        <td colspan='2'>Final Result</td>
    </tr> 
    <tr style='text-align:center'><td colspan='2'>$sum</td></tr>";
        echo "</tbody>
    </table>";

       echo "<style>
    .input-name ,label ,.result-submit{
        display:none;
    }";    
    echo "<style>
.another-result{
        display: inline-block;
    }
    </style>";
    echo "<p style='background-color:#f2f2ffbd; padding: 10px;'>*Note: <span style='color:red;'>Red</span> rows mean that you did not pass this subject.</p>";
        /*   die();*/
        
    } else {
        echo "<div class='er'> \"This name is not found\" </div>";
    }
     if (isset ($_POST['another-result'])) {
        session_start();
        session_destroy();
    }
}
else
{
    echo " <style>
 .another-result{
        display: none;
    }
    </style?\>";
}
?>
<div style="text-align:center display: inline-block;">
<form action="index.php" method="post">
<input type="submit" name="Another-result" value="Find another result!" class="another-result" formnovalidate>
</form>
</div>
</div>
</body>
</html>
