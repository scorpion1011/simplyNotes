<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <strong><a class="navbar-brand" href="/login">Login</a></strong>
</nav>
<form action="/loginuser" method="post">
  <div class="form-group">
    <label for="login">Login:</label>
    <input type="text" class="form-control" name="login">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password">
    
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="/register" class="btn btn-danger">Register</a>
</form>