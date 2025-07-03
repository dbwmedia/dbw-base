/**
 * Smart Grid Component
 * Automatically assigns grid classes based on number of children
 */
const Component_SmartGrid = () => {
	/**
	 * Main function to initialize smart grids
	 */
	const initSmartGrids = () => {
		// Only target grids with .auto class for automatic behavior
		const autoGrids = document.querySelectorAll(".grid.auto");

		if (autoGrids.length === 0) {
			console.log("🎯 Smart Grid: No .grid.auto elements found");
			return;
		}

		autoGrids.forEach((grid, index) => {
			processGrid(grid, index);
		});

		console.log(`🎯 Smart Grid: Processed ${autoGrids.length} grids`);
	};

	/**
	 * Process individual grid
	 * @param {Element} grid - The grid element
	 * @param {number} index - Grid index for debugging
	 */
	const processGrid = (grid, index) => {
		// Count direct children (only divs)
		const children = Array.from(grid.children).filter(
			(child) => child.tagName.toLowerCase() === "div"
		);
		const childCount = children.length;

		// Remove any existing auto-grid classes
		removeExistingAutoClasses(grid);

		// Add appropriate class based on child count
		const gridClass = getGridClass(childCount);
		grid.classList.add(gridClass);

		// Add data attribute for debugging
		grid.setAttribute("data-smart-grid-children", childCount);
		grid.setAttribute("data-smart-grid-class", gridClass);

		// Optional: Log for debugging (remove in production)
		if (
			window.location.hostname === "localhost" ||
			window.location.hostname.includes("dev")
		) {
			console.log(
				`🎯 Grid ${index + 1}: ${childCount} children → ${gridClass}`
			);
		}
	};

	/**
	 * Remove existing auto-grid classes
	 * @param {Element} grid - The grid element
	 */
	const removeExistingAutoClasses = (grid) => {
		const autoClasses = [
			"grid-auto-1",
			"grid-auto-2",
			"grid-auto-3",
			"grid-auto-4",
			"grid-auto-5",
			"grid-auto-6",
			"grid-auto-many",
		];

		autoClasses.forEach((className) => {
			grid.classList.remove(className);
		});
	};

	/**
	 * Determine grid class based on child count
	 * @param {number} count - Number of children
	 * @returns {string} - Grid class name
	 */
	const getGridClass = (count) => {
		if (count === 0) return "grid-auto-1"; // Fallback for empty grids
		if (count === 1) return "grid-auto-1";
		if (count === 2) return "grid-auto-2";
		if (count === 3) return "grid-auto-3";
		if (count === 4) return "grid-auto-4";
		if (count === 5) return "grid-auto-5";
		if (count === 6) return "grid-auto-6";

		// 7+ children
		return "grid-auto-many";
	};

	/**
	 * Reinitialize grids (useful for dynamic content)
	 */
	const reinitialize = () => {
		console.log("🔄 Smart Grid: Reinitializing...");
		initSmartGrids();
	};

	/**
	 * Initialize on DOM ready
	 */
	const init = () => {
		if (document.readyState === "loading") {
			document.addEventListener("DOMContentLoaded", initSmartGrids);
		} else {
			initSmartGrids();
		}

		// Make reinitialize function globally available for dynamic content
		window.SmartGrid = {
			reinitialize: reinitialize,
			processGrid: processGrid,
		};
	};

	// Auto-initialize
	init();
};

export default Component_SmartGrid;
