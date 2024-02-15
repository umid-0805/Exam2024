<?php

/**@var common\models\ExamUser $model */

// Tugri va xato javoblar sonini hisoblash
$tugri_soni = 0;
$xato_soni = 0;

foreach ($model as $value) {
    if ($value->option->status == 1) {
        $xato_soni++;
    } else {
        $tugri_soni++;
    }
}

?>

<table>

    <tbody>
    <tr>
        <table class="table table-striped">
            <thead>
            <div class="card">

                <div style="display: flex; justify-content: space-between;">
                    <h2><?= getUserByIntityPerson()->lastName . '    ' . getUserByIntityPerson()->firstName ?></h2>
                    <div>
                        <p style="color: #04f504; font-size: 18px; font-weight: bold;">Tugri javoblar soni: <?= $tugri_soni ?></p>
                        <p style="color: red; font-size: 18px; font-weight: bold;">Xato javoblar soni: <?= $xato_soni ?></p>

                    </div>
                </div>
            </div>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Savollar</th>
                <th scope="col">Javoblariz</th>
            </tr>
            <?php $i = 1;
            foreach ($model as $value): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $value->savollar->question ?></td>
                    <td style="background-color: <?= $value->option->status == 1 ? 'red' : '#0a3622' ?> ; color: #fff"><?= $value->option->name ?></td>
                </tr>

            <?php endforeach; ?>

    </tbody>
</table>
