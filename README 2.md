# dbw base theme

Ein modernes, modulares WordPress-Theme für professionelle Webentwicklung von **dbw media**.

---

## 🔍 Übersicht

**dbw base** ist unser hauseigenes Theme-Framework, das für folgende Prinzipien entwickelt wurde:

- Modulare Komponenten-Architektur
- Performance-Optimierung durch Vanilla JS
- Wiederverwendbare, wartbare Codestruktur
- Moderne Build-Prozesse mit npm

---

## 🚀 Quickstart

```bash
# Installation
cd wp-content/themes/dbw-base/
npm install

# Entwicklungsserver starten
npm start
```

---

## 💻 Entwicklungs-Workflow

### SCSS-Struktur

Wir verwenden die [7-1 Pattern Architektur](https://sass-guidelin.es/#architecture) für eine saubere SCSS-Organisation:

- `base/` – Reset, Typography, Variables
- `components/` – UI-Komponenten
- `layout/` – Gridsysteme & Layouts
- `pages/` – Seitenspezifische Styles
- `themes/` – Theme-Varianten (optional)
- `abstracts/` – Mixins, Funktionen, Variablen
- `vendors/` – Externe Bibliotheken
- `utils/` – zentrale Variablen & Mixins

📌 **Hinweis:** In `src/sass/utils/_variables.scss` muss die Variable  
`$themePath:` auf die richtige URL des Themes gesetzt werden – wichtig für z. B. Hintergrundbilder.

---

## 🔌 Neue JS-Komponenten hinzufügen

Alle Komponenten sind in Vanilla JS geschrieben und modular aufgebaut. Sie befinden sich unter `src/js/components/`.

Beispiel für eine neue Komponente `header.js`:

```javascript
const Component_Header = () => {
	// Dein JS Code hier
};

export default Component_Header;
```

Dann in `app.js` oder `index.js` importieren und ausführen:

```javascript
import Component_Header from "./components/header.js";

Component_Header();
```

---

## 🔧 Verfügbare npm-Befehle

```bash
# Entwicklungsserver mit Hot Reloading
npm start

# Produktions-Build erstellen
npm run build

```

---

### Custom Post Types registrieren

Neue Custom Post Types werden unter `includes/post-types/` als eigene Dateien angelegt  
und in der `functions.php` eingebunden.

---

## 📝 Coding Standards

- **PHP:** PSR-12 und WordPress Coding Standards
- **JavaScript:** ESLint mit Airbnb-Konfiguration
- **SCSS:** BEM-Methodologie für Klassennamen

---

## 📚 Ressourcen

- [Changelog](CHANGELOG.md)

---

© **dbw media GmbH**  
_dein Web, unsere Mission._
