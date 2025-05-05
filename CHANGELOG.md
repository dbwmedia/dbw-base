## [1.1.0] - 03.02.2025

### Geändert

- **Umstellung von `@import` auf das neue Sass‐Modulsystem**:
  - Alle globalen Variablen, Mixins und Funktionen in `global.scss` gesammelt und per `@forward` exportiert
  - SCSS‐Partials nutzen nun `@use "global"` und binden nur die tatsächlich benötigten Ressourcen ein
- **Build‐Setup aktualisiert**:
  - Abhängigkeiten neu installiert und gepinnt
  - Caches (`.cache`, `node_modules/.cache`) bereinigt
- **Prettier-/VS Code‐Konfiguration überarbeitet**:
  - `.prettierignore` hinzugefügt, um große Verzeichnisse (z. B. `node_modules`, `dist`) vom Formatieren auszuschließen
  - Optionale lokale `.prettierrc` integriert (ggf. mit `@wordpress/prettier-config`)

## [1.0.0] - 01.07.2024

### Hinzugefügt

- Erstveröffentlichung des Childthemes
