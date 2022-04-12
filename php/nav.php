<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
            <button class="btn btn-primary upload-btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Show Stats
            </button>

            <button class="btn btn-success upload-btn" data-bs-toggle="modal" data-bs-target="#createDir">New Folder</button>

            <button class="btn btn-danger upload-btn" data-bs-toggle="modal" data-bs-target="#uploadModel">Upload</button>

            <form class="d-flex">
                <input class="form-control me-2 bg-search" type="search" name="s" placeholder="Search" autocomplete="off" aria-label="Search">
                <input type="hidden" name="dir" value="<?php echo $ROOT_PATH; ?>">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<div class="padding__bottom"></div>


<div class="modal" id="createDir" tabindex=" -1">
    <div class="modal-dialog modal-dialog-centered ">
        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST" id="form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Folder</h5>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">&times; </button>
                </div>
                <div class="modal-body">
                    <!-- <p>Upload file.</p> -->
                    <input class="form-control me-2 bg-search" autocomplete="off" type="text" placeholder="Directory Name" name="dirname" aria-label=dirname">
                    &nbsp;
                    <div style="display: flex; align-items: center;">
                        <input type="checkbox" name="navigate" value="true" id="navigate" checked style="height: 20px;width: 20px;cursor: pointer;">
                        <label style="cursor: pointer;" for="navigate">&nbsp;Navigate to newly created folder.</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>