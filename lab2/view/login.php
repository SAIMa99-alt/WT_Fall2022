
    <!DOCTYPE html>
    <?php
    
include('../control/logincheck.php');




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
        
       
    <form action ="" method="POST" enctype="multipart/form-data">
        <center >          
<table>
    <tr>
    <td>
        <lable><h3>Username :</h3></label>
       
    </td>
    <td> <input type="username" name="username" ></td>
</tr>
<tr>
    <td>
        <lable><h3>Password  :</h3></label>
        
    </td>
    <td>
    <input type="password" name="password" >
    </td>
</tr>
<tr><td></td>
                        <td>
                        <input type="checkbox" name="remember" id="remember">Remember Me
                        </td>
                    </tr>
       <tr>
           <td>
                  <center>
                    
                          <td><input type="submit" name="submit" value="Login"></td><td><?php echo $error; ?></td>
                       
                            </center>
                        </td>
                    </tr>
                    
                   
                   
                    
</center>
</form>
</center>
</body>
</html>