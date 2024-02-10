<?php

use common\models\Person;
/**@var $user_id  */



$s =Person::find()->andWhere(['user_id' => $user_id])->one();

$this->title = '( ' . $s->person->lastName->Fisrtname . ' )  ' . $s ->person->Name;
?>
<div class="option-index">







    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">satus</th>
            <th scope="col">amallar</th>
        </tr>
        <div class="card">

            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Tug'ri javoblar. </p>

                </blockquote>
            </div>
        </div>
        </thead>
        <tbody>
        <?php $i = 1; foreach ($model as $value): ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $value->id?></td>
                <td><?= $value->name?></td>
                <td><?= $value->option?></td>



            </tr>
        <?php endforeach; ?>
        </tbody>

</div>

