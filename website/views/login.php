<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <strong><a class="navbar-brand" href="/login">Login</a></strong>
  <a class="navbar-brand" href="/register">Register</a>
</nav>
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