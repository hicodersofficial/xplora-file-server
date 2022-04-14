<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="navbar-brand">
            <a href="/">
                <img src="/app/logo.png" width="30" /> <span>Server </span>
            </a>
            <span class="path"><?php echo  strlen($ROOT_PATH) > 60 ? "..." .   substr($ROOT_PATH, strlen($ROOT_PATH) - 60) : $ROOT_PATH; ?></span>
            <span class="path-mobile">
                <?php echo  strlen($ROOT_PATH) > 29 ? "..." .   substr($ROOT_PATH, strlen($ROOT_PATH) - 30) : $ROOT_PATH; ?>
            </span>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
            </ul>
            <button class="btn btn-outline-light upload-btn disabled" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download" id="download">
                <i class="bi bi-cloud-download-fill"></i>
            </button>
            <button class="btn btn-outline-light upload-btn disabled" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download Zip" id="zip">
                <i class="bi bi-file-earmark-zip-fill"></i>
            </button>
            <a class="btn btn-outline-danger disabled upload-btn" id="deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModel" role="button" aria-disabled="true">
                <i data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" class="bi bi-trash-fill"></i>
            </a>
            <a class="btn btn-outline-warning disabled upload-btn" data-bs-toggle="modal" data-bs-target="#renameFiles" id="renameBtn" role="button" aria-disabled="true">
                <i title="Rename" data-bs-placement="bottom" data-bs-toggle="tooltip" class="bi bi-input-cursor-text"></i>
            </a>
            <button class="btn btn-outline-info upload-btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i data-bs-toggle="tooltip" data-bs-placement="bottom" title="Files Info" class="bi bi-info-circle"></i>
            </button>

            <button class="btn btn-outline-secondary upload-btn check-all" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Select All" type="button" id="selectAll">
                <i class="bi bi-check2-all"></i>
            </button>

            <button class="btn btn-outline-success upload-btn" title="New Folder" data-bs-toggle="modal" data-bs-target="#createDir">
                <i data-bs-toggle="tooltip" data-bs-placement="bottom" title="New Folder" class="bi bi-folder-plus">

                </i></button>

            <button class="btn btn-outline-primary upload-btn" data-bs-toggle="modal" data-bs-target="#uploadModel" title="Upload"> <i data-bs-toggle="tooltip" data-bs-placement="bottom" title="Upload" class="bi bi-upload"></i></button>

            <form class="d-flex">
                <input class="form-control me-2 bg-search" type="search" name="s" placeholder="Search" autocomplete="off" aria-label="Search">
                <input type="hidden" name="dir" value="<?php echo $ROOT_PATH; ?>">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<!-- <div class="padding__bottom"></div> -->