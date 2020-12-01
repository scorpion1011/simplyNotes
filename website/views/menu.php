<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <?php
    if (!array_key_exists('user', $_SESSION)) {
        ?> 
          <a class="navbar-brand <?php if ($page == 'login') { echo 'font-weight-bold'; }?>" href="/login">Login</a>
          <a class="navbar-brand <?php if ($page == 'register') { echo 'font-weight-bold'; }?>" href="/register">Register</a>
        <?php
    }
    else {
        ?>
          <a class="navbar-brand <?php if ($page == 'home') { echo 'font-weight-bold'; }?>" href="/">Home</a>
          <a class="navbar-brand <?php if ($page == 'new_note') { echo 'font-weight-bold'; }?>" href="/edit">New Note</a>
        <?php 
          if (isset($noteId)) { 
        ?>
          <a class="navbar-brand <?php if ($page == 'edit') { echo 'font-weight-bold'; }?>" href="/edit/<?php echo $noteId; ?>">Edit Note</a>
        <?php 
          }
    }
    ?>
    <a class="navbar-brand btn-danger navbar-right" href="/logout">Log Out</a>
</nav>