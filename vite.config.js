// // WordPress and Tailwind CSS
// import liveReload from "vite-plugin-live-reload";
// import { defineConfig } from "vite";
// import path from "path";
// import { resolve } from "path";

// export default defineConfig({
// 	plugins: [liveReload(__dirname + "/**/*.php")],
// 	root: path.resolve(__dirname, "src"),
// 	base: process.env.NODE_ENV === "development" ? "/" : "/dist/",

// 	build: {
// 		manifest: true,

// 		outDir: resolve(__dirname, "./dist/"),
// 		emptyOutDir: true,

// 		rollupOptions: {
// 			input: {
// 				main: path.resolve(__dirname, "src/js/main.js"),
// 			},
// 			output: {
// 				chunkFileNames: "js/[name]-[hash].js",
// 				entryFileNames: "js/[name]-[hash].js",

// 				assetFileNames: ({ name }) => {
// 					if (/\.(gif|jpe?g|png|svg)$/.test(name ?? "")) {
// 						return "images/[name]-[hash][extname]";
// 					}

// 					if (/\.css$/.test(name ?? "")) {
// 						return "css/[name]-[hash][extname]";
// 					}

// 					// default value
// 					// ref: https://rollupjs.org/guide/en/#outputassetfilenames
// 					return "[name]-[hash][extname]";
// 				},
// 			},
// 		},

// 		minify: true,
// 		write: true,
// 	},
// 	server: {
// 		cors: true,
// 		https: false,
// 		port: 8098,
// 		strictPort: true,
// 		hmr: {
// 			host: "localhost",
// 		},
// 	},
// 	resolve: {
// 		alias: {
// 			//vue: 'vue/dist/vue.esm-bundler.js'
// 		},
// 	},
// });

import { defineConfig } from "vite";
import liveReload from "vite-plugin-live-reload";
const { resolve } = require("path");
const fs = require("fs");

export default defineConfig({
	plugins: [liveReload(__dirname + "/**/*.php")],

	// config
	root: "",
	base: process.env.NODE_ENV === "development" ? "/" : "/dist/",

	build: {
		outDir: resolve(__dirname, "./dist"),
		emptyOutDir: true,

		manifest: true,

		target: "es2018",

		rollupOptions: {
			input: {
				main: resolve(__dirname + "/app.js"),
			},

			output: {
				chunkFileNames: "js/[name]-[hash].js",
				entryFileNames: "js/[name]-[hash].js",

				assetFileNames: ({ name }) => {
					if (/\.(gif|jpe?g|png|svg)$/.test(name ?? "")) {
						return "images/[name]-[hash][extname]";
					}

					if (/\.css$/.test(name ?? "")) {
						return "css/[name]-[hash][extname]";
					}

					// default value
					// ref: https://rollupjs.org/guide/en/#outputassetfilenames
					return "[name]-[hash][extname]";
				},
			},
		},

		// minifying switch
		minify: true,
		write: true,
	},

	server: {
		cors: true,
		strictPort: true,
		port: 8098,
		https: false,
		hmr: {
			host: "localhost",
		},
	},
});
