<?php
session_start();
if (!$_SESSION['current_user']) {
  $host = $_SERVER['HTTP_HOST'];
  $extra = 'login.php';
  header("location: http://$host/$extra");
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/wordpress/api/file.php');

// Get the user's info.
$uid = $_SESSION['current_user'];

// Get file info.
$file = $_FILES['file'];
$name = $file['name'][0];
$type = $file['type'][0];
$tmp_name = $file['tmp_name'][0];

// See if there is already a file by this name. If so, append a unique id.
$id = 0;
while(getFileByName($name)) {
  $name = $file['name'][0];
  $id += 1;
  $name = $id . '-' . $name;
}

// Store the file info in the database and get the file's new unique id.
$fid = storeFile($name, $type, $uid);

// Move the temp file to our storage directory.
$target_path = $_SERVER['DOCUMENT_ROOT'] . '/wordpress/uploads/' . $name;

if(move_uploaded_file($tmp_name, $target_path)) {
  print json_encode(array(200 => 'success', 'fname' => $name, 'fid' => $fid));
} else{
  echo "There was an error uploading the file, please try again!";
}
