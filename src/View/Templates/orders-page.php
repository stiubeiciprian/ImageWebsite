<table class="table" id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Order Timestamp</th>
        <th scope="col">Order Tier ID</th>
    </tr>
    </thead>
    <tbody>
    <?php for ($i = 0; $i < count($ordersList); $i++): ?>
        <tr>
            <th scope="row"><?= $i +1?></th>
            <td><?= $ordersList[$i]->getTimeStamp(); ?></td>
            <td><?= $ordersList[$i]->getTierId(); ?></td>
        </tr>
    <?php endfor; ?>
    </tbody>
</table>