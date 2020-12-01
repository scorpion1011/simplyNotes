<?php

if (array_key_exists('error', $_SESSION)) {
    ?> 
    <div class="alert alert-danger" role="alert"> <?php echo $_SESSION['error']; ?> </div> 
    <?php 
        unset($_SESSION['error']);
}
if (array_key_exists('message', $_SESSION)) {
    ?>
    <div class="alert alert-success" role="alert"> <?php echo $_SESSION['message']; ?> </div> 
    <?php 
        unset($_SESSION['message']);
}