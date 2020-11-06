<?php include 'layout/header.php' ?>

<div class="d-flex bd-highlight">
    <h1 class="flex-grow-1">Last Conversions</h1>
    <div class="align-self-center">
        <a href="convert" class="btn btn-primary">New Conversion</a>
    </div>
</div>

<?php if (count($conversions) > 0) : ?>
    <table class="table mt-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Source</th>
            <th scope="col">Target</th>
            <th scope="col">Amount</th>
            <th scope="col">Result</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($conversions as $conversion) : ?>
            <tr>
                <th scope="row"><?= $conversion->id ?></th>
                <td><?= $conversion->source ?></td>
                <td><?= $conversion->target ?></td>
                <td><?= $conversion->amount ?></td>
                <td><?= $conversion->result ?></td>
                <td><?= $conversion->created_date ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p class="text-center">No conversions yet</p>
<?php endif ?>

<?php include 'layout/footer.php' ?>