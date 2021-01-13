<?php
session_start();
session_unset();
#header('../index.php');
?>
<script type="text/javascript">
    document.location = "../index.php";
</script>