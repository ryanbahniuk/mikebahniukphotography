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
function compare($a, $b) {
    $a = get_post_meta($a->ID, 'order', true);
    $b = get_post_meta($b->ID, 'order', true);

    if ($a == $b) { return 0; }
    if ($a == "") { $a = "zzzzzzz"; }
    if ($b == "") { $b = "zzzzzzz"; }
    
    return ($a < $b) ? -1 : 1;
}
$attachments = get_posts($args);
uasort($attachments, 'compare');
$attachments = array_chunk($attachments, 3);
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