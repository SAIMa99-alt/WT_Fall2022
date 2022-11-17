<?php
include("../model/govt_official_db.php");
$nameErr = "";
$name2Err = "";
$gnameErr = "";

$genderErr = "";
$dobErr = "";
$unameErr = "";
$passErr = "";
$cpassErr = "";
$preaddressErr = "";
$emailErr = "";
$nidErr = "";
$phnErr = "";
$fileErr = "";
$imgErr = "";
$filepath ="";
$imgpath ="";
$datasave="";
$presentaddress ="";
$gender=" ";
$profession="";
$proferr="";




if(isset($_POST["Submit"]))
  {
    $name = $_POST["fname"];
    $name2 = $_POST["lname"];
    /*
    if(isset( $gender))
{
    $genderErr = 'You Havent Selected a gender';
}
else{}
    */
   
    $dateofbirth = $_POST["dateofbirth"];
    $gname = $_POST["gname"];
  
    $username = $_POST["uname"];
    $password = $_POST["pass"];
    $confirmpassword =$_POST["cpass"];
    $street = $_POST["street"];
    $city = $_POST["city"];
    $postalcode = $_POST["postal"];
    $email = $_POST["email"];
    $nid = $_POST["nid"];
    $phone =$_POST["phone"];
    $currentDate = date("Y-m-d");







  #First Name
  if (empty($name))
  {
      $nameErr ='Please Enter First Name';

  }
    else if(is_numeric($name))
    {
      $nameErr ='First Name can not be numeric';
      
    }
       else
  {
      $nameErr= 'Your First Name is ' . $name;
   
  }
  echo '<br>';

  #Last Name
      if (empty ($name2))
  {
      $name2Err = 'Please Enter Last Name';
  } 
  else if(is_numeric($name2))
  {
    $name2Err ='Last Name can not be numeric';
  }
     else
  {
      $name2Err= 'Your Last Name is ' . $name2;
  }

  echo '<br>';

 
#Gender
if(!isset($_POST["gender"])) {
  $genderErr = 'You have not selected any Gender';
}
  if (isset($_POST["gender"]) )
      {
      if ($_POST["gender"]=="male") {
          $genderErr = 'You selected Male ';
       
      }
      else if ($_POST["gender"]=='female') {
          $genderErr = 'You selected Female';
       
      }
      else if($_POST["gender"]=='others'){
      $genderErr = 'You have selected Others';
      }
      $gender =   $_POST["gender"];
      
  } 
  
#Present Address
if(empty($street))
  {
      $preaddressErr = "You must enter Street Number";
  }
  else if($city == '0') 
  {
      $preaddressErr = "You must enter a City";
  }
  else if($postalcode == '0') 
  {
      $preaddressErr = "You must enter a Postal Code";
  }
  else
  {$presentaddress = $street.' , '.$city.' , '.$postalcode;
      $preaddressErr = "Address Stored";  }

  #Email
  if(empty($email))
  {
      $emailErr = "You must enter email";
  } 
  else if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))
  { $emailErr = "Wrong Pattern Email";} 
  else{
      $emailErr= "Your email is ".$email;
    echo '<br>';

  }

  #Birth
  $age = date_diff(date_create($dateofbirth), date_create($currentDate));
  if(empty($dateofbirth))
  {
      $dobErr = "Date of Birth is Empty";
  }
  
  else if($age->format('%y')<18)
  {
      $dobErr ="Age less than 18";
  }
  else 
  {
      $dobErr ="Your Date of Birth is ". $dateofbirth;
  }

 
  if (empty( $gname))
  {
      $gnameErr ='Please Enter Fathers Name';

  }
    else if(is_numeric( $gname))
    {
      $gnameErr ='Fathers Name can not be numeric';
      
    }
       else
  {
      $gnameErr= 'Your Fathers Name is ' .$gname;
   
  }

 

  #User Name
if(empty($username))
{
  $unameErr = "User Name Empty";
}
else if(!preg_match('/^[a-z][a-zA-Z0-9]{5,10}$/', $username))
{
$unameErr ="First Letter can not be Numeric.\n
Username can be alphanumeric.\n
Not longer than 10 and equal to or not less than 5 chars.\n
First character must be small. \n
Can not have special characters";
}
else
{
  $unameErr = "Valid Username";
}

#Password
  if(empty($password)||empty($confirmpassword))
  {
      $passErr="Password is empty";
      $cpassErr="Comfirm Password is empty";
  }
 
 else if(!preg_match('@[A-Z]@', $password)||!preg_match('@[a-z]@', $password)||!preg_match('@[0-9]@', $password)||!preg_match('@[^\w]@', $password)||strlen($password)<8)
  {
      $passErr='Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
  }
  
 else if(!preg_match('@[A-Z]@', $confirmpassword)||!preg_match('@[a-z]@',$confirmpassword)||!preg_match('@[0-9]@',$confirmpassword)||!preg_match('@[^\w]@', $confirmpassword)||strlen($confirmpassword)<8)
  {
      $cpassErr='Confirm Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
  }
 
 else if(strcmp($password,$confirmpassword))
  {
      $cpassErr="Password and Confrim Password doesn't match";
      #$password=" ";
  }
  else{
  
      
      $cpassErr= 'Strong password.';
      
  }
  
#Phone Nummber
if(empty($phone))    
{
$phnErr = "Enter Phone Number";
}
/*
else if(!is_numeric($phone))
{
  $phnErr = "Phone Number must be numeric";
}
*/

else if(!preg_match("/^[0-9]{5}-[0-9]{6}$/", $phone))
{
  $phnErr = "Phone Number format incorrect. Phone Number must be numeric";

}
else{
  $phnErr ="Valid Phone Number";
}


#profession

if (
    isset($_POST['acland']) ||
    isset($_POST['generalofficer']) ||
    isset($_POST['engineer'])) {
    if (isset($_POST['acland'])) {
        $proferr = 'Your Have Selected AcLand ';
        $profession =  $_POST['acland'];
        echo '<br>';
    }

    if (isset($_POST['generalofficer'])) {
        $proferr = 'Your Have Selected General Officer';
        $profession =  $_POST['generalofficer'];
        echo '<br>';
    }
    if (isset($_POST['engineer'])) {
        $proferr = 'Your Have Selected Engineer';
        $profession =  $_POST['engineer'];
        echo '<br>';
    }
}

  else {
    $proferr  = 'You Have not Selected a Profession';
    echo '<br>';
}








#NID
if(empty($nid))    
{
$nidErr = "Enter Nid Number";
}
else if(!is_numeric($nid))
{
  $nidErr = "Nid Number must be numeric";
}
else if(strlen($nid)>10 )
{
  $nidErr = "Nid Number must be less than 10";
}
else if(strlen($nid)<7)
{
  $nidErr = "Nid Number must be greater than 7";
}
else
{
  $nidErr = "Nid Number is Valid";
}

#C.V.

#############################################################################################
// if(move_uploaded_file($_FILES["cv"]["tmp_name"],"../uploads/".$_FILES["cv"]["name"]))
// { $filepath = "../uploads/".$_FILES["cv"]["name"];
//     $fileErr = "File Uploaded";
// }

// else
// $fileErr = 'Upload Error';

#################################################################################################

if(!file_exists($_FILES["cv"]["tmp_name"]))
{
    $fileErr= "Choose a File to upload";
}
else
{
  
    
    $allowed_file_extension = array(
        "pdf"
        
    );
    
    // Get image file extension
    $file_extension = pathinfo($_FILES["cv"]["name"], PATHINFO_EXTENSION);
    
    // Validate file input to check if is not empty
    // if (! file_exists($_FILES["cv"]["tmp_name"])) {
        
    //     $fileErr= "Choose PDf file to upload.";
        
    // }    // Validate file input to check if is with valid extension
    // else
     if (!in_array($file_extension, $allowed_file_extension)) {
        
        $fileErr= "Upload valid file. Only PDF is allowed.";
        
    }    // Validate image file size
    else if (($_FILES["cv"]["size"] > 5000000)) {
        
        $fileErr= "File size exceeds 5MB";
    
    }
    else {
       
        if (move_uploaded_file($_FILES["cv"]["tmp_name"],"../uploads/".$_FILES["cv"]["name"]))
        {
            $filepath = "../uploads/".$_FILES["cv"]["name"];
            $fileErr= "CV uploaded successfully.";
          
        }
        else
        {
            $fileErr= "Choose a file to upload";
          
        } 
    }
}

