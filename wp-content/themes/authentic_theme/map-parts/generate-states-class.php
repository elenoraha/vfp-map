<?php

$states_election_year = array();
// var_dump($states_election_year);

//Header WP Query
$args = array(
    'post_type'      => 'states',
    'posts_per_page' => -1
);

$querypost = new WP_Query($args);

if ($querypost->have_posts()) :
    while ($querypost->have_posts()) :
        $querypost->the_post();

        if (have_rows('current_senators')) :
            while (have_rows('current_senators')) :
                the_row();

                if (get_sub_field('election_year') == date('Y')) {
                    $states_election_year[] = get_field('state_abbreviation');
                    break;
                }

            endwhile;
        endif;

    //Footer WP Query 
    endwhile;
    wp_reset_postdata();
else :
endif;  ?>

<?php foreach ($states_election_year as $state_abbr) : ?>
    <?php $out_class[] = '.link-state--' . $state_abbr . ' path'; ?>
<?php endforeach; ?>

<style>
    <?php echo implode(', ', array_filter($out_class)); ?> {
        fill:#2487BE; /* old: #083053 new: #2487BE */
    }
</style>