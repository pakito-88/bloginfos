<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
<!-- 1 ere bloc d'information -->
<section class="section1">
                <h2>L'actualité en temp réel</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.!</p>
                <a href="#" class="callToAction white">Trop cool !</a>
</section>



<!-- 2eme bloc d'information -->

<section>
    
<article class="lastArticleReleasedHommePage">    
<?php foreach ($categoriesListMenu as $category) : ?>
<div class="lastArticleReleasedByCategoryHommePage">
   <h3> <?php echo $category['name'] ?> </h3>

<?php     
    $lastArticlesReleased = $articlesModel->lastArticleReleasedByCategory($category['id']);
    foreach ($lastArticlesReleased as $lastArticleReleased) : ?>
      <p><img src="#"></p> // ajouter code img this-> machin
      <h4><?php   echo( $lastArticleReleased['title']); ?> </h4>
      <?php   echo( $lastArticleReleased['content']);  ?>
     <?php endforeach; ?> 
</div> 
<?php endforeach ; ?>
</article>

   



</section>







<?php $this->stop('main_content') ?>
