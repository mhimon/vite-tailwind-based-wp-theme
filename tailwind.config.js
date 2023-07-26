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
				primary: "##F30D55",
				secondary: "#5820E5",
			},
			fontFamily: {
				// sans: ["Inter", "sans-serif"],
			},
		},
	},
	plugins: [],
};
