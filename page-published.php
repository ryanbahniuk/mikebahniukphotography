<?php
/*
Template Name: Published Works Page
*/
?>

<?php get_header(); ?>

<div class="container">
    <?php
    $args = array(
        'post_type' => 'attachment',
        'numberposts' => -1,
        'category_name' => 'published',
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

    <?php if ($attachments[0]) { ?>
        <?php foreach ($attachments as $set) { ?>
            <div class="row">
                <?php foreach ($set as $post) { ?>
                    <?php setup_postdata($post); ?>
                    <a href="<?php $image = wp_get_attachment_image_src($post->ID, 'large'); echo $image[0];?>" data-lightbox="published"><div class="col-md-4" ><img src="<?php $image = wp_get_attachment_image_src($post->ID, 'large'); echo $image[0];?>"></div></a>
                <?php } ?>
            </div>
        <?php } ?>
    <?php } ?>
</div>

<?php get_footer(); ?>