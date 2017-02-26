<?php
/*
  Template Name: Contact (No Sidebar)
 */
?>

<?php get_header(); ?>

<div id="content">

    <div id="inner-content" class="row">

        <main id="main" class="large-12 medium-12 columns" role="main">

            <?php if (have_posts()) : ?>
                <div class="row">
                    <div class="columns large-6">
                        <?php echo do_shortcode('[contact-form-7 id="41" title="Formulaire de contact 1"]'); ?>
                    </div>
                    <div class="columns large-6">
                        <h2>Irina Britsh</h2>
                        <ul class="no-bullets">
                            <li>119, rue Cambrone</li>
                            <li>75015 PARIS</li>
                            <li><a mailto="irina.britsh@agence-enscene.com"></a>irina.britsh@agence-enscene.com</li>
                            <li> +33.1.42.73.98.31</li>
                            <li> +33.6.61.89.15.22</li>
                        </ul>
                        
                    </div>
                </div>	
            <?php endif; ?>							

        </main> <!-- end #main -->

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
