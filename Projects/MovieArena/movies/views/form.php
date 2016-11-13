<form action="controller.php" method="post">
  
  <fieldset>
    <legend>Movie Details</legend>

    <div class="form-group">
      <label for="name">Name</label>
      <input class="form-control" type="text" name="name" id="name" value="<?= isset( $movie ) ? $movie->name : '' ?>" required maxlength="100">
    </div>

    <div class="form-group">
      <label for="release_year">Release Year</label>
      <select class="form-control" name="release_year" id="release_year">
        <option value="" selected disabled>Select Year</option>
        <?php for($i = 2016; $i > 1980; $i--) { ?>
          <option value="<?= $i ?>"><?= $i ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group">
      <input type="hidden" name="action" value="<?= isset( $action ) ? $action : 'add' ?>">

      <?php if ( isset( $action ) && $action == 'update' ): ?>
        <input type="hidden" name="id" value="<?= $movie->id ?>">
        <button type="submit" class="btn btn-danger"><i class="fa fa-pencil">&nbsp;</i>Update Movie</button>
      <?php else: ?>
        <button type="submit" class="btn btn-danger"><i class="fa fa-plus">&nbsp;</i>Add Movie</button>
      <?php endif ?>
    </div>
  </fieldset>

</form>