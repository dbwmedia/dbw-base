# How to add new components
In this directory place all Components.
Example for a component `header.js`:
```javascript
const Component_Header = () => {
// JS Code
}

export default Component_Header;
```
Add into `index.js`:
```javascript
import Component_Header from "./components/header.js";

Component_Header();
```
