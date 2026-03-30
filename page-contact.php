<?php get_header(); ?>

<main>
    <div class="breadcrumbs-wrapper wrapper">
        <ol class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php bread_list(); ?>
        </ol>
    </div>

    <div class="wrapper contact-wrapper">
        <div class="contact-header">
            <h1 class="title" data-en="Contact">お問い合わせ</h1>
            <?php the_content(); ?>
        </div>

        <?php echo do_shortcode('[contact-form-7 id="b9ce5e5" title="お問い合わせ"]'); ?>
    </div>
</main>

<?php get_footer(); ?>