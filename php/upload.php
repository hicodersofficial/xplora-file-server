<div class="modal" id="uploadModel" tabindex=" -1">
    <div class="modal-dialog modal-dialog-centered ">
        <form method="POST" id="form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload</h5>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">&times; </button>
                </div>
                <div class="modal-body">
                    <!-- <p>Upload file.</p> -->
                    <input class="form-control me-2 bg-search" type="Custom Filename" placeholder="Custom Filename" name="filename" aria-label="Custom Filename" />
                    &nbsp;
                    <button class="btn btn-success" type="button" onclick="this.children[0].click()" style="width: 100%;">
                        <input type="file" name="file[]" multiple id="file" style="display: none;" />
                        Choose files
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>