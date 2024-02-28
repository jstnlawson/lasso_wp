<?php
/*
Template Name: About
*/
get_header(); ?>
<?php
$about_main_photo        = get_theme_mod('about_main_photo');
$about_main_photo_alt    = get_theme_mod('about_main_photo_alt');
$about_main_title        = get_theme_mod('about_main_title');
$about_main_text         = get_theme_mod('about_main_text');
$about_team_photo        = get_theme_mod('about_team_photo');
$about_team_photo_alt    = get_theme_mod('about_team_photo_alt');
$about_team_title        = get_theme_mod('about_team_title');
$about_team_text         = get_theme_mod('about_team_text');
$about_mission_photo     = get_theme_mod('about_mission_photo');
$about_mission_photo_alt = get_theme_mod('about_mission_photo_alt');
$about_mission_title     = get_theme_mod('about_mission_title');
$about_mission_text      = get_theme_mod('about_mission_text');
?>
<div class="about">
    <div class="about-owner">
        <?php if ($about_main_photo) : ?>
            <img class="about-owner__image" src="<?php echo $about_main_photo; ?>" alt="<?php echo $about_main_photo_alt; ?>">
        <?php endif; ?>
        <?php if ($about_main_title || $about_main_text) : ?>
            <div class="opaque-box about-owner__blurb">
                <?php if ($about_main_title) : ?>
                    <h1 class="section__title"><?php echo esc_html($about_main_title) ?></h1>
                <?php endif; ?>
                <?php if ($about_main_text) : ?>
                    <div class="section__sub-title">
                        <p>
                            <?php echo esc_html($about_main_text) ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="about-team">
        <?php if ($about_team_photo) : ?>
            <img class="about-team__image" src="<?php echo $about_team_photo; ?>" alt="<?php echo $about_team_photo_alt; ?>">
        <?php endif; ?>
        <?php if ($about_team_title || $about_team_text) : ?>
            <div class="solid-box about-team__blurb">
                <?php if ($about_team_title) : ?>
                    <h1 class="section__title"><?php echo esc_html($about_team_title) ?></h1>
                <?php endif; ?>
                <?php if ($about_team_text) : ?>
                    <div class="section__sub-title">
                        <p>
                            <?php echo esc_html($about_team_text) ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="about-mission">
        <?php if ($about_mission_photo) : ?>
            <img class="about-mission__image" src="<?php echo $about_mission_photo; ?>" alt="<?php echo $about_mission_photo_alt; ?>">
        <?php endif; ?>
        <?php if ($about_mission_title || $about_mission_text) : ?>
            <div class="opaque-box about-mission__blurb">
                <?php if ($about_mission_title) : ?>
                    <h1 class="section__title"><?php echo esc_html($about_mission_title) ?></h1>
                <?php endif; ?>
                <?php if ($about_mission_text) : ?>
                    <div class="section__sub-title">
                        <p>
                            <?php echo esc_html($about_mission_text) ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
</div>


<?php get_footer() ?>