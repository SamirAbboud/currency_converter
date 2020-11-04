<?php
include_once 'db/config.php';

include './inc/layout/header.php';

$sql = "SELECT * FROM conversions ORDER BY id DESC LIMIT 10";
$query = $conn->prepare($sql);
$query->execute();
$rows = $query->fetchAll(PDO::FETCH_ASSOC);
$totalRows = $query->rowCount();
?>


    <div class="d-flex bd-highlight">
        <h1 class="flex-grow-1">Last Conversions</h1>
        <div class="align-self-center">
            <a href="new.php" class="btn btn-primary">New Conversion</a>
        </div>
    </div>


<?php if ($totalRows > 0) : ?>
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
        <?php foreach ($rows as $row) : ?>
            <tr>
                <th scope="row"><?= $row['id'] ?></th>
                <td><?= $row['source'] ?></td>
                <td><?= $row['target'] ?></td>
                <td><?= $row['amount'] ?></td>
                <td><?= $row['result'] ?></td>
                <td><?= $row['created_date'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p class="text-center">No conversions yet</p>
<?php endif ?>

<?php include './inc/layout/footer.php' ?>