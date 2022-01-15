 <?php
                    session_start();
                     $servername="localhost";
                      $username="root";
                     $password="";
                     $database_name="complaints";

                     $fname=$_POST['fname'];
    echo $fname;
                     $lname=$_POST['lname']; 
                      echo $lname;   
                     $address=$_POST['address'];
                      echo $address;
                     $username=$_POST['username'];
                     echo $username;
                     $pass=$_POST['pass'];
                     echo $pass;
                  
                     $stmt='';
                     $conn='';
    

    //database connection
                     $conn = new mysqli('localhost','root','','complaints');
    
                     if(isset($_POST["submit"])){
                     $sql="SELECT * FROM users1 WHERE username='".$username."' and pass ='".$pass."'"; 
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
                    // $stmt=$conn->prepare("insert into user(fname, lname, address, username, pass) values(?,?,?,?,?)");
                    // $stmt->bind_param("sssss",$fname,$lname,$address,$username,$pass);
                    	$queryy=mysqli_query($conn, "insert into users1(fname, lname, address, username, password) values('$fname','$lname','$address','$username','$pass')");
        
                   // $stmt->execute();
                    echo "registration successful!";
                //header('Location: home_page.html');
        //}
                    }
                    }
                    ?>