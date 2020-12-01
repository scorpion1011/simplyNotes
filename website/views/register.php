<?php
require_once '../views/menu.php';
require_once '../views/message.php';
?>
<form action="/registeruser" method="post">
  <div class="form-group">
    <label for="login">Login:</label>
    <input type="text" class="form-control" id="login" name="login" required>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="/" class="btn btn-danger">Cancel</a>
</form>