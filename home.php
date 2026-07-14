<?php get_header(); ?>

<div id="primary">
    <div id="content" role="main">

        <?php if (have_posts()): ?>

            <?php while (have_posts()):
                the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title" style="display: block !important;">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h1>
                    </header>

                    <div class="entry-content">
                        <?php the_content(); ?> <!----the_excerpt to get summary list ---->
                    </div>
                </article>

            <?php endwhile; ?>

        <?php endif; ?>

    </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
