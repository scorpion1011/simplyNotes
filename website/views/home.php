<table class="table table-striped" >
  <thead>
  <tr> 
    <td><a href="/edit" class="btn btn-primary">New Note</a></td>
    <td align="right" ><button type="button" class="btn btn-danger">Log Out</button></td>
  </tr>
  </thead>
  <tbody>
      <?php foreach ($notes as $note) { ?>
          <tr> 
            <td><?php echo $note["Header"] ?></td>
            <td align="right" >
                <a href="/edit/<?php echo $note["Id"]?>" class="btn btn-primary">Edit</a>
                <a href="/delete/<?php echo $note["Id"]?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          <tr> 
            <td colspan="2"><?php echo $note["Note"] ?></td>
          </tr>
      <?php } ?>
  </tbody>
</table>


