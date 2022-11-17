<?php
session_start();
if(empty($_SESSION["username"])) 
{
header("Location: login.php"); 
}
?>

<?php
include("../control/registrationviewProcess.php");

?>



<head>
<form action="" method="POST" enctype="multipart/form-data">
   <center>
    <body>
        

   <br><br><br>
    <h1>Govenment Official Registration Form </h1>
    <h3>Please Fill up the Form Thoroughly</h3>
    <br><br><br><br>
            <table>
               

<tr>
    <td>First Name:</td> <td><input type="text" name="fname" placeholder="Enter your First Name"></td> <td><?php echo $nameErr;?></td>
</tr>
<tr>
    <td> Last Name: </td> <td><input type="text" name="lname" placeholder="Enter your Last Name"></td><td><?php echo $name2Err;?></td>
</tr>

<tr>
    <td>Guardian Name:</td> <td> <input type="text" name="gname" placeholder="Enter your Guardian Name"></td><td><?php echo $gnameErr;?></td>
</tr>

<tr>
                    <td> <label>Present Address: </label></td>
                    <td><input type="text" name="street" placeholder="Enter street no: ">
                    <label for="city">Choose City:</label>

                    <select name="city" id="city">
                    <option value="DHAKA">DHAKA</option>
                    <option value="CHATTOGRAM">CHATTOGRAM</option>
                    <option value="KHULNA">KHULNA</option>
                    <option value="SYLHET">SYLHET</option>
                    <option value="RAJSHAHI">RAJSHAHI</option>
                    <option value="NARAYANGANJ">NARAYANGANJ</option>
                    </select>
                </td>
            
                    <td>
                    <label for="postal">Choose Postal Code:</label> 
                    <select name="postal" id="postal">POSTAL FOR
                    <option value="1204">1204</option>
                    <option value="4203">4203</option>
                    <option value="3100">3100</option>
                    <option value="8002">8002</option>
                    <option value="1900">1900</option>
                    <option value="3399">3399</option>
                    </select>
                    </td>
                    <td><?php echo  $preaddressErr;?></td>
 </tr>



 <tr>
    <td>Gender:</td>  
    <td>
                           <input type="radio" name="gender" value="male">Male
                          <input type="radio" name="gender" value="female">Female
                         <input type="radio" name="gender" value="others">Others
                       
                         </td><td><?php echo $genderErr;?></td>
 </tr>

 <tr>
<td>Profession:</td>
<td><input type = "checkbox" name = "acland" value = "acland">Ac Land
<input type = "checkbox" name = "generalofficer" value = "generalofficer" >General officer
<input type = "checkbox" name = "engineer" value = "engineer">Engineer</td><td><?php echo $proferr;?></td>

 </tr>




 <tr>
                    <td><label>Date of Birth:</label></td>
                     <td><input type="date" name="dateofbirth"></td>
                     <td><?php echo $dobErr;?></td>
                 </tr>


<tr>
    <td>Password:</td> <td><input type="text" name="pass" placeholder ="Enter New Password"> </td><td><?php echo $passErr;?></td>
</tr>

<tr>
    <td>Confirm Password:</td> <td><input type="text" name="cpass" placeholder ="Re-enter your password"></td><td><?php echo $cpassErr;?></td>
</tr>
            
<tr>
                        <td> <label>User Name: </label></td>
                        <td><input type="text" name="uname"placeholder="Enter your User Name"></td><td><?php echo $unameErr;?></td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td> <label>Email: </label></td>
                        <td><input type="text" name="email"placeholder="Enter your email"></td><td><?php echo $emailErr;?></td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td> <label>NID Number: </label></td>
                        <td><input type="text" name="nid" placeholder="Enter your valid nid"></td><td><?php echo $nidErr;?></td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Phone: </label></td>
                        <td><input type="text" name="phone" placeholder="01XXX-XXXXXX" ></td><td><?php echo $phnErr;?></td>
                        <td>
                        </td>
                    </tr>


                    <tr>
                    <td><label>CV: </label></td>
                    <td><input type="file"name="cv" accept="pdf/*"></td> 
                    <td> <?php echo $fileErr; ?> </td>

                    </tr>

                    <tr>
                        <td><label>Image: </label></td>
                        <td> <input type="file"  name="img" accept="image/*"></td>  
                        <td> <?php echo $imgErr; ?> </td>
                    </tr>







<tr></tr>



                   
                    <tr>
                        <td>
                        <input type="submit" name="Submit" value="Register">
                        </td>
                        <td><input type="reset" value="Reset"></td>
                    </tr>
                   
                    <tr>
                    <br>
                        <td><br><br><br><br><br><br><br></td>
                    </tr>
                    <tr><td><a href="../view/Viewinformation.php">View Registered Officials</td></tr>
                    <tr>
                    <td>Do you want to <a href="../control/logout.php">logout</td>
                    </tr>
                    </center>
                </table>


</body>
</form>
</html>
