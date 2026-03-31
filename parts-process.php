<?php
$process_list = SCF::get('process-list', get_the_ID());
?>
<ol class="steps-list">
    <?php foreach ($process_list as $fields): ?>
        <li>
            <?php echo $fields['process']; ?>
        </li>
    <?php endforeach; ?>
</ol>