<?php
class customer
{
    private $connectionObject;

    public function __construct()
    {
        // Connect to the database
        $DBHostname = "localhost";
        $DBusername = "root";
        $DBPassword = "";
        $DBname = "customer";

        $this->connectionObject = new mysqli($DBHostname, $DBusername, $DBPassword, $DBname);

        if ($this->connectionObject->connect_error) {
            die("ERROR CONNECTING TO DB: " . $this->connectionObject->connect_error);
        }
    }

    public function insertData($table, $u_name, $mail, $pass, $ph_num, $shipping_address, $pcode, $PM, $GD, $dob, $confirm_password)
    {
        // SQL query to insert data into the database
        $sql = "INSERT INTO $table (username, password, confirmpassword, email, phone_number, shipping_address, postal_code, payment_method, gender, dob) 
                VALUES ('$u_name', '$pass', '$confirm_password', '$mail', '$ph_num', '$shipping_address', '$pcode', '$PM', '$GD', '$dob')";

        // Execute the query and handle success or error
        if ($this->connectionObject->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $this->connectionObject->error;
        }
    }

    // Close the connection when done
    public function __destruct()
    {
        $this->connectionObject->close();
    }
}
?>
