const path                  = require('path');
const glob                  = require("glob-all");
const MiniCssExtractPlugin  = require('mini-css-extract-plugin');
const CssMinimizerPlugin    = require("css-minimizer-webpack-plugin");
const CopyWebpackPlugin     = require('copy-webpack-plugin');
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
        type: 'asset/resource',
        generator: {
          filename: 'fonts/[name][ext]'
        },
      },
      {
        test: /\.svg$/,
        type: 'asset/resource',
        generator: {
          filename: (pathData) => {
            if (pathData.filename.includes('@mdi')) {
              return 'images/mdi-[name][ext]';
            } else if (pathData.filename.includes("bootstrap-icons")) {
              return 'images/bsi-[name][ext]';
            } else if (pathData.filename.includes("heroicons")) {
              if (pathData.filename.includes("outline")) {
                return 'images/hio-[name][ext]';
              } else {
                return 'images/his-[name][ext]';
              }
            } else {
              return 'images/svg-[name][ext]';
            }
          },
        },
        use: [
          {
            loader: 'svgo-loader',
            options: {
              configFile: path.resolve('svgo.config.js'),
            }
          }
        ],
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
        proxy: process.env.BSYNC_PROXY || 'localhost',
        files: [
          '**/*.php',
          '**/*.scss'
        ],
        port: process.env.BSYNC_PORT || 8080,
        host: process.env.BSYNC_HOST || '127.0.0.1',
        listen: process.env.BSYNC_LISTEN || '0.0.0.0',
        // notify: false,
        // open: false,
        ui: { port: process.env.BSYNC_UI_PORT || 8081 }
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
    /^has(-.*)?$/,
    /^screen(-.*)?$/,
    /^navigation(-.*)?$/,
    /^(.*)-template(-.*)?$/,
    /^(.*)?-?single(-.*)?$/,
    /^postid-(.*)?$/,
    /^post-(.*)?$/,
    /^sticky(-.*)?$/,
    /^attachmentid-(.*)?$/,
    /^attachment(-.*)?$/,
    /^page(-.*)?$/,
    /^(post-type-)?archive(-.*)?$/,
    /^author(-.*)?$/,
    /^category(-.*)?$/,
    /^tag(-.*)?$/,
    /^menu(-.*)?$/,
    /^more(-.*)?$/,
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
    /^figure$/,
    /^blockquote$/,
    /^collapse$/,
    /^collapsing$/,
    /^label$/,
    /^input$/,
    /^textarea$/,
    /^select$/,
    /^svg$/,
    /^img$/,
    /^ul$/,
    /^li$/,
    /^p$/,
    /^a$/,
    /^h.$/,
    /^pre$/,
    /^code$/,
  ];
}

module.exports = config
