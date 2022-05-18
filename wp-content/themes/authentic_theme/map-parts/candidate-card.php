<?php
// Set election bg color
if (date('Y') === get_sub_field('election_year')) :
    $class_election_year = 'bg-primaryDark';
else :
    $class_election_year = 'bg-primary';
endif;

// Set image effect based on party
if (get_sub_field('party_affiliation') != 'D') :
    $class_photo = 'photo-gray-scale';
else :
    $class_photo = '';
endif;

// Set default name
if (get_sub_field('name')) :
    $name = get_sub_field('name');
else :
    $name = 'Not yet selected';
endif;

?>
<div class="cadidate-item">
    <div class="cadidate-item--title-wrapper">
        <?php if (is_singular('states')) : ?>
            <h4 class="cadidate-item--title"><?= $name; ?> <?php echo '(' . get_sub_field('party_affiliation') . ')'; ?></h4>
        <?php else : ?>
            <h3 class="cadidate-item--title"><?= $name; ?> <?php echo '(' . get_sub_field('party_affiliation') . ')'; ?></h3>
        <?php endif; ?>
        <div class="cadidate-item--election-year <?php echo $class_election_year; ?>"><?php _e('Election Year:', 'authentic_theme'); ?> <?php the_sub_field('election_year'); ?></div>
    </div>
    <div class="cadidate-item--image-wrapper">
            <?php
        // Set placeholder image 
        $candidate_photo = get_sub_field('photo');
        if ( $candidate_photo ):
            echo wp_get_attachment_image(
                $candidate_photo,
                'half',
                false,
                array('class' => 'cadidate-item--image ' . $class_photo)
            );
        else: ?>
            <img width="230" height="230" src="<?= site_url('wp-content/themes/authentic_theme/images/profile-image.jpeg') ?>" class="<?= 'cadidate-item--image ' . $class_photo; ?>" alt="Unknown Candidate" loading="lazy">
            <?php 
        endif;
            ?>
    </div>
</div>