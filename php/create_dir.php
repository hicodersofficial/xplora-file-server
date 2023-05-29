<div class="modal" id="createDir" tabindex=" -1">
    <div class="modal-dialog modal-dialog-centered">
        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST" id="form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Folder</h5>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">&times; </button>
                </div>
                <div class="modal-body">
                    <!-- <p>Upload file.</p> -->
                    <input class="form-control me-2 bg-search" autocomplete="off" type="text" placeholder="Directory Name" name="dirname" aria-label=dirname" />
                    &nbsp;
                    <div style="display: flex; align-items: center;">
                        <input type="checkbox" name="navigate" value="true" id="navigate" checked style="height: 20px;width: 20px;cursor: pointer;" />
                        <label style="cursor: pointer;" for="navigate">&nbsp;Navigate to newly created folder.</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>