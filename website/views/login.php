<?php
$page = 'login';
require_once '../views/menu.php';
require_once '../views/message.php';
?>
<form action="/loginuser" method="post">
  <div class="form-group">
    <label for="login">Login:</label>
    <input type="text" class="form-control" id="login" name="login">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" name="password">
    
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>