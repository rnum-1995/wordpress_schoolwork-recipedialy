<?php
$admin_group = SCF::get('admin-group', get_page_by_path('about')->ID);
?>
<h2 class="mt-4">
    <?php echo $admin_group[0]['admin-title']; ?>
</h2>
<div class="profile">
    <p>
        <strong>
            <?php echo $admin_group[0]['admin-list']; ?>
        </strong>
    </p>

    <?php foreach ($admin_group as $fields): ?>
        <?php if (!empty($fields['admin-desc'])): ?>
            <p>
                <?php echo $fields['admin-desc']; ?>
            </p>
        <?php endif; ?>
    <?php endforeach; ?>
</div>