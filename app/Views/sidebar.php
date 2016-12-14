<section id="sidebar">
			<aside >
			
				<h4> Liste des articles </h4>
				<?php foreach ($articlesSidebar as $articleSidebar) :?>
				<a class="test" href="<?php echo $this->url('see_article', array('id'=>$articleSidebar['id']))?>"><?php echo $articleSidebar['title']?></a>

				<?php endforeach;?>
			
			</aside>	

			<br>
			<br>
		
			 <aside >
				
				<form class="forminscription" action="" method="post" target="">
						<p>Ajouter un article : </p>
					<i class="fa fa-wrench" aria-hidden="true"></i>
				 	<input class="inputinscription" type="text" style="" name="email">

				 	<button>	
				 	<a href="<?php echo $this->url('add_articles'); ?>" > ajouter</a>
				 	</button>

				 </form>

				 	<br>

				<form class="forminscription" action="" method="post" target="">
					<p>Pour commentez </p>
					 <p>Inscrivez-vous !</p>
					 <i class="fa fa-commenting-o" aria-hidden="true"></i>
				 	<input class="inputinscription" type="text" style="" name="email">
				 	<button>	
				 	<a href="<?php echo $this->url('login'); ?>" > Inscription</a>
				 	</button>

				 </form>


			</aside> 

				
		</section>