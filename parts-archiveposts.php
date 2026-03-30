<li>
    <div class="news-meta">
        <time datetime="<?php the_time('Y.m.d'); ?>">
            <?php the_time(get_option('date_format')); ?>
        </time>

        <?php
        $cats = get_the_category();
        if ($cats):
        ?>
            <ul class="news-category">
                <?php foreach ($cats as $cat): ?>
                    <li>
                        <a href="<?php echo esc_url(home_url('/')); ?>category/">
                            <?php echo $cat->name; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <p class="news-title">
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </p>
</li>