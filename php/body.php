 <?php require_once "/app/php/nav.php"; ?>
 <?php if ($notFound) : ?>
     <section class="container-404">
         <img src="/app/assets/images/oops.png" alt="404" srcset="" class="error-img">
         <h5 class="error-msg">The directory/folder you are looking for was not found.</h5>
         <br />
         <a href="/" class="btn btn-danger" type="button">Back to home</a>
     </section>
 <?php elseif (count($files) > 0) :  ?>
     <form id="selectedItems" method="post">
         <?php require_once "/app/php/create_card.php" ?>
         <?php require_once "/app/php/rename.php" ?>
     </form>
     <?php require_once "/app/php/create_dir.php" ?>
     <?php require_once "/app/php/upload.php"; ?>
     <?php require_once "/app/php/delete.php" ?>
 <?php else : ?>
     <section class="container-404">
         <img src="/app/assets/images/data-not-found.png" class="error-img" alt="404" srcset="">
         <h5 class="error-msg">No Items in this folder.</h5>
         <br />
         <button class="btn btn-success" style="width: 200px;" data-bs-toggle="modal" data-bs-target="#createDir">New Folder</button>
         <br />
         <button class="btn btn-primary" style="width: 200px;" data-bs-toggle="modal" data-bs-target="#uploadModel">Upload</button>
     </section>
 <?php endif ?>

 <script src="/app/scripts/main.js"></script>