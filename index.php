<?php get_header(); ?>

	<div id="content">
		<div id="main" class="eightcol first clearfix" role="main">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">
				<header class="article_header">
					<h1 class="page_title" itemprop="headline"><?php the_title(); ?></h1>
					<p class='post_metadata'>Ecrit le <?php the_time( 'Y-m-j' ); ?> à <?php the_time('H:i'); ?> par <?php the_author(); ?> dans <?php the_category(', '); ?>s</p>
				</header> <!-- end article header -->

				<section class="entry_content clearfix" itemprop="articleBody">
					<?php the_content(); ?>
				</section> <!-- end article section -->

				<footer class="article_footer">
				</footer> <!-- end article footer -->
				<?php comments_template(); ?>
			</article> <!-- end article -->

			<?php endwhile; else : ?>

			<article id="post-not-found" class="hentry clearfix"
				<header class="article-header">
					<h1>Page non trouvée</P></h1>
				</header>
				<section class="entry_content">
					<p>Oups</p>
				</section>
			</article>

			<?php endif; ?>

		</div> <!-- end #main -->

		<?php get_sidebar(); ?>

	</div> <!-- end #content -->

<?php get_footer(); ?>
