<?php

require_once(dirname(__FILE__) . '/../../comment.php');

if (isset($_GET['cid'])) {

  $comments = getCommentsByClippingId($_GET['cid']);

  // Check if the requester wants the commenter's name.
  if (isset($comments) && isset($_GET['name']) && ($_GET['name'] == 'true')) {
    require_once(dirname(__FILE__) . '/../../user.php');
    foreach ($comments as &$comment) {
      $user = getUserById($comment->UID);
      $comment->FNAME = $user->FNAME;
      $comment->LNAME = $user->LNAME;
    }
  }
  print(json_encode($comments));
}
else {
  echo json_encode(array(400 => "Invalid arguments"));
}
