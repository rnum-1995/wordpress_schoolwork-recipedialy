<?php
$commitment_group = SCF::get('commitment-group', get_page_by_path('about')->ID);
?>
<h2 class="mt-4">
    <?php echo $commitment_group[0]['commitment-title']; ?>
</h2>
<dl class="about-list">
    <?php foreach ($commitment_group as $fields): ?>
        <?php if (!empty($fields['commitment-list'])): ?>
            <div>
                <dt><?php echo $fields['commitment-list']; ?></dt>
                <dd><?php echo $fields['commitment-desc']; ?></dd>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</dl>