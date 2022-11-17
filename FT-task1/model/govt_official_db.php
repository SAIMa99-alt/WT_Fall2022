<?php

class Govtofficial_DB
{


    function openConn()
    {

        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "e_gov";
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

        return $conn;
    }



    function insertUser($conn, $tableName, $First_Name, $Last_Name,$Guardian_Name, $Present_Address, $Gender, $Profession, $Date_of_Birth, $Password, $Confirm_Password, $User_Name, $Email , $NID_Number , $Phone, $CV)
    
    {

        $sql_string = "INSERT INTO $tableName (First_Name,Last_Name,Guardian_Name,Present_Address,Gender,Profession,Date_of_Birth,Password,Confirm_Password,User_Name,Email,NID_Number,Phone,CV) VALUES ('$First_Name','$Last_Name','$Guardian_Name','$Present_Address','$Gender','$Profession','$Date_of_Birth','$Password','$Confirm_Password','$User_Name','$Email','$NID_Number','$Phone','$CV')";

        if ($conn->query($sql_string) === true) {

            return true;
        } else {
            return false;
        }
    }






    function CheckUser($conn, $table, $User_Name, $password)
    {
        $result = $conn->query("SELECT * FROM " . $table . " WHERE User_Name='" . $User_Name. "' AND Password='" . $password . "'");
        return $result;
    }


    function ShowAll($conn, $table)
    {
        $result = $conn->query("SELECT * FROM  $table");
        return $result;
    }

    // function UpdateUser($conn, $table, $username, $firstname, $email)
    // {
    //     $sql = "UPDATE $table SET firstname='$firstname', email='$email' WHERE username='$username'";

    //     if ($conn->query($sql) === TRUE) {
    //         $result = TRUE;
    //     } else {
    //         $result = FALSE;
    //     }
    //     return  $result;
    // }

    function CloseCon($conn)
    {
        $conn->close();
    }
}

?>