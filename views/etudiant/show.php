<h2>Étudiant #<?= (int)$e['id'] ?></h2>

<ul>
  <li>CNE : <?= htmlspecialchars($e['cne']) ?></li>
  <li>Nom : <?= htmlspecialchars($e['nom']) ?></li>
  <li>Prénom : <?= htmlspecialchars($e['prenom']) ?></li>
  <li>Email : <?= htmlspecialchars($e['email']) ?></li>
  <li>Filière : <?= htmlspecialchars($e['filiere_code'].' — '.$e['filiere_libelle']) ?></li>
</ul>

<p>
  <a role="button" href="/etudiants/<?= (int)$e['id'] ?>/edit">Éditer</a>
  <a role="button" class="secondary" href="/etudiants">Retour</a>
</p>

<form action="/etudiants/<?php echo (int)$e['id']; ?>/delete" method="post" onsubmit="return confirm('Supprimer ?');">
  <input type="hidden" name="_csrf" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
  <button type="submit" class="contrast">Supprimer</button>
</form>