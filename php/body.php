 <?php require  ROOT . "/php/nav.php"; ?>
 <?php require  ROOT . "/php/create_dir.php" ?>
 <?php require  ROOT . "/php/upload.php"; ?>
 <?php if ($notFound) : ?>
     <section class="container-404">
         <img src="<?php echo ROOT ?>/assets/images/oops.png" alt="404" srcset="" class="error-img">
         <h5 class="error-msg">The directory/folder you are looking for was not found.</h5>
         <br />
         <a href="/" class="btn btn-danger" type="button">Back to home</a>
     </section>
 <?php elseif (count($files) > 0) :  ?>
     <form id="selectedItems" method="post">
         <?php require  ROOT . "/php/create_card.php" ?>
         <?php require  ROOT . "/php/rename.php" ?>
     </form>
     <div class="drag-n-drop hide">
         <div class="inner-border">
             <img src="<?php echo ROOT ?>/assets/images/upload.png" alt="">
             <h3>Drop your files here!</h3>
         </div>
     </div>

     <?php require  ROOT . "/php/delete.php" ?>
 <?php else : ?>
     <section class="container-404">
         <img src="<?php echo ROOT ?>/assets/images/data-not-found.png" class="error-img" alt="404" srcset="">
         <h5 class="error-msg">No Items in this folder.</h5>
         <br />
         <button class="btn btn-success" style="width: 200px;" data-bs-toggle="modal" data-bs-target="#createDir">New Folder</button>
         <br />
         <button class="btn btn-primary" style="width: 200px;" data-bs-toggle="modal" data-bs-target="#uploadModel">Upload</button>
     </section>
 <?php endif ?>

 <script src="<?php echo ROOT ?>/scripts/main.js"></script>