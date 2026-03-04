# Tests Sécurité — LAB 6

## Login
- POST /login (username=admin, pwd=Admin!234, _csrf OK) → 302 /etudiants, session admin_id définie
- POST /login (username=admin, pwd=wrong, _csrf OK) → 200, message "Login ou mot de passe invalide."
- POST /login sans _csrf → 403

## Accès protégé
- GET /etudiants/create sans session → 302 /login
- GET /etudiants/create après login → 200 formulaire création

## CSRF
- POST /etudiants/store sans _csrf → 403
- POST /etudiants/{id}/delete avec token modifié → 403

## Session
- Inactivité > 20 min → nouvelle requête vers route protégée → 302 /login

## SQL Injection
- GET /etudiants?q=' OR 1=1 -- → la liste ne doit pas exploser ni afficher tout (requêtes préparées); pas d’erreur SQL

## XSS
- Créer étudiant avec <script>alert(1)</script> dans nom → affichage échappé, pas d’exécution script

## Codes attendus
- 200 contenu OK, 302 redirection, 403 CSRF invalide, 404 id inconnu