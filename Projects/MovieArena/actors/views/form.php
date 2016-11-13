<form action="controller.php" method="post" enctype="multipart/form-data">
  
  <fieldset>
    <legend>Actor's Details</legend>

    <div class="form-group">
      <label for="name">Name</label>
      <input class="form-control" type="text" name="name" maxlength="100" required value="<?= isset( $actor ) ? $actor->name : '' ?>">
    </div>

    <div class="form-group">
      <label for="name">Role</label>
      <input class="form-control" type="text" name="name" maxlength="100" required value="<?= isset( $actor ) ? $actor->role : '' ?>">
    </div>

    <div class="form-group">
      <label for="movie_id">Movie</label>
      <select class="form-control" name="movie_id" required>
        <option value="">...select a movie...</option>
        <?php foreach ($movies as $movie ): ?>
          <option value="<?= $movie->id ?>" <?= isset( $actor ) && $actor->movie->id == $movie->id ? 'selected' : '' ?>><?= $movie->name ?></option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="form-group">
      <input type="hidden" name="MAX_FILE_SIZE" value="30000">
      <label for="image">Upload Image</label>
      <input type="file" name="image">
    </div>

    <div class="form-group">
      <input type="hidden" name="action" value="<?= isset( $action ) ? $action : 'add' ?>">

      <?php if ( isset( $action ) && $action == 'update' ): ?>
        <input type="hidden" name="current_image" value="<?= isset( $actor->image ) ? $actor->image : '' ?>">
        <input type="hidden" name="id" value="<?= $actor->id ?>">
        <button type="submit" class="btn btn-danger"><i class="fa fa-pencil">&nbsp;</i>Update Product</button>
      <?php else: ?>
        <button type="submit" class="btn btn-danger"><i class="fa fa-plus">&nbsp;</i>Add Product</button>
      <?php endif ?>
    </div>
  </fieldset>

</form>