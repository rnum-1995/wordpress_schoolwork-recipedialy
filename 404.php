<?php get_header(); ?>

<main>
  <div class="breadcrumbs-wrapper wrapper">
    <ol class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php bread_list(); ?>
    </ol>
  </div>

  <div class="wrapper" style="text-align: center; padding-block: 4rem;">
    <h1 class="title" data-en="404 Not Found">お探しのページは見つかりませんでした</h1>
    <p style="margin-bottom: 3rem;">
      申し訳ありませんが、アクセスされたページは削除されたか、URLが変更された可能性があります。
    </p>

    <div class="button-wrapper">
      <a class="button" href="<?php echo esc_url(home_url('/')) ?>">トップページへ戻る</a>
    </div>
  </div>
</main>

<?php get_footer(); ?>