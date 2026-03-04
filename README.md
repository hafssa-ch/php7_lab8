# Lab 8 — Sécurité, Authentification et Finalisation

## Cours
Ingénierie Logicielle Web avec PHP 7  
Thème : Architecture Multicouche & Sécurisation d’une application MVC

## Objectif
Finaliser l’application MVC en ajoutant :
- Authentification administrateur sécurisée
- Protection CSRF sur tous les POST
- Timeout d’inactivité (20 minutes)
- Validation et sanitisation des entrées
- Recherche avancée et pagination sécurisée
- Middleware de protection des routes
- Scénarios de test sécurité

## Architecture du projet
``

project-root/
│
├── public/
│ └── index.php
├── src/
│ ├── Core/
│ ├── Security/
│ ├── Controller/
│ ├── Dao/
│ └── Container/
├── views/
│ ├── layout.php
│ ├── auth/
│ └── etudiant/
├── logs/
└── docs/
├── test_security.md
└── rapport_lab6.md
``

<img width="740" height="322" alt="image" src="https://github.com/user-attachments/assets/13fc313f-710d-44f6-8ac9-fc2e4aa16b5b" />
