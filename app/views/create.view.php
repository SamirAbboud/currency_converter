<?php
include 'layout/header.php';

include "partials/_errors.view.php";
include "partials/_success.view.php";
?>


<h2 class="text-center">New currency conversion:</h2>
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <form method="post" action="convert">
            <div class="form-group">
                <label for="source_currency">Source Currency</label>
                <select class="form-control select2" id="source_currency" name="source_currency" required>
                    <option></option>
                    <?php foreach ($symbols as $key => $value) : ?>
                        <option <?= isset($source_currency) && $key == $source_currency ? 'selected' : '' ?>
                                value="<?= $key ?>"><?= $value ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="target_currency">Target Currency</label>
                <select class="form-control select2" id="target_currency" name="target_currency" required>
                    <option></option>
                    <?php foreach ($symbols as $key => $value) : ?>
                        <option <?= isset($target_currency) && $key == $target_currency ? 'selected' : '' ?>
                                value="<?= $key ?>"><?= $value ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter Amount"
                       required step="0.01" min="0" value="<?= $amount ?? '' ?>">
            </div>
            <button type="submit" class="btn btn-primary mt-3 mr-3">Convert</button>
            <a href="/" class="btn btn-outline-secondary mt-3">Back</a>
        </form>
    </div>
</div>

<?php include 'layout/footer.php' ?>