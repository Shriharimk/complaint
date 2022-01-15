<!DOCTYPE html>
<html lang="en">

<body>
<section id = logup>
        <div class="logup container">
            <div class="log-up">
                <h1 class = 'section-title'>Reg<span>i</span>ster</h1>
                <p class = "reg-section">Enter the following details</p>
                <form class = "registeration" action="db_connect1.php" method="post">
                    <div class="form_item">
                        <label for="fname">First Name:</label><br>
                        <input type="text" id = "fname" name = "fname" required><br>
                    </div>
                    <div class="form_item">
                        <label for="lname">Last Name:</label><br>
                        <input type="text" id = "lname" name = "lname" required><br>
                    </div>                    
                    
                    <div class="form_item">
                        <label for="address">City Address</label><br>
                        <input type="address" id = "address" name = "address" required><br>
                    </div>

                    <div class="form_item">
                        <label for="username">Enter Username:</label><br>
                        <input type="text" id = "username" name = "username" required><br>
                       </div>

                    <div class="form_item">
                        <label for="password">Enter Password</label><br>
                        <input type="password" id = "pass" name = "pass"><br>
                    </div>
                    
                    <div class="form_item">
                        <label for="re_password">Re-Enter Password</label><br>
                        <input type="password" id = "re_pass" name = "re_pass"><br>
                    </div> 
                    <div class="form_item">  
                    <input type="submit" class = "cta" name = "submit"onClick="myFunction()"/>
                     <script>
                         function myFunction() {
                         window.location.href="C:\xampp\htdocs\dbmsproj";
                        }
                     </script>
                    
                    <?php
                    session_start();
                     $servername="localhost";
                      $username="root";
                     $password="";
                     $database_name="complaints";

                     $fname=$_POST['fname'];
    //echo $fname;
                     $lname=$_POST['lname'];    
                     $address=$_POST['address'];
                     $username=$_POST['username'];
                     $pass=$_POST['pass'];
                        $re_pass=$_POST['re_pass'];
                     $stmt='';
                     $conn='';
    

    //database connection
                     $conn = new mysqli('localhost','root','','complaints');
    
                     if(isset($_POST["submit"])){
                     $sql="SELECT * FROM user WHERE username='".$username."' and pass ='".$pass."'"; 
                     $query=mysqli_query($conn,$sql);
                     $numrows=mysqli_num_rows($query);  
                     echo $numrows;
                     if($numrows!=0)  
                     {  
                         while($row=mysqli_fetch_assoc($query))  
                        {  
                            $dbusername=$row['username'];  
                            echo $dbusername;
                            $dbpassword=$row['pass'];
                            echo $dbpassword;  
                         }  
  
                     if($username == $dbusername )  
                    {  
                     header('Location: landing.html');
                    }
                    }
                    else{
                    $stmt=$conn->prepare("insert into user(fname, lname, address, username, pass) values(?,?,?,?,?)");
                    $stmt->bind_param("sssss",$fname,$lname,$address,$username,$pass,);
        
                    $stmt->execute();
                    echo "registration successful!"
                //header('Location: home_page.html');
        //}
                    }
                    }
                    ?>
                </div>   
                </form>
            </div>
        </div>
    </section>
   </body>
   </html>
