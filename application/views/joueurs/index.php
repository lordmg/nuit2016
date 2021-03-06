</br>
<nav>
	<div class="nav-wrapper">
		<a href="#" class="brand-logo center">Gestion des joueurs</a>
	</div>
</nav>

<div class="col s6">
  <h3>Liste des joueurs</h3>
  <table>
    <thead>
      <tr>
        <th data-field="nom">Pseudo du joueur</th>
        <th data-field="urlphoto">Adresse mail</th>
        <th data-field="urlweb">Numéro table</th>
        <th data-field="afficher">Position</th>
        <th data-field="#">Action</th>
        <th data-field="#">Valider Préinscription</th>
        <th data-field="#">Valider Inscription</th>
      </tr>
    </thead>

    <tbody>
       <?php
        foreach($joueurs as $unJoueur)
        {
          echo '<tr>';
          echo '<td>'.$unJoueur->pseudo.'</td>';
          echo '<td>'.$unJoueur->mail.'</td>';
          echo '<td>'.$unJoueur->table.'</td>';
          echo '<td>'.$unJoueur->position.'</td>';
         echo  '<td><a href='.site_url().'/joueur/supprimer/'.$unJoueur->idJoueur.'><button class="btn waves-effect waves-light" type="button">Supprimer</button></a></td>';
          echo '</tr>';

        }
        ?>
    </tbody>
    <a href='<?=site_url();?>/joueur/export'><button class='btn waves-effect waves-light' type="button">Exporter</button></a>

</table>
</div>