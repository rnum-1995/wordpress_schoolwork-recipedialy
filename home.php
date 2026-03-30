<?php get_header(); ?>

<main>
  <div class="breadcrumbs-wrapper wrapper">
    <ol class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php bread_list(); ?>
    </ol>
  </div>

  <div class="wrapper">
    <h1 class="title" data-en="News">お知らせ</h1>
    <?php if (have_posts()): ?>
      <ul class="news-list page-news-list">
        <?php
        while (have_posts()): the_post();
          get_template_part('parts', 'archiveposts');
        endwhile;
        ?>
      </ul>
    <?php else: ?>
      <p>記事はありません。</p>
    <?php endif; ?>

    <!-- Pagination -->
    <?php wp_pagenavi(); ?>
  </div>

  <div class="button-wrapper">
    <a class="button" href="<?php echo esc_url(home_url('/')); ?>">トップに戻る
    </a>
  </div>
</main>

<?php get_footer(); ?>