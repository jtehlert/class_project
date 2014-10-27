<?php

require_once(dirname(__FILE__) . '/../user.php');

if (isset($_GET['id'])) {
  print(json_encode(getUserById($_GET['id'])));
} elseif (isset($_GET['email'])) {
  print(json_encode(getUserByEmail($_GET['email'])));
} elseif (isset($_GET['all']) && $_GET['all'] == TRUE) {
  print(json_encode(getAllUsers()));
} else {
  echo json_encode(array('400' => 'Invalid arguments'));
}
