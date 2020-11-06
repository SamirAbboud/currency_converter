<?php if (isset($errors) && count($errors) > 0) : ?>
<div class="row justify-content-center mt-2">
    <div class="col-md-6">
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <?= $error ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>
