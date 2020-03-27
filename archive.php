
<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">

	<title>カテゴリー名</title>
	<meta name="description" content="">

	<meta property="og:title" content="カテゴリー名">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://example.com/category/a/">
	<meta property="og:image" content="https://example.com/category/a/img/ogp.png">
	<meta property="og:site_name" content="カテゴリー名">
	<meta property="og:description" content="">
	<meta name="twitter:card" content="summary_large_image">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css?ver=5.8.2">
	<link rel="stylesheet" href="html/css/style.css">

	<link rel="icon" href="html/img/icon-home.png">

</head>

<body>

	<!-- header-navまでをget_header()に置き換える -->
    <?php get_header(); ?>


	<!-- content -->
	<div id="content">
		<div class="inner">

			<!-- primary -->
			<main id="primary">

				
                <!-- breadcrumb -->
                <div class="breadcrumb">
                    <?php bcn_display(); //BreadcrumbNavXTのパンくずを表示するための記述 ?>
                </div><!-- /breadcrumb -->

                <div class="archive-head m_description">
                    <div class="archive-lead">ARCHIVE</div>
                    <h1 class="archive-title m_category"><?php the_archive_title(); //一覧ページ名を表示 ?></h1><!-- /archive-title -->
                    <div class="archive-description">
                        <p><?php the_archive_description(); //説明を表示 ?></p>
                    </div><!-- /archive-description -->
                </div><!-- /archive-head -->

				<?php
                //記事があればentriesブロック以下を表示
                if (have_posts() ) : ?>

                    <!-- entries -->
                    <div class="entries m_horizontal">
                        <?php
                        //記事数ぶんループ
                        while ( have_posts() ) :
                        the_post();
                        ?>

                            <!-- entry-item -->
                            <a href="<?php the_permalink(); //記事のリンクを表示 ?>" class="entry-item">

                                <!-- entry-item-img -->
                                <div class="entry-item-img">
                                    <?php
                                    if (has_post_thumbnail() ) {
                                    // アイキャッチ画像が設定されてれば大サイズで表示
                                    the_post_thumbnail('large');
                                    } else {
                                    // なければnoimage画像をデフォルトで表示
                                    echo '<img src="' . esc_url(get_template_directory_uri()) . '/html/img/noimg.png" alt="">';
                                    }
                                    ?>
                                </div><!-- /entry-item-img -->

                                <!-- entry-item-body -->
                                <div class="entry-item-body">
                                    <div class="entry-item-meta">
                                        <!-- trueを引数として渡すとリンク付き、falseを渡すとリンクなし -->
                                        <div class="entry-item-tag">
                                            <?php my_the_post_category( false ); ?>
                                        </div><!-- /entry-item-tag -->
                                        <!-- 公開日時を動的に表示する -->
                                        <time class="entry-item-published" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time><!-- /entry-item-published -->
                                    </div><!-- /entry-item-meta -->
                                    <h2 class="entry-item-title"><?php the_title(); //タイトルを表示 ?></h2><!-- /entry-item-title -->
                                    <div class="entry-item-excerpt">
                                        <?php the_excerpt(); //抜粋を表示 ?>
                                    </div><!-- /entry-item-excerpt -->
                                </div><!-- /entry-item-body -->
                            </a><!-- /entry-item -->
                        <?php
                        endwhile;
                        ?>

                    </div><!-- /entries -->
                <?php endif; ?>

                <?php get_template_part('template-parts/pagenation'); ?>


			</main><!-- /primary -->

			<!-- secondaryから下をget_sidebar()に置き換える -->
            <?php get_sidebar(); ?>

		</div><!-- /inner -->
	</div><!-- /content -->

	<!-- footer-menuから下をget_footer()に置き換える -->
    <?php get_footer(); ?> 