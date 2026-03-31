<?php get_header(); ?>

<main>
  <div class="breadcrumbs-wrapper wrapper">
    <ol class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php bread_list(); ?>
    </ol>
  </div>

  <div class="wrapper">
    <h1 class="title" data-en="About">サイトについて</h1>
    <article class="about-wrapper">
      <div class="about-content">
        <!-- Recipe diaryとは -->
        <?php the_content(); ?>
        <!-- 画像 -->
        <div class="about-img mt-4">
          <?php echo wp_get_attachment_image(SCF::get('about-img'), 'full'); ?>
        </div>
        <!-- こだわり -->
        <?php get_template_part('parts', 'commit'); ?>
        <!-- サイト運営者 -->
        <?php get_template_part('parts', 'admin'); ?>
      </div>
    </article>
  </div>
  <div class="button-wrapper"><a class="button" href="./index.html">トップに戻る</a></div>
</main>

<?php get_footer(); ?>