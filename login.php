   <?php
    session_start();
    require'config.php';
    $salt='J2?H23!';
    if($_POST['phno']!="")
    {    
        if($_POST['pass']!="")
        {
	       // get and clean data from form
		    $phno =$_POST['phno'];
            $pass = $_POST['pass'];
            $pass= md5($pass.$salt);    
        
		    $q="SELECT ph_num,pass,name FROM farmer WHERE ph_num='$phno' AND pass='$pass'";   
            $q1="SELECT ph_num,pass,name FROM customer WHERE ph_num='$phno' AND pass='$pass'";
            //echo $q1;
            $res=mysqli_query($conn,$q);
            $row = mysqli_fetch_row($res);
            $res1=mysqli_query($conn,$q1);
            $row1 = mysqli_fetch_row($res1);
            $name=$row[2];
        	if($row[0]==$phno && $row[1]==$pass)  
		    {
                $_SESSION['name']=$name;
                $_SESSION['phno']=$row[0];
                $_SESSION['farmer']=1;
			    $_SESSION['EXPIRES'] = time() + 3600;    
                header('Location: /Farming/main/farmer/');
		    }
            else if($row1[0]==$phno && $row1[1]==$pass)
            {
                $_SESSION['name']=$row1[2];
                $_SESSION['phno']=$row1[0];
                $_SESSION['farmer']=0; 
			    $_SESSION['EXPIRES'] = time() + 3600;    
                header('Location: /Farming/main/customer/');
            }
            else
            {
              header('Location: /Farming/signin/unauth.php');
            }
        
        }
    }
    else
    {
                 header('Location: /Farming/signin/unauth.php');
    }
?>