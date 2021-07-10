const path                  = require('path');
const glob                  = require("glob-all");
const MiniCssExtractPlugin  = require('mini-css-extract-plugin');
const CssMinimizerPlugin    = require("css-minimizer-webpack-plugin");
const CopyWebpackPlugin     = require('copy-webpack-plugin');
const SpriteLoaderPlugin    = require("svg-sprite-loader/plugin");
const BrowserSyncPlugin     = require('browser-sync-webpack-plugin');
const PurgecssPlugin        = require("purgecss-webpack-plugin");

const isProduction          = 'production' === process.env.NODE_ENV;

// Set the build prefix.
let prefix = isProduction ? '.min' : '';

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
      },
      {
        test: /\.(woff(2)?|ttf|eot)(\?v=\d+\.\d+\.\d+)?$/,
        use: [
          {
            loader: "file-loader",
            options: {
              esModule: false,
              name: "[name].[ext]",
              outputPath: "./fonts",
            },
          },
        ],
      },
      {
        test: /\.svg$/,
        loader: "svg-sprite-loader",
        options: {
          extract: true,
          spriteFilename: "icon-sprites.svg",
          publicPath: "./images/",
          symbolId: (filePath) => {
            if (filePath.includes("bootstrap-icons")) {
              return `bi-${path.basename(filePath).slice(0, -4)}`;
            } else if (filePath.includes("@mdi")) {
              return `mdi-${path.basename(filePath).slice(0, -4)}`;
            } else if (filePath.includes("heroicons")) {
              if (filePath.includes("outline")) {
                return `hio-${path.basename(filePath).slice(0, -4)}`;
              } else {
                return `his-${path.basename(filePath).slice(0, -4)}`;
              }
            } else {
              return `${path.basename(filePath).slice(0, -4)}`;
            }
          },
        },
      },
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
    new SpriteLoaderPlugin({ plainSprite: true }),
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
  ].concat(
    isProduction
      ? [
        new PurgecssPlugin({
          paths: glob.sync([
            './*.php',
            './src/**/*.php',
            './page-templates/*.php',
            './content-templates/*.php',
          ]),
          safelist: {
            greedy: getCSSWhitelistPatterns(),
          },
        }),
      ]
      : []
  )
}

// Fire up a local server if requested
if (process.env.SERVER) {
  config.plugins.push(
    new BrowserSyncPlugin(
      {
        proxy: 'https://dev1.73k.us',
        files: [
          '**/*.php',
          '**/*.scss'
        ],
        port: 9765,
        host: '172.22.1.2',
        listen: '172.22.1.2',
        notify: false,
        open: false,
        ui: { port: 9760 }
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
    /^hljs(-.*)?$/,
    /^tek(-.*)?$/,
    /^html$/,
    /^body$/,
    /^blockquote$/,
    /^ul$/,
    /^h.$/,
  ];
}

module.exports = config