echo '<br>';
// #image
#################################################################################################
// if(move_uploaded_file($_FILES["img"]["tmp_name"],"../uploads/".$_FILES["img"]["name"]))
// { $imgpath = "../uploads/".$_FILES["img"]["name"];
//     $imgErr = "Image Uploaded";
// }

// else
// $imgErr = 'Image Upload Error';


################################################
if(empty($_FILES["img"]["tmp_name"]))
{
    $imgErr= "Choose a Picture to upload";
}
else
{
    $fileinfo = @getimagesize($_FILES["img"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    // Get image file extension
    $file_extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
    
    // Validate file input to check if is not empty
    if (! file_exists($_FILES["img"]["tmp_name"])) {
        
        $imgErr= "Choose image file to upload.";
        
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
        
            $imgErr= "Upload valid images. Only PNG and JPEG are allowed.";
        
    }    // Validate image file size
    else if (($_FILES["img"]["size"] > 5000000)) {
        
        $imgErr= "Image size exceeds 5MB";
    
    }    // Validate image file dimension
    else if ($width > "4000" || $height > "4000") {
       
        $imgErr= "Image dimension should be within 3000X3000";
        
    } else {
        // $target = "image/" . basename($_FILES["img"]["name"]);
        if (move_uploaded_file($_FILES["img"]["tmp_name"],"../uploads/".$_FILES["img"]["name"]))
        {
            $imgpath = "../uploads/".$_FILES["img"]["name"];
            $imgErr= "Image uploaded successfully.";
          
        }
        else
        {
            $imgErr= "Choose a file to upload";
          
        } 
    }
}









if(!empty($username)&&!empty($password) &&strcmp($password,$confirmpassword)==0){
    $mydb = new Govtofficial_DB();
        $connobj = $mydb->openConn();
        if ($mydb->insertUser(
            $connobj,
            "govt_officials",
            $_POST["fname"],
            $_POST["lname"],
            $gname,
           
            $presentaddress,
            $gender,
            $profession,
            $age->format('%y'),
            $password,
            $confirmpassword,
            $username,
            $email,
            $nid,
            $phone,
            $filepath,
            $imgpath
            
        ))  {
            $mydb->CloseCon($connobj);
            
            echo "succesful";
        } else {
            $mydb->CloseCon($connobj);
          
            echo "unable to register";
        }

//   $formdata = array(
//         'firstname'=>$_POST["fname"],
//         'lastname'=>$_POST["lname"],
//         'gender'=>$gender,
//         'age'=>$age->format('%y'),
//         'guardiansname'=>$gname,
//         'username'=>$username,
//         'pass'=>$password,
//         'email'=>$email,
//         'presentaddress'=>$presentaddress,
//         'profession'=> $profession,
//         'nid'=>$nid,
//         'phone'=>$phone,
//         'cvpath'=> $filepath,
//         'imgpath'=>$imgpath
        
    
//     );
//     $existingdata = file_get_contents('../data/data.json');
//     $tempJSONdata = json_decode($existingdata);
//     $tempJSONdata[] =$formdata;
    
    
//     $jsondata = json_encode($tempJSONdata, JSON_PRETTY_PRINT);
//     if(file_put_contents("../data/data.json",$jsondata))
//     {
//         $datasave= 'Data Successfully Saved';
//     }
//     else
//     $datasave=  'No Data Saved'; 
    
    } 
  }


?>