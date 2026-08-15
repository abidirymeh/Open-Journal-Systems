# UJPS — Université de Jendouba Publication System (Application Mobile)

## À propos

L'Université de Jendouba utilise **Open Journal Systems (OJS)** pour la gestion de ses revues scientifiques, mais la plateforme ne dispose d'aucune application mobile officielle et souffre de plusieurs limites d'ergonomie (clés de traduction non résolues, pages de connexion/inscription peu intuitives, absence de champs personnalisés dans les profils). Ce projet, réalisé dans le cadre d'un stage ouvrier, répond à ces limites en deux temps : l'amélioration de la plateforme OJS elle-même (thème, traductions, profils) et le développement d'une **application mobile React Native** connectée à OJS via une API REST personnalisée, afin de permettre aux utilisateurs de consulter leur tableau de bord, leurs soumissions, les sections et les revues depuis un smartphone.

## Démonstration

![image alt](https://github.com/abidirymeh/Open-Journal-Systems/blob/c2115994f5a2bf1e0c92cdb846f53dadafb8fc2b/connexionMobile.jpg)
![image alt](https://github.com/abidirymeh/Open-Journal-Systems/blob/c2115994f5a2bf1e0c92cdb846f53dadafb8fc2b/dashboard.jpg)
![image alt](https://github.com/abidirymeh/Open-Journal-Systems/blob/c2115994f5a2bf1e0c92cdb846f53dadafb8fc2b/inscription.jpg)
![image alt](https://github.com/abidirymeh/Open-Journal-Systems/blob/c2115994f5a2bf1e0c92cdb846f53dadafb8fc2b/connexion.jpg)

## Table des matières

- 🪧 [À propos](#à-propos)
- 📦 [Prérequis](#prérequis)
- 🚀 [Installation](#installation)
- 🛠️ [Utilisation](#utilisation)
- 🤝 [Contribution](#contribution)
- 🏗️ [Construit avec](#construit-avec)
- 📚 [Documentation](#documentation)
- 🏷️ [Gestion des versions](#gestion-des-versions)
- 📝 [Licence](#licence)

## Prérequis

- **[Node.js](https://nodejs.org/)** (version LTS recommandée) et npm — pour exécuter le projet React Native/Expo.
- **[Expo CLI](https://docs.expo.dev/more/expo-cli/)** — outil en ligne de commande pour lancer, builder et déboguer l'application.
- **[Expo Go](https://expo.dev/go)** (Android/iOS) ou un émulateur Android/iOS — pour exécuter l'application en mode développement.
- **[Git](https://git-scm.com/doc)** — pour cloner et versionner le dépôt.
- Une instance **[Open Journal Systems (OJS)](https://docs.pkp.sfu.ca/)** (≥ 3.5) accessible avec l'API REST activée, installée par exemple via **[XAMPP](https://www.apachefriends.org/fr/index.html)** (Apache, PHP 8.2, MySQL, phpMyAdmin) en local.
- **[Postman](https://learning.postman.com/docs/introduction/overview/)** (optionnel) — pour tester les endpoints de l'API REST OJS pendant le développement.

## Installation

```bash
# 1. Cloner le dépôt
git clone https://github.com/abidirymeh/Open-Journal-Systems.git
cd Open-Journal-Systems

# 2. Installer les dépendances du projet
npm install

# 3. Copier le fichier d'environnement d'exemple et renseigner vos valeurs
cp .env.example .env
# Éditer .env pour renseigner l'URL de l'API OJS et les identifiants nécessaires
```

## Utilisation

### Lancer l'application en mode développement

```bash
# Démarrer le serveur de développement Expo
npx expo start
```

Scannez ensuite le QR code affiché avec l'application **Expo Go**, ou appuyez sur `a` / `i` dans le terminal pour lancer un émulateur Android/iOS.

### Lancer sur une plateforme spécifique

```bash
npx expo start --android   # Émulateur/périphérique Android
npx expo start --ios       # Simulateur iOS
npx expo start --web       # Version web (aperçu)
```

### Vérifier le typage TypeScript

```bash
npx tsc --noEmit
```

## Contribution

### Flux de contribution

```bash
# 1. Créer une branche dédiée à partir de main
git checkout -b feature/nom-de-la-fonctionnalite

# 2. Effectuer vos modifications, puis les committer
git add .
git commit -m "feat: description courte de la modification"

# 3. Pousser la branche sur le dépôt distant
git push origin feature/nom-de-la-fonctionnalite

# 4. Ouvrir une Pull Request vers la branche main pour revue
```

Merci de respecter la convention de nommage des commits ([Conventional Commits](https://www.conventionalcommits.org/fr/)) et de vérifier que l'application démarre correctement (`npx expo start`) avant d'ouvrir une Pull Request.

## Construit avec

### Langages & Frameworks

- **[TypeScript](https://www.typescriptlang.org/docs/)** — langage principal du projet, typage statique sur base JavaScript.
- **[React Native](https://reactnative.dev/docs/getting-started)** — framework de développement d'applications mobiles multiplateformes.
- **[Expo](https://docs.expo.dev/)** — plateforme et outillage facilitant le développement, le build et la distribution de l'application React Native.
- **[Expo Router](https://docs.expo.dev/router/introduction/)** — système de navigation basé sur le routage par fichiers.
- **[React Navigation](https://reactnavigation.org/docs/getting-started)** — bibliothèque de navigation (stack navigator) utilisée en complément.
- **[Open Journal Systems (OJS)](https://docs.pkp.sfu.ca/)** — plateforme de gestion de revues scientifiques, source des données consommées par l'application via son API REST.
- **[PHP](https://www.php.net/docs.php)** — langage côté serveur pour les scripts de l'API REST personnalisée reliant l'application à OJS.
- **[MySQL](https://dev.mysql.com/doc/)** — système de gestion de base de données relationnelle utilisé par OJS.

### Outils

#### CI

Aucune intégration continue n'est actuellement configurée sur ce dépôt.

> À définir : mise en place possible d'un pipeline (ex. GitHub Actions) pour l'exécution du linting/typage TypeScript à chaque Pull Request.

#### Déploiement

Aucun déploiement automatisé n'est actuellement configuré. Le build et la distribution de l'application peuvent être réalisés manuellement via :

- **[Expo Application Services (EAS)](https://docs.expo.dev/eas/)** — pour builder et publier l'application sur les stores (Android/iOS).
- **[Ngrok](https://ngrok.com/docs)** — pour exposer temporairement le serveur OJS local à Internet lors des phases de test.

## Documentation

- Documentation officielle d'OJS/PKP : [docs.pkp.sfu.ca](https://docs.pkp.sfu.ca/)
- Documentation officielle d'Expo : [docs.expo.dev](https://docs.expo.dev/)

## Gestion des versions

Afin de maintenir un cycle de publication claire et de favoriser la rétrocompatibilité, la dénomination des versions suit la spécification décrite par la [Gestion sémantique de version](https://semver.org/lang/fr/).

## Auteur

Rimeh Abidi : rimeh.abidi@enis.tn


## Licence

Voir le fichier [LICENSE](./LICENSE.md) du dépôt.
