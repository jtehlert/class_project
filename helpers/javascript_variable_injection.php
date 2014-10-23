<?php
// Save the user's UID.
$uid = $_SESSION['current_user'];
?>
<script>
  var JSIuid = <?php print($uid) ?>;
</script>