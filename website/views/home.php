<table class="table table-striped" >
  <thead>
  <tr> 
    <td><button type="button" class="btn btn-primary">New Note</button></td>
    <td align="right" ><button type="button" class="btn btn-danger">Log Out</button></td>
  </tr>
  </thead>
  <tbody>
      <?php foreach ($notes as $note) { ?>
          <tr> 
            <td><?php echo $note["Header"] ?></td>
            <td align="right" ><button type="button" class="btn btn-primary">Edit</button>
              <button type="button" class="btn btn-danger">Delete</button></td>
          </tr>
          <tr> 
            <td colspan="2"><?php echo $note["Note"] ?></td>
          </tr>
      <?php } ?>
  </tbody>
</table>


