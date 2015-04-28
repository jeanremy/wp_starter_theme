<?php get_header(); ?>

	<div class="main" role="main">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" role="article">
			<header class="article_header">
				<h1 class="page_title"><?php the_title(); ?></h1>
			</header> <!-- end article header -->

			<section class="clearfix">
				<?php the_content(); ?>
			</section> <!-- end article section -->

			<footer class="article_footer">
			</footer> <!-- end article footer -->
			<?php comments_template(); ?>
		</article> <!-- end article -->

		<?php endwhile; else : ?>

		<article id="post-not-found" class="clearfix">
			<header class="article-header">
				<h1>Page non trouvée</P></h1>
			</header>
			<section class="entry_content">
				<p>Oups</p>
			</section>
		</article>

		<?php endif; ?>

	</div> <!-- end .main -->

<?php get_footer(); ?>
