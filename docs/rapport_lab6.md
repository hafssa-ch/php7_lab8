# Rapport LAB 6 — Sécurité, Authentification et Finalisation

## Architecture
- MVC maison: Controller, View, Dao, Core (Request/Response/Router), Container (AppFactory)
- Security layer: Auth (sessions), Csrf (tokens), Middleware (requireAdmin, requireCsrfPost), Validator/Sanitizer
- DAO: AdminDao, EtudiantDao (recherche), FiliereDao

## Mesures de sécurité
- Sessions: cookies HttpOnly, SameSite=Lax, regen ID post-login, timeout 20 min
- Auth: password_hash/password_verify, redirection login, logout par POST + CSRF
- CSRF: token stocké en session, vérifié sur chaque POST sensible
- Validation: nettoyage et règles strictes (CNE, email, longueurs), FK vérifiée
- XSS: échappement systématique dans les vues
- SQLi: requêtes préparées partout (aucune concaténation)

## Limites et pistes
- Pas de gestion de rôles multiples ni audit des actions
- Pas de throttling des tentatives de login (à ajouter)
- Pas de HTTPS forcé côté code (à configurer serveur)
- Token CSRF global par session (peut être raffiné par formulaire)
- Logs d’accès sécurité minimaux (peuvent être étoffés)