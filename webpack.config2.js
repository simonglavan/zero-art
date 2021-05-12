/**
 * WordPress Webpack Config
 */

// Webpack Dependencies
const webpack = require("webpack");
const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

// Build Config
module.exports = {
	entry: {
		site: "./development/index.js",
		woocommerce: "./development/index-woocommerce.js",
		dashboard: "./development/index-dashboard.js",
	},
	output: {
		filename: "js/[name].bundle.js",
		path: path.join(__dirname, "./wp-content/themes/zero-art/"),
	},
	watch: true,
	watchOptions: {
		aggregateTimeout: 200,
		poll: 1000,
	},

	module: {
		rules: [
			{
				test: /\.scss$/,
				use: [
					MiniCssExtractPlugin.loader,
					"css-loader",
					"sass-loader",
					{
						loader: "sass-resources-loader",
						options: {
							resources: "./development/scss-core/abstracts/_abstracts.scss",
						},
					},
				],
			},
		],
	},

	plugins: [
		new MiniCssExtractPlugin({
			filename: "css/[name].css",
		}),
		new webpack.ProvidePlugin({
			$: "jquery",
			jQuery: "jquery",
			gsap: "gsap",
			identifier: path.resolve(
				path.join(
					__dirname,
					"development/js-global/variables-constants/breakpoints"
				)
			),
		}),
	],
};
