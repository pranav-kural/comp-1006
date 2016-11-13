<style>
  body {
    background-color: #0BA1D8;
  }
</style>
<div class="container">
  <h1 class="page-header"><?= $movie->name ?></h1>
  <?php if ( is_authenticated() ): ?>
    <p><a href="../actors/?action=create"><i class="fa fa-plus">&nbsp;</i>Add new Actors</a></p>
  <?php endif ?>

  <?php if ( $movie->actors ): ?>
    <table class="ui inverted red table">
      <thead>
        <tr>
          <th>Thumbnail</th>
          <th>Name</th>
          <th>Role</th>
          <?php if ( is_authenticated() ): ?>
            <th>Edit</th>
            <th>Delete</th>
          <?php endif ?>
        </tr>
      </thead>

      <tbody>

        <?php foreach ( $movie->actors as $actor ): ?>
          <tr>
            <td>
              <?php if ( !empty( $actor->image ) ): ?>
                <img style="max-width: 100px; max-height: 100px;" class="img-thumbnail" src="../uploads/images/<?= $actor->image ?>" alt="Product Image">
              <?php endif ?>
            </td>
            <td><?= $actor->name ?></td>
            <td><?= $actor->role ?></td>
            <?php if ( is_authenticated() ): ?>
              <td><a href="../actors/index.php?action=edit&id=<?= $actor->id ?>"><i class="fa fa-pencil"></i></a></td>
              <td>
                <form action="../actors/controller.php">
                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="id" value="<?= $actor->id ?>">
                  <button type="submit" style="border: none; background: none; color: #337ab7; padding: 0; margin: 0;" onclick="return confirm('Are you sure you want to delete <?= $actor->name ?>')"><i class="fa fa-remove"></i></button>
                </form>
              </td>
            <?php endif ?>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  <?php endif ?>
</div>