<?php foreach ($liste_evenements as $moisNom => $mois) : ?>
    <div class="row">
        <div class="columns large-2">
            <h2><?php echo $moisNom ?></h2>
        </div>
        <div class="columns large-10">  
            <?php foreach ($mois as $evenementId => $evenement): ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
                    
                    <!-------- TITRE -------------->
                    <header class="article-header">
                        <h3 class="title"><strong><?php echo get_the_title($evenementId); ?></strong></h3>
                    </header> <!-- end article header -->	
                    <?php foreach ($evenement as $date): ?>
                    
                        <!-------- ARTISTES & ENSEMBLE ------>

                        <!-------- DATE ----------->
                        <small><?php echo date_i18n("d/m/y", strtotime($date['date_de_debut'])); ?></small>

                        <!-------- LIEU -------------->
                        <small><?php echo $date['lieu']; ?></small>

                    <?php endforeach; ?>
                    <hr>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>
