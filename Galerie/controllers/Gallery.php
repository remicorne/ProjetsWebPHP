<?php
class Gallery extends Controller {
  public function index() {
    $this->albums();
  }
  
  public function albums() {
    $this->loader->load('albums', ['title'=>'Albums', 'albums'=>$this->gallery->albums()]);
  }

  public function albums_new() {
    $this->loader->load('albums_new', ['title'=>'Création d\'un albumf']);
  }
  
  public function albums_create() {
    try {
      $album_name = filter_input(INPUT_POST, 'album_name');
      $this->gallery->create_album($album_name);
      header('Location: /index.php/gallery/albums'); /* redirection du client vers la liste des albums. */
    } catch (Exception $e) {
      $this->loader->load('albums_new', ['title'=>'Création d\'un album', 'error_message' => $e->getMessage()]);
    }
  }
  
  public function albums_delete($album_name) {
    try {
      $name = filter_var($album_name);
      $this->gallery->delete_album($name);
    } catch (Exception $e) { }
    header('Location: /index.php/gallery/albums');
  }

  public function albums_show($album_name) {
    try {
      $name = filter_var($album_name);
      $this->loader->load('albums_show', 
                          ['title'=>$name, 
                           'album'=>$name,
                           'photos'=>$this->gallery->photos($name)]);
    } catch (Exception $e) {
      header("Location: /Gallerie/index.php/gallery/albums");
    }
  }
  
  public function photos_new($album_name) {
    try {
      $name = filter_var($album_name);
      $this->loader->load('photos_new', 
                        ['title'=>'Add new photo',
                        'album'=>$name,
                        'album_name'=>$name]);
    }
    catch (Exception $e) { header("Location: /Gallerie/index.php/gallery/albums");}
  }

  public function photos_add($album_name) {
    try {
      $name = filter_var($album_name);
      $this->gallery->check_if_album_exists($name);
    } catch (Exception $e) { header("Location: /index.php"); }
    try {
      $photo_name = filter_input(INPUT_POST, 'photo_name');
      if (!isset($_FILES['photo']) || $_FILES['photo']['error'] !== UPLOAD_ERR_OK) {     
        throw new Exception('Vous devez choisir une photo.');
        }
      $this->gallery->add_photo($album_name, $photo_name, $_FILES['photo']['tmp_name']);
      header("Location: /index.php/gallery/albums_show/$album_name");
    } catch (Exception $e) {
      $this->loader->load('photos_new', ['album_name'=>$album_name, 'album'=>$name,
                          'title'=>"Ajout d'une photo dans l'album $album_name", 
                                 'error_message' => $e->getMessage()]);
    }
  }
  
  public function photos_delete($album_name, $photo_name) {
    try {
      $name = filter_var($album_name);
      $photo_name = filter_var($photo_name);
      $this->gallery->delete_photo($album_name, $photo_name);
      $this->gallery->check_if_album_exists($album_name);
      $this->albums_show($album_name);
    } catch (Exception $e) { header("Location: /index.php"); }
  }
  
  public function photos_show($album_name, $photo_name) {
    try {
      $album_name = filter_var($album_name);
      $photo_name = filter_var($photo_name);
      $this->loader->load('photos_show', ['title'=>"$album_name / $photo_name",
          'album'=>$album_name,
          'photo'=>$this->gallery->photo($album_name, $photo_name)
      ]);
    } catch (Exception $e) {
      header("Location: /index.php");
    }
  }
}


?>