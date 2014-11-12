<?php

if (isset($_GET['fname']) && isset($_GET['lname']) && isset($_GET['content'])) {
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];
  $content = $_GET['content'];

  $markup = "<div class=\"comment-row\">
        <h4 class=\"comment-header\">$fname $lname Commented</h4>
        <p class=\"comment-body\">$content</p>
      </div>";
  print $markup;
}
else {
  echo json_encode(array(400 => "Invalid arguments"));
}
