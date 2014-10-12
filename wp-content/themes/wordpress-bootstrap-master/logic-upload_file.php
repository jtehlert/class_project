<?php
/*
Template Name: logic-upload_file
*/
?>
<?php
// Start the session.
session_start();

$target_path = 'uploads/';
$target_path = $target_path . basename( $_FILES['file']['tmp_name']);

if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
  echo "The file " . basename( $_FILES['file']['tmp_name']) . " has been uploaded";
} else{
  echo "There was an error uploading the file, please try again!";
}

?>
