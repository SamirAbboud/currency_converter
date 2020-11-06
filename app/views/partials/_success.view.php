<?php if (isset($success)) : ?>
<div class="row justify-content-center mt-2">
    <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show">
                <?= $success ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    </div>
</div>
<?php endif; ?>
