<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user_info.css">
    <title>Voting Form</title>
</head>
<body>
    <h2 id="heading">Enter your Information</h2>
    <div class="card-container">
        <form method="post" action="user_info.php">
        
            Enrollment number: <br><input name="enrollment" type="text" size="50" required><br><br>
            Name: <br><input name="name" type="text" size="50"><br><br>
            Gender: <select name="Gender" id="Gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="other">Other</option>
                <option value="prefer not to say">Prefer not to say</option>
            </select><br><br>
            
            Department: <select name="Department" id="Department">
                <option value="BCA">BCA</option>
                <option value="BBA">BBA</option>
                <option value="B.Ed">B.Ed</option>
                <option value="B.Com">B.Com</option>
                <option value="Law">Law</option>
                <option value="BTech">BTech</option>
                <option value="MBA">MBA</option>
            </select><br><br>
            Class: <br>
            <div class="homeroom">
             <select name="year">
                <option value="1st" >1st</option>
                <option value="2nd">2nd</option>
                <option value="3rd">3rd</option>
                <option value="4th">4th</option>
                </select>&nbsp;
    
                <select name="shift" >
                    <option value="morning">Morning</option>
                    <option value="Evening">Evening</option>
                </select>&nbsp;
                
                <select name="section" >
                    <option value="A">A</option>
                    <option value="B">B</option>
                </select><br><br>
            </div>        
            <div class="buttons">
                <input type="submit" value="Next" name="next" class="button"> 
                <input type="reset" value="Cancel" name="cancel" class="button1">
            </div>
    
        </form>
    </div>
    
</body>
</html>

<?php
    error_reporting(1);
    if(isset($_POST['next'])){
        $_SESSION['enrollment']=$_POST['enrollment'];
        $_SESSION['name']=$_POST['name'];
        $_SESSION['gender']=$_POST['Gender'];
        $_SESSION['department']=$_POST['Department'];
        $_SESSION['year']=$_POST['year'];
        $_SESSION['shift']=$_POST['shift'];
        $_SESSION['section']=$_POST['section'];
        header("Location: voting_page.php");
        die();
    }
    
?>