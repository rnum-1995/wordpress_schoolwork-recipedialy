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
        <article class="recipe-wrapper">
          <div class="eyecatch">
            <?php echo wp_get_attachment_image(SCF::get('recipe-detail-img'), 'full'); ?>
          </div>

          <div class="recipe-text">
            <header class="recipe-header">
              <h1 class="recipe-name">
                <?php the_title(); ?>
              </h1>

              <?php
              //カスタム投稿のカテゴリを取得するときはget_the_terms()を使う
              $cats = get_the_terms(get_the_ID(), 'recipe-category');
              if ($cats):
              ?>
                <ul class="recipe-category">
                  <?php foreach ($cats as $cat): ?>
                    <li>
                      <a href="<?php echo esc_url(home_url('/')); ?>/taxonomy-recipe-category">
                        <?php echo $cat->name; ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>

              <?php the_content(); ?>
            </header>

            <div class="recipe-data-wrapper">
              <h2 class="recipe-data-title">材料(2人分)</h2>
              <?php get_template_part('parts', 'ingredients'); ?>
            </div>

            <div class="recipe-data-wrapper">
              <h2 class="recipe-data-title">作り方</h2>
              <?php get_template_part('parts', 'process'); ?>
            </div>
          </div>
        </article>
      </div>

      <div class="button-wrapper">
        <a class="button" href="<?php echo esc_url(home_url('/')); ?>recipe/">レシピ一覧に戻る</a>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</main>

<?php get_footer(); ?>