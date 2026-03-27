<?php get_header(); ?>

<main>
  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post() ?>

      <div class="breadcrumbs-wrapper wrapper">
        <ol class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
          <?php bread_list(); ?>
        </ol>
      </div>

      <div class="wrapper">
        <h1 class="title" data-en="Privacy Policy">プライバシーポリシー</h1>
        <article class="about-wrapper">
          <div class="about-content">
            <?php the_content(); ?>
          </div>
        </article>
      </div>

      <div class="button-wrapper">
        <a class="button" href="<?php echo esc_url(home_url('/')); ?>">トップに戻る</a>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</main>

<?php get_footer(); ?>