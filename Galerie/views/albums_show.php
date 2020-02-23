<div class="row">
  <?php foreach ($photos as $photo) { ?>
    <div class="col-sm-3 col-md-3">
      <div class="thumbnail">
      <?php if ($user_id === $user->id) {  ?>
        <a class="close" href="/index.php/gallery/photos_delete/<?=$album?>/<?=$photo['photo_id']?>/<?=$user_id?>">×</a>
      <?php } ?>
        <br> <br> 
        <a style="height: 200px; width: 400px; display: table-cell; vertical-align: middle; text-align: center;"
           href="/index.php/gallery/photos_get/<?=$photo['photo_id']?>">
          <img src="/index.php/gallery/photos_get/<?=$photo['photo_id']?>?thumbnail" alt="<?=$photo['photo_name']?>">
        </a>
        <div class="caption text-center"><?=$photo['photo_name']?><br></div>
      </div>
    </div>
  <?php } ?>
</div>
<?php if ($user_id === $user->id) {  ?>
<a href="/index.php/gallery/photos_new/<?=$album?>/<?=$user_id?>"  class="btn btn-primary" role="button">Ajouter une photo</a>
<?php } ?>
<a href="/index.php" class="btn btn-danger" role="button">Revenir à la liste des albums</a>