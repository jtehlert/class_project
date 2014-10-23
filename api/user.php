<?php

/**
 * Fetches a user's info using their id.
 *
 * @param int $id
 *  The user's id.
 *
 * @return null|object
 *  Returns the user object or NULL if no result was found.
 */
function getUserById($id) {
  require_once(dirname(__FILE__) . '/../helpers/database_helper.php');

  $sql = sqlSetup();
  $query = "SELECT * FROM USERS WHERE ID=$id";
  $result = mysqli_query($sql, $query);
  $obj = mysqli_fetch_object($result);
  return $obj;
}

/**
 * Fetches a user's info using their email.
 *
 * @param string $email
 *  The user's email.
 *
 * @return null|object
 *  Returns the user object or NULL if no result was found.
 */
function getUserByEmail($email) {
  require_once(dirname(__FILE__) . '/../helpers/database_helper.php'); 

  $sql = sqlSetup();
  $query = "SELECT * FROM USERS WHERE EMAIL='$email'";
  $result = mysqli_query($sql, $query);
  $obj = mysqli_fetch_object($result);
  return $obj;
}

function updateUser($user) {
  // TODO: Add update user functionality.
}
