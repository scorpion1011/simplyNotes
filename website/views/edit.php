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