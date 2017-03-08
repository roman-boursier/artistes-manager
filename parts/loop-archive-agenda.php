<?php foreach ($liste_evenements as $moisNom => $mois) : ?>
    <div class="row">
        <div class="columns large-3">
            <h2><?php echo $moisNom ?></h2>
        </div>
        <div class="columns large-9">  
            <?php foreach ($mois as $evenementId => $evenement): ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">

                    <!-------- TITRE -------------->
                    <header class="article-header">
                        <h3 class="title"><strong><?php echo get_the_title($evenementId); ?></strong></h3>
                    </header> <!-- end article header -->

                    <!-------- DATES Par événements ----------->
                    <ul>
                        <?php foreach ($evenement as $date): ?>
                            <li>
                                <!-------- ARTISTES & ENSEMBLE ------>
                                <?php $date_fin = $date['date_fin']; ?>
                                <!-------- DATE ----------->
                                <?php if ($date['date'] < $first_day_next_year): //Si la date n'est pas pour l'année prochaine ?>
                                    <small><?php echo date_i18n("j F", strtotime($date['date'])); ?></small>
                                    <small><?php echo ($date_fin) ? ' au '.date_i18n("j F", strtotime($date_fin)) : '' ;?></small>
                                    <small><a href="http://maps.google.com/?q=<?php echo $date['lieu']?>" target="_blank"><?php echo $date['lieu']; ?></a></small>
                                <?php endif; ?>
                                <!-------- LIEU -------------->
                                
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            <?php endforeach; ?>
        </div>
        <hr>
    </div>

<?php endforeach; ?>
