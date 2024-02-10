<?php
/** @var common\models\Option $option */
?>
<br>
<div class="form-check">
    <?php foreach ($option as $value): ?>
        <label>
            <input class="form-check-input" type="radio" name="option<?= $value->savollar_id ?>" value="<?= $value->id ?>">
        </label>
        <?= "($value->name) $value->option <br>" ?>
    <?php endforeach; ?>
</div>
<hr>