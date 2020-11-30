<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Home</a>
  <strong><a class="navbar-brand" href="/edit<?php if(isset($note)) { echo "/" . $note["Id"]; } ?>">
    <?php if(isset($note)) { echo "Edit"; } else { echo "New Note"; }?></a><strong>
</nav>
<form action="/save<?php if(isset($note)) { echo "/" . $note["Id"]; } ?>" method="post">
  <div class="form-group">
    <label for="header">Header:</label>
    <input type="text" class="form-control" name="header" value="<?php if(isset($note)) {
      echo $note["Header"];
    } ?>">
  </div>
  <div class="form-group">
    <label for="note">Note:</label>
    <input type="text" class="form-control" name="note" value="<?php if(isset($note)) {
      echo $note["Note"];
    } ?>">
    
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="/" class="btn btn-danger">Cancel</a>
</form>