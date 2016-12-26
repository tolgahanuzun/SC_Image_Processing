<?php
 
// Path to move uploaded files
$target_path = "uploads/";
 
// array for final json respone
$response = array();
 
// getting server ip address
$server_ip = gethostbyname(gethostname());
  

if (isset($_FILES['image']['name'])) {
    $target_path = $target_path . basename($_FILES['image']['name']);
 
    // reading other post parameters
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $website = isset($_POST['website']) ? $_POST['website'] : '';
 
    $response['file_name'] = basename($_FILES['image']['name']);
    $response['email'] = $email;
    $response['website'] = $website;

if($email=='uygulamadaki-mail@gmail.com'){
$host    = "Sunucununipadresi";
$port    = 8080;
// create socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
// connect to server
socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
socket_close($socket);
}

    try {
        // Throws exception incase file is not being moved
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            // make error flag true
            $response['error'] = true;
            $response['message'] = 'Could not move the file!';
        }
 
        // File successfully uploaded
        $response['message'] = 'File uploaded successfully!';
        $response['error'] = false;
        $response['file_path'] = $file_upload_url . basename($_FILES['image']['name']);





    } catch (Exception $e) {
        // Exception occurred. Make error flag true
        $response['error'] = true;
        $response['message'] = $e->getMessage();
    }
} else {
    // File parameter is missing
    $response['error'] = true;
    $response['message'] = 'Not received any file!F';
}
 



echo json_encode($response);


?>