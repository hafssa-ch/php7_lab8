<h2>Édiiter l’étudiant #<?= (int)$e['id'] ?></h2>

<form method="post" action="/etudiants/<?= (int)$e['id'] ?>/update">

  <label>CNE
    <input name="cne" value="<?= htmlspecialchars($e['cne']) ?>" required>
  </label>

  <label>Nom
    <input name="nom" value="<?= htmlspecialchars($e['nom']) ?>" required>
  </label>

  <label>Prénom
    <input name="prenom" value="<?= htmlspecialchars($e['prenom']) ?>" required>
  </label>

  <label>Email
    <input type="email" name="email" value="<?= htmlspecialchars($e['email']) ?>" required>
  </label>

  <label>Filière
    <select name="filiere_id" required>
      <?php foreach ($filieres as $f): ?>
        <option value="<?= (int)$f['id'] ?>"
          <?= $e['filiere_id'] == $f['id'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($f['code'].' — '.$f['libelle']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </label>

  <button type="submit">Enregistrer</button>
  <a role="button" class="secondary"
     href="/etudiants/<?= (int)$e['id'] ?>">Annuler</a>

</form>