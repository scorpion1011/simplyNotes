<?php
require_once '../views/menu.php';
require_once '../views/message.php';
?>
<form action="/save<?php if(isset($note)) { echo "/" . $note["Id"]; } ?>" method="post">
  <div class="form-group">
    <label for="header">Header:</label>
    <input type="text" class="form-control" id="header" name="header" value="<?php if(isset($note)) {
      echo $note["Header"];
    } ?>">
  </div>
  <div class="form-group">
    <label for="note">Note:</label>
    <textarea class="form-control" id="note" name="note" rows="5" style="resize: vertical;"><?php if(isset($note)) { echo $note["Note"]; } ?>
    </textarea>
    
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="/" class="btn btn-danger">Cancel</a>
</form>