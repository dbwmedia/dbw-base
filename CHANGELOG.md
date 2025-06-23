# Changelog

## [1.3.0] - 23.06.2025

### Hinzugefügt

- **Custom Login Security System**:
  - Eigenes Login-Modul (`/includes/custom-login.php`) für versteckte Login-URLs
  - Standard WordPress Login (`/wp-login.php`) wird blockiert und zu 404 weitergeleitet
  - Custom Login-URL `/zentrale` implementiert mit sauberen Rewrite-Rules
  - Automatische Logout-Weiterleitung zu Custom Login-URL
  - OOP-basierte Implementierung mit automatischem Setup bei Theme-Aktivierung
  - Schutz vor automatisierten Bot-Angriffen auf Standard-Login-Endpunkte
- **Premium Login-Page Design System**:
  - Apple-inspiriertes Dark/Light Theme mit automatischer OS-Präferenz-Erkennung
  - dbw media Brand Integration mit Custom Gradient System (`--dbw-gradient`)
  - Glassmorphism Design mit 20px Backdrop-Blur für moderne Premium-Optik
  - Interactive Logo mit Hover-Animationen und Brand-Color Drop-Shadows
  - Enhanced Input Fields mit Gradient-Border Focus-States
  - Smooth Micro-Interactions: Button Shimmer-Effects, Transform-Animationen
  - Theme-Switch mit persistenter LocalStorage-Speicherung
  - Responsive Design für Mobile/Desktop mit optimierten Touch-Targets
  - SF Pro Display Typography für Apple-like Font-Rendering
  - Enhanced Form Validation mit visueller Success/Error-Feedback
- **Login-Page Security & UX Enhancements**:
  - Custom Error Messages auf Deutsch für bessere User Experience
  - Sicherheits-Headers (X-Frame-Options, X-Content-Type-Options) für Login-Seite
  - WordPress-Branding entfernt und durch dbw media Premium-Branding ersetzt
  - Logo verlinkt zu dbw media Website für Brand-Awareness
  - Enhanced Accessibility mit Focus-States und Reduced-Motion Support
- **WordPress Configuration Optimierungen**:
  - Erweiterte Sicherheitseinstellungen in wp-config.php
  - Performance-Optimierungen: Memory Limit (256M), Post Revisions (3), Autosave Interval (5min)
  - HTTPS für Admin-Bereich erzwungen (`FORCE_SSL_ADMIN`)
  - Automatische Papierkorb-Leerung nach 7 Tagen
  - Cron-Timeout Optimierungen für bessere Background-Task Performance
- **Template-Installation Setup**:
  - Modulare Include-Struktur für einfache Wartung
  - Security by Obscurity Implementierung für Kundenprojekte
  - Automatische Regel-Aktivierung bei Theme-Switch

### Geändert

- **Functions.php Struktur erweitert**:
  - Custom Login Security Modul in separater Datei ausgelagert
  - Bessere Trennung von Core-Funktionalität und Sicherheitsfeatures
  - Include-Pfad für Login-Security hinzugefügt
- **Login-Page Design Architecture**:
  - CSS-Variable-System für konsistente Brand-Integration
  - Apple-Style Color Palette: Echtes Schwarz (#000000) mit subtilen Grauabstufungen
  - Radial Gradients statt Linear für authentische Apple-Ästhetik
  - Enhanced Button System mit DBW Brand-Gradient und Premium-Hover-Effects
  - Optimierte Logo-Größen (200x80px) für bessere Proportionen

### Sicherheit

- **Login-Endpunkt Härtung**:
  - Standard wp-admin Zugriff für nicht-authentifizierte Benutzer blockiert
  - 404-Weiterleitung für alle Standard-Login-Versuche ohne korrekten Parameter
  - Schutz vor Brute-Force-Angriffen durch URL-Verschleierung
- **Configuration Hardening**:
  - File-Edit-Funktionalität bereits deaktiviert (`DISALLOW_FILE_EDIT`)
  - Debug-Modi für Production-Umgebung konfiguriert
  - SSL-Erzwingung für sensible Admin-Bereiche

### Brand Integration

- **dbw media Premium Positioning**:
  - "Crafted with ❤️ by dbw media - Premium Digital Agency" Branding
  - Konsistente Brand-Color Integration (#ff6b6b, #ff8cc8, #ff6b9d, #c44569, #3867d6)
  - Logo-URLs zentralisiert auf dbw media Domain für einfache Wartung
  - Expert-Level UX Details für Premium-Agentur-Positionierung

## [1.2.0] - 23.06.2025

### Hinzugefügt

- **Komplettes Design System implementiert**:
  - Erweiterte Border Radius Variablen (`$borderRadiusXS` bis `$borderRadiusL`)
  - Smart Button System mit automatischen Größenvariationen
  - Smart Typography System mit kalkulierten Font-Größen basierend auf `$f-sizeBody`
  - Spacing System mit `$s-xs` bis `$s-xl` (25px - 200px)
  - Comprehensive Color System mit Status-Farben (success, warning, accent)
  - CSS Custom Properties (CSS Variables) für moderne Browser-Unterstützung
- **Card Component System**:
  - Base Card mit Hover-Effekten und smooth Transitions
  - Card Variations: `--compact`, `--large`, `--outlined`, `--glass`, `--primary`
  - Responsive Design für Mobile/Tablet
  - Accessibility Features (Focus States, Reduced Motion Support)
  - Modulare BEM-Struktur (`card__header`, `card__body`, `card__footer`, `card__image`)

### Geändert

- **SCSS Variable Konsistenz**:
  - Alle Shadow-Variablen auf Button System (`$b-shadow`, `$b-shadow-hover`) umgestellt
  - Spacing-Variablen vereinheitlicht (`$s-xs`, `$s-sm`, `$s-md` statt gemischte Systeme)
  - Border Radius Naming standardisiert
  - Typography System mit semantic Font Weights und modernen Line Heights
- **Variable Structure Optimierung**:
  - CSS Custom Properties am Ende der Variables-Datei für bessere Browser-Performance
  - Smart calculation System - nur 4 Base-Werte ändern, alles andere berechnet sich automatisch
  - Legacy Support für bestehende Variable Names beibehalten

### Dokumentiert

- **Quick Reference Guide** in Variables-Datei mit den 4 Haupt-Anpassungspunkten
- **Usage Examples** für alle Card Variations
- **Responsive Breakpoint** Documentation
- **Design System Hierarchie** erklärt

## [1.1.0] - 03.02.2025

### Geändert

- **Umstellung von `@import` auf das neue Sass‐Modulsystem**:
  - Alle globalen Variablen, Mixins und Funktionen in `global.scss` gesammelt und per `@forward` exportiert
  - SCSS‐Partials nutzen nun `@use "global"` und binden nur die tatsächlich benötigten Ressourcen ein
- **Build‐Setup aktualisiert**:
  - Abhängigkeiten neu installiert und gepinnt
  - Caches (`.cache`, `node_modules/.cache`) bereinigt
- **Prettier-/VS Code‐Konfiguration überarbeitet**:
  - `.prettierignore` hinzugefügt, um große Verzeichnisse (z. B. `node_modules`, `dist`) vom Formatieren auszuschließen
  - Optionale lokale `.prettierrc` integriert (ggf. mit `@wordpress/prettier-config`)

## [1.0.0] - 01.07.2024

### Hinzugefügt

- Erstveröffentlichung des Childthemes
