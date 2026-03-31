<?php
$ingredient_list = SCF::get('ingredient-list', get_the_ID());
?>
<dl class="ingredients-list">
    <?php foreach ($ingredient_list as $fields): ?>
        <div class="ingredients-item">
            <dt>
                <?php echo $fields['ingredient']; ?>
            </dt>
            <dd>
                <?php echo $fields['quantity']; ?>
            </dd>
        </div>
    <?php endforeach; ?>
</dl>