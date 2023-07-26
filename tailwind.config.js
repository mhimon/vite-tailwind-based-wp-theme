/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./*.php",
		"./inc/**/*.php",
		"./templates/**/*.php",
		"./src/**/*.{js,ts,jsx,tsx,scss,css}",
	],
	theme: {
		extend: {
			colors: {
				primary: "#1a202c",
				secondary: "#2d3748",
			},
			fontFamily: {
				// sans: ["Inter", "sans-serif"],
			},
		},
	},
	plugins: [],
};
