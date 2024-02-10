<?php

/**@var common\models\ExamUser $model */

$person = Yii::$app->user->identity->person;

?>

<table>

    <tbody>
    <tr>
        <table class="table table-striped">
            <thead>
            <div class="card">

                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <h2> <?= $person->lastName . '    '  . $person->firstName ?></h2>
                    </blockquote>
                </div>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Savollar</th>
                    <th scope="col">Javoblariz</th>
                </tr>
                <?php $i = 1; foreach ($model as $value): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $value->savollar->question ?></td>
                    <td style="background-color: <?= $value->option->status == 1 ? 'red' : '#0a3622'?> ; color: #fff"><?= $value->option->name ?></td>
                </tr>

                <?php endforeach; ?>

    </tbody>
</table>