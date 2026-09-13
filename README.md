# UJPS — University of Jendouba Publication System (Mobile Application)

## About

The University of Jendouba uses **Open Journal Systems (OJS)** to manage its scientific journals, but the platform has no official mobile app and suffers from several usability limitations (unresolved translation keys, unintuitive login/registration pages, lack of custom fields in user profiles). This project, carried out as part of a work placement, addresses these limitations in two stages: improving the OJS platform itself (theme, translations, profiles) and developing a **React Native mobile application** connected to OJS via a custom REST API, allowing users to view their dashboard, submissions, sections, and journals from a smartphone.

## Demo

![image alt](https://github.com/abidirymeh/Open-Journal-Systems/blob/0c19f4b7332b6968715079faf1c65be989a64cf1/connexionMobile.jfif)
![image alt](https://github.com/abidirymeh/Open-Journal-Systems/blob/0c19f4b7332b6968715079faf1c65be989a64cf1/dashboard.jfif)
![image alt](https://github.com/abidirymeh/Open-Journal-Systems/blob/ad6f86779e9f9de499664bfb07d2c19f7bdee4af/inscription.png)
![image alt](https://github.com/abidirymeh/Open-Journal-Systems/blob/ad6f86779e9f9de499664bfb07d2c19f7bdee4af/connexion.png)

## Table of Contents

- 🪧 [About](#about)
- 📦 [Requirements](#requirements)
- 🚀 [Installation](#installation)
- 🛠️ [Usage](#usage)
- 🤝 [Contributing](#contributing)
- 🏗️ [Built With](#built-with)
- 📚 [Documentation](#documentation)
- 🏷️ [Versioning](#versioning)
- 📝 [License](#license)

## Requirements

- **[Node.js](https://nodejs.org/)** (LTS version recommended) and npm — to run the React Native/Expo project.
- **[Expo CLI](https://docs.expo.dev/more/expo-cli/)** — command-line tool for running, building, and debugging the app.
- **[Expo Go](https://expo.dev/go)** (Android/iOS) or an Android/iOS emulator — to run the app in development mode.
- **[Git](https://git-scm.com/doc)** — to clone and version the repository.
- An **[Open Journal Systems (OJS)](https://docs.pkp.sfu.ca/)** instance (≥ 3.5) accessible with the REST API enabled, installed for example via **[XAMPP](https://www.apachefriends.org/index.html)** (Apache, PHP 8.2, MySQL, phpMyAdmin) locally.
- **[Postman](https://learning.postman.com/docs/introduction/overview/)** (optional) — to test the OJS REST API endpoints during development.

## Installation

```bash
# 1. Clone the repository
git clone https://github.com/abidirymeh/Open-Journal-Systems.git
cd Open-Journal-Systems

# 2. Install project dependencies
npm install

# 3. Copy the sample environment file and fill in your values
cp .env.example .env
# Edit .env with the OJS API URL and required credentials
```

## Usage

### Run the app in development mode

```bash
# Start the Expo development server
npx expo start
```

Then scan the displayed QR code with the **Expo Go** app, or press `a` / `i` in the terminal to launch an Android/iOS emulator.

### Run on a specific platform

```bash
npx expo start --android   # Android emulator/device
npx expo start --ios       # iOS simulator
npx expo start --web       # Web version (preview)
```

### Check TypeScript typing

```bash
npx tsc --noEmit
```

## Contributing

### Contribution workflow

```bash
# 1. Create a dedicated branch from main
git checkout -b feature/feature-name

# 2. Make your changes, then commit them
git add .
git commit -m "feat: short description of the change"

# 3. Push the branch to the remote repository
git push origin feature/feature-name

# 4. Open a Pull Request against the main branch for review
```

Please follow the commit naming convention ([Conventional Commits](https://www.conventionalcommits.org/)) and make sure the app starts correctly (`npx expo start`) before opening a Pull Request.

## Built With

### Languages & Frameworks

- **[TypeScript](https://www.typescriptlang.org/docs/)** — the project's main language, adding static typing on top of JavaScript.
- **[React Native](https://reactnative.dev/docs/getting-started)** — framework for building cross-platform mobile applications.
- **[Expo](https://docs.expo.dev/)** — platform and tooling that streamlines developing, building, and distributing the React Native app.
- **[Expo Router](https://docs.expo.dev/router/introduction/)** — file-based routing navigation system.
- **[React Navigation](https://reactnavigation.org/docs/getting-started)** — navigation library (stack navigator) used alongside it.
- **[Open Journal Systems (OJS)](https://docs.pkp.sfu.ca/)** — scientific journal management platform, the source of the data consumed by the app via its REST API.
- **[PHP](https://www.php.net/docs.php)** — server-side language for the custom REST API scripts connecting the app to OJS.
- **[MySQL](https://dev.mysql.com/doc/)** — relational database management system used by OJS.

### Tools

#### CI

No continuous integration is currently configured on this repository.

> To be defined: possible setup of a pipeline (e.g. GitHub Actions) to run TypeScript linting/type-checking on every Pull Request.

#### Deployment

No automated deployment is currently configured. Building and distributing the app can be done manually via:

- **[Expo Application Services (EAS)](https://docs.expo.dev/eas/)** — to build and publish the app to the stores (Android/iOS).
- **[Ngrok](https://ngrok.com/docs)** — to temporarily expose the local OJS server to the internet during testing phases.

## Documentation

- Official OJS/PKP documentation: [docs.pkp.sfu.ca](https://docs.pkp.sfu.ca/)
- Official Expo documentation: [docs.expo.dev](https://docs.expo.dev/)

## Versioning

To maintain a clear release cycle and support backward compatibility, version naming follows the specification described by [Semantic Versioning](https://semver.org/).

## Author

Rimeh Abidi: rimeh.abidi@enis.tn

## License

See the repository's [LICENSE](./LICENSE.md) file.
