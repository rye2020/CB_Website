<?php get_header(); ?>

<div id="primary">
    <div id="content" role="main">

        <?php if (have_posts()): ?>

            <header class="page-header">
                <h1 class="page-title">
                    <?php
                    if (is_day()):
                        echo 'Daily Archives: ' . get_the_date();
                    elseif (is_month()):
                        echo 'Monthly Archives: ' . get_the_date('F Y');
                    elseif (is_year()):
                        echo 'Yearly Archives: ' . get_the_date('Y');
                    else:
                        echo 'Archives';
                    endif;
                    ?>
                </h1>
            </header>

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
                        <?php the_excerpt(); ?>
                    </div>
                </article>

            <?php endwhile; ?>

        <?php else: ?>

            <article>
                <header class="entry-header">
                    <h1 class="entry-title">Nothing Found</h1>
                </header>
                <div class="entry-content">
                    <p>No posts found in this archive.</p>
                </div>
            </article>

        <?php endif; ?>

    </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>