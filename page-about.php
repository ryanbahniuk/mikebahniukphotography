<?php
/*
Template Name: About Me Page
*/
?>

<?php get_header(); ?>

<div class="container">
    <section class="col-md-12">
        
        <img src="<?php bloginfo('template_directory'); ?>/images/me.jpg" alt="Mike Bahniuk Photo" class="me">
        <a href="/contact" class="contact-me"><button type="button" class="btn btn-default btn-lg">Contact Me</button></a>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="body-content">
                <?php the_content(); ?>
            </div>
        </article>
                
        <?php endwhile; ?>
        <?php else : ?>
        <article id="post-not-found" class="hentry">
            <header>
                <h1>No Post Found!</h1>
            </header>
            Uh, oh! There appears to be no content that meets this criteria.
        </article>
        <?php endif; ?>

    </section>
</div>

<?php get_footer(); ?>