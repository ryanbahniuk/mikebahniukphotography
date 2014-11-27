<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<?php
$args = array(
    'post_type' => 'attachment',
    'numberposts' => -1,
    'category_name' => 'featured',
    'post_status' => null,
    'post_parent' => null // any parent
    ); 
$attachments = get_posts($args);
?>

<?php if ($attachments) { ?>
    <div class="flexslider">
        <ul class="slides">
            <?php foreach ($attachments as $post) { ?>
                <?php setup_postdata($post); ?>
                <li style="background-image: url(<?php $image = wp_get_attachment_image_src($post->ID, 'large'); echo $image[0];?>)"></li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>

<?php get_footer(); ?>