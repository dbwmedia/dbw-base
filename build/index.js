/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/components/offsetScroll.js":
/*!*******************************************!*\
  !*** ./src/js/components/offsetScroll.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
const Component_OffsetScroll = () => {
  console.log("OffsetScroll component initialized");
  const smoothScrollLinks = document.querySelectorAll("a.smooth-scroll");
  console.log(`Found ${smoothScrollLinks.length} smooth-scroll links`);
  smoothScrollLinks.forEach(link => {
    link.addEventListener("click", function (e) {
      e.preventDefault(); // Verhindert das Standardverhalten von href
      e.stopPropagation(); // Stoppt andere Event-Listener

      console.log("Link clicked:", this);

      // Extrahiere die Ziel-ID (Teil nach dem #)
      const targetID = this.getAttribute("href").split("#")[1];
      console.log("Target ID:", targetID);

      // Suche das Ziel-Element basierend auf der ID
      const targetElement = document.getElementById(targetID);
      if (targetElement) {
        console.log("Target element found:", targetElement);

        // Prüfe und parse den Offset-Wert aus data-offset
        const hasOffset = this.hasAttribute("data-offset");
        const offset = hasOffset ? parseInt(this.dataset.offset, 10) : 0;
        console.log("Offset value (in px):", offset);

        // Berechne die Zielposition
        const elementPosition = targetElement.getBoundingClientRect().top + window.scrollY;
        const offsetPosition = elementPosition - offset;
        console.log("Element position:", elementPosition);
        console.log("Offset position:", offsetPosition);

        // Scrolle zur berechneten Position
        window.scrollTo({
          top: offsetPosition,
          behavior: "smooth"
        });
        console.log("Scroll triggered to:", offsetPosition);
      } else {
        console.warn(`Target element not found for ID: ${targetID}`);
      }
    });
  });
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Component_OffsetScroll);

/***/ }),

/***/ "./src/js/components/scrollHandler.js":
/*!********************************************!*\
  !*** ./src/js/components/scrollHandler.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
const Component_ScrollHandler = () => {
  window.addEventListener("scroll", () => {
    const header = document.querySelector("header");
    if (window.scrollY > 0) {
      header.classList.add("scroll");
    } else {
      header.classList.remove("scroll");
    }
  });
  return null;
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Component_ScrollHandler);

/***/ }),

/***/ "./src/js/components/updateDynamicAnchors.js":
/*!***************************************************!*\
  !*** ./src/js/components/updateDynamicAnchors.js ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
const Component_UpdateDynamicAnchors = () => {
  // Selektiere Buttons mit spezifischen href-Attributen
  const anchorSelectors = ["a[href='#bewerben']", "a[href='#learn-more']"];
  const buttons = document.querySelectorAll(anchorSelectors.join(","));
  if (buttons.length === 0) {
    return;
  }
  buttons.forEach(button => {
    const targetId = button.getAttribute("href"); // Ziel-Anker (#bewerben oder #learn-more)
    const newHref = `${window.location.origin}${window.location.pathname}${targetId}`;

    // Aktualisiere das href-Attribut des Buttons
    button.setAttribute("href", newHref);
  });
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Component_UpdateDynamicAnchors);

/***/ }),

/***/ "./src/sass/_index.scss":
/*!******************************!*\
  !*** ./src/sass/_index.scss ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!*************************!*\
  !*** ./src/js/index.js ***!
  \*************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _sass_index_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../sass/_index.scss */ "./src/sass/_index.scss");
/* harmony import */ var _components_offsetScroll__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/offsetScroll */ "./src/js/components/offsetScroll.js");
/* harmony import */ var _components_scrollHandler__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./components/scrollHandler */ "./src/js/components/scrollHandler.js");
/* harmony import */ var _components_updateDynamicAnchors__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./components/updateDynamicAnchors */ "./src/js/components/updateDynamicAnchors.js");



// import Component_toggleLabelPosition from "./components/toggleLabelPosition";


//import Component_ComtactPopup from "./components/contactPopup";

//Component_ComtactPopup();
(0,_components_scrollHandler__WEBPACK_IMPORTED_MODULE_2__["default"])();
// Component_toggleLabelPosition();
(0,_components_updateDynamicAnchors__WEBPACK_IMPORTED_MODULE_3__["default"])();
(0,_components_offsetScroll__WEBPACK_IMPORTED_MODULE_1__["default"])();
})();

/******/ })()
;
//# sourceMappingURL=index.js.map