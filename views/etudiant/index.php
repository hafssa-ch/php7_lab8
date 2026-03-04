<h2>Étudiants</h2>
<form method="get" action="/etudiants">
  <input name="q" placeholder="Rechercher (nom, prénom, email, CNE)" value="<?php echo htmlspecialchars($q, ENT_QUOTES, 'UTF-8'); ?>">
  <select name="filiere_id">
    <option value="">Toutes filières</option>
    <?php foreach ($filieres as $f): ?>
      <option value="<?php echo (int)$f['id']; ?>" <?php echo ((int)$filiereId === (int)$f['id']) ? 'selected' : ''; ?>>
        <?php echo htmlspecialchars($f['code'].' — '.$f['libelle'], ENT_QUOTES, 'UTF-8'); ?>
      </option>
    <?php endforeach; ?>
  </select>
  <input type="hidden" name="size" value="<?php echo (int)$size; ?>">
  <button type="submit">Filtrer</button>
</form>

<p>Total: <?php echo (int)$total; ?> — Page <?php echo (int)$page; ?>/<?php echo (int)$totalPages; ?>

</p><p><a role="button" href="/etudiants/create">Nouveau</a>


<?php if (!$etudiants): ?>
  </p><p>Aucun étudiant.

<?php else: ?>
  </p>
    <thead>
      
    </thead>
    
    <?php foreach ($etudiants as $e): ?>
      
        
        
        
        
        
        
        
      
    <?php endforeach; ?>
    
  <table><tbody><tr><th>ID</th><th>CNE</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Filière</th><th>Actions</th></tr></tbody><tbody><tr><td><?php echo (int)$e['id']; ?></td><td><?php echo htmlspecialchars($e['cne'], ENT_QUOTES, 'UTF-8'); ?></td><td><?php echo htmlspecialchars($e['nom'], ENT_QUOTES, 'UTF-8'); ?></td><td><?php echo htmlspecialchars($e['prenom'], ENT_QUOTES, 'UTF-8'); ?></td><td><?php echo htmlspecialchars($e['email'], ENT_QUOTES, 'UTF-8'); ?></td><td><?php echo htmlspecialchars($e['filiere_code'].' — '.$e['filiere_libelle'], ENT_QUOTES, 'UTF-8'); ?></td><td>
          <a href="/etudiants/<?php echo (int)$e['id']; ?>">Voir</a>
          <a href="/etudiants/<?php echo (int)$e['id']; ?>/edit">Éditer</a>
          <form action="/etudiants/<?php echo (int)$e['id']; ?>/delete" method="post" style="display:inline" onsubmit="return confirm('Supprimer ?');">
            <input type="hidden" name="_csrf" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
            <button type="submit">Supprimer</button>
          </form>
        </td></tr></tbody></table>

  <?php $base = '/etudiants?size='.(int)$size.'&q='.urlencode($q).'&filiere_id='.(int)$filiereId.'&page='; ?>
  <nav class="pagination">
    <?php if ($page > 1): ?><a href="<?php echo $base.($page-1); ?>">« Préc.</a><?php endif; ?>
    <?php for ($p = 1; $p <= $totalPages; $p++): ?>
      <a href="<?php echo $base.$p; ?>" <?php="" echo="" $p="==$page?'aria-current="page"':'';" ?="">><?php echo $p; ?></a>
    <?php endfor; ?>
    <?php if ($page < $totalPages): ?><a href="<?php echo $base.($page+1); ?>">Suiv. »</a><?php endif; ?>
  </nav>
<?php endif; ?>