<?php

require_once(dirname(__FILE__) . '/../user.php');

if (isset($_GET['uid'])) {
  echo json_encode(getUserNotification($_GET['uid']));
  unsetUserNotification($_GET['uid']);
} else {
  echo json_encode(array(400 => "Invalid arguments"));
}
