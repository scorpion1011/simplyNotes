<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/login">Login</a>
  <strong><a class="navbar-brand" href="/register">Register</a></strong>
</nav>
<form action="/registeruser" method="post">
  <div class="form-group">
    <label for="login">Login:</label>
    <input type="text" class="form-control" name="login" required>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="/" class="btn btn-danger">Cancel</a>
</form>