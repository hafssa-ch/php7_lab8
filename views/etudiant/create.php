<h2>Créeer un étudiant</h2>

<form method="post" action="/etudiants/store">
     <input type="hidden" name="_csrf" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">

  <label>CNE
    <input name="cne"
           value="<?= htmlspecialchars($old['cne'] ?? '') ?>"
           required>
  </label>
  <?php if (!empty($errors['cne'])): ?>
    <small class="error"><?= htmlspecialchars($errors['cne']) ?></small>
  <?php endif; ?>

  <label>Nom
    <input name="nom"
           value="<?= htmlspecialchars($old['nom'] ?? '') ?>"
           required>
  </label>
  <?php if (!empty($errors['nom'])): ?>
    <small class="error"><?= htmlspecialchars($errors['nom']) ?></small>
  <?php endif; ?>

  <label>Prénom
    <input name="prenom"
           value="<?= htmlspecialchars($old['prenom'] ?? '') ?>"
           required>
  </label>
  <?php if (!empty($errors['prenom'])): ?>
    <small class="error"><?= htmlspecialchars($errors['prenom']) ?></small>
  <?php endif; ?>

  <label>Email
    <input type="email"
           name="email"
           value="<?= htmlspecialchars($old['email'] ?? '') ?>"
           required>
  </label>
  <?php if (!empty($errors['email'])): ?>
    <small class="error"><?= htmlspecialchars($errors['email']) ?></small>
  <?php endif; ?>

  <label>Filière
    <select name="filiere_id" required>
      <option value="">-- Choisir --</option>
      <?php foreach ($filieres as $f): ?>
        <option value="<?= (int)$f['id'] ?>"
          <?= (isset($old['filiere_id']) && $old['filiere_id'] == $f['id']) ? 'selected' : '' ?>>
          <?= htmlspecialchars($f['code'].' — '.$f['libelle']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </label>
  <?php if (!empty($errors['filiere_id'])): ?>
    <small class="error"><?= htmlspecialchars($errors['filiere_id']) ?></small>
  <?php endif; ?>

  <button type="submit">Créer</button>
  <a role="button" class="secondary" href="/etudiants">Annuler</a>

</form>