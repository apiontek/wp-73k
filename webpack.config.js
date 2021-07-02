const path                 = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyWebpackPlugin    = require('copy-webpack-plugin');
const ImageminPlugin       = require('imagemin-webpack-plugin').default;
const BrowserSyncPlugin    = require('browser-sync-webpack-plugin');
const PurgeCSS             = require('@fullhuman/postcss-purgecss');
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const isProduction         = 'production' === process.env.NODE_ENV;

// Set the build prefix.
let prefix = isProduction ? '.min' : '';

// Set the PostCSS Plugins.
const post_css_plugins = [
	require('postcss-import'),
	require('tailwindcss')('./tailwind.js'),
	require('postcss-nested'),
	require('postcss-custom-properties'),
	require('autoprefixer')
]

// Add PurgeCSS for production builds.
if ( isProduction ) {
	post_css_plugins.push(
		PurgeCSS({
			content: [
				'./*.php',
				'./src/**/*.php',
				'./page-templates/*.php',
				'./assets/images/**/*.svg',
				'./assets/scss/whitelist/*.css',
				'./../../mu-plugins/app/src/components/**/*.php',
			],
			// css: [
			// 	'./node_modules/tailwindcss/dist/base.css'
			// ],
			// Use Extractor configuration from Tailwind Docs
			// https://tailwindcss.com/docs/controlling-file-size#setting-up-purge-css-manually
			defaultExtractor: content => {
    				// Capture as liberally as possible, including things like `h-(screen-1.5)`
    				const broadMatches = content.match(/[^<>"'`\s]*[^<>"'`\s:]/g) || []

    				// Capture classes within other delimiters like .block(class="w-1/2") in Pug
    				const innerMatches = content.match(/[^<>"'`\s.()]*[^<>"'`\s.():]/g) || []

    				return broadMatches.concat(innerMatches)
  			},
			whitelistPatterns: getCSSWhitelistPatterns()
		})
	)
}

const config = {
	entry: './assets/js/main.js',
	output: {
		filename: `[name]${prefix}.js`,
		path: path.resolve(__dirname, 'dist')
	},
	module: {
		rules: [
			{
				test: /\.js$/,
        exclude: /node_modules/,
				loader: 'babel-loader',
				options: {
					presets: [
						[
							"@babel/preset-env"
						]
					]
				}
			},
      {
        test: /\.[s]?css$/,
        use: [
          MiniCssExtractPlugin.loader,
          "css-loader",
          "sass-loader",
          "postcss-loader",
        ],
			}
		]
	},
	optimization: {
		minimizer: ["...", new CssMinimizerPlugin()],
	},
	mode: process.env.NODE_ENV,
	resolve: {
		alias: {
			'@'      : path.resolve('assets'),
			'@images': path.resolve('../images')
		}
	},
	plugins: [
		new MiniCssExtractPlugin({ filename: `[name]${prefix}.css` }),
		new CopyWebpackPlugin({
			patterns: [{
                        	from: './assets/images/',
                        	to: 'images',
				globOptions: {
					ignore: [
						'**/.DS_Store'
					]
				}
			}]
		}),
		new ImageminPlugin({ test: /\.(jpe?g|png|gif|svg)$/i })
	]
}

// Fire up a local server if requested
if (process.env.SERVER) {
	config.plugins.push(
		new BrowserSyncPlugin(
			{
				proxy: 'http://127.0.0.1:9764',
				files: [
					'**/*.php',
					'**/*.scss'
				],
				port: 9765,
				notify: false,
			}
		)
	)
}

/**
 * List of RegExp patterns for PurgeCSS
 * @returns {RegExp[]}
 */
function getCSSWhitelistPatterns() {
	return [
		/^home(-.*)?$/,
		/^blog(-.*)?$/,
		/^archive(-.*)?$/,
		/^date(-.*)?$/,
		/^error404(-.*)?$/,
		/^admin-bar(-.*)?$/,
		/^search(-.*)?$/,
		/^nav(-.*)?$/,
		/^wp(-.*)?$/,
		/^screen(-.*)?$/,
		/^navigation(-.*)?$/,
		/^(.*)-template(-.*)?$/,
		/^(.*)?-?single(-.*)?$/,
		/^postid-(.*)?$/,
		/^post-(.*)?$/,
		/^attachmentid-(.*)?$/,
		/^attachment(-.*)?$/,
		/^page(-.*)?$/,
		/^(post-type-)?archive(-.*)?$/,
		/^author(-.*)?$/,
		/^category(-.*)?$/,
		/^tag(-.*)?$/,
		/^menu(-.*)?$/,
		/^tags(-.*)?$/,
		/^tax-(.*)?$/,
		/^term-(.*)?$/,
		/^date-(.*)?$/,
		/^(.*)?-?paged(-.*)?$/,
		/^depth(-.*)?$/,
		/^children(-.*)?$/,
	];
}

module.exports = config
