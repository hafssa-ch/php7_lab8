
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mini MVC — Gestion Étudiants</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
  <style>
    body { background-color: #f8f9fa; }
    main.container {
      max-width: 980px;
      margin: 2rem auto;
      padding: 1rem;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 0 12px rgba(0,0,0,0.08);
    }
    nav ul { display: flex; justify-content: space-between; padding: 0; list-style: none; margin-bottom: 2rem; }
    nav ul li { margin-right: 1rem; }
    nav ul li:last-child { margin-right: 0; }
    .pagination a { margin: 0 .25rem; }
    .error { color: #b00020; }
    button, input[type="submit"] { cursor: pointer; }
    .search-filter { margin-bottom: 1.5rem; }
    h1 { margin-bottom: 1rem; }
  </style>
</head>
<body>
  <main class="container">
    <?php if (!empty($_SESSION['admin_id'])): ?>
      <!-- Navbar affichée après connexion -->
      <nav>
        <ul>
          <li><strong>Gestion Étudiants</strong></li>
        </ul>
        <ul>
          <li><a href="/etudiants">Liste</a></li>
          <li><a href="/etudiants/create">Ajouter</a></li>
          <li>
            <form method="post" action="/logout" style="display:inline">
              <input type="hidden" name="_csrf" value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
              <button type="submit" class="secondary">Se déconnecter</button>
            </form>
          </li>
        </ul>
      </nav>

      <!-- Contenu après connexion -->
      <section class="search-filter">
        <?= $content ?>
      </section>

    <?php else: ?>
      <!-- Page de connexion si non connecté -->
      <h1>Connexion admin</h1>
      <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
      <?php endif; ?>
      <form method="post" action="/login">
        <label for="username">Nom d’utilisateur</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Se connecter</button>
      </form>
    <?php endif; ?>
  </main>
</body>
</html>