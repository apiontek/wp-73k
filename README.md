# 73k WordPress Bootstrap 5/PurgeCSS Theme
The WordPress theme for 73k.us, based on Bootstrap 5 and PurgeCSS.

## Requirements
- [NodeJS](https://nodejs.org)
- [Composer](https://getcomposer.org)

## How to get started
1. Clone or [download](https://github.com/freeshifter/wp-73k/archive/master.zip "Download the WP Tailwind Zip") the project onto your `themes` directory `(./wp-content/themes)`
2. Run a find/replace for the following strings:
- `wp-73k`
- `WP_73k`
- `wp_73k_`
3. Run `composer install`
4. Run `npm install` 
5. Update the BrowserSyncPlugin configuration in `webpack.config.js` to the domain of your local installation.
6. Run `npm start` to begin development server.

## Webpack
The theme uses Webpack as its bundler with ES6 modules for JavaScript files. It also compresses images found in src automatically, and maps images to the appropriate destination through the `@images` alias. For example, `@images/example.jpg` would be compiled to `../images/example.jpg`.

## Hamburgers

The sass for the hamburgers package throws warnings unless fixed, so do this before first `npm run` attempts:

```bash
npm i -g sass-migrator
HBPATH="./node_modules/hamburgers/_sass/hamburgers/"
find ${HBPATH} -type f | while read f; do npx sass-migrator division -d ${f}; done
# if cleaning node_modules & dist:
rm -rf node_modules && rm -rf dist && npm i && HBPATH="./node_modules/hamburgers/_sass/hamburgers/"
find ${HBPATH} -type f | while read f; do npx sass-migrator division -d ${f}; done
```

## Syntax Highlighting

This theme supports server-side syntax highlighting via the [Syntax-highlighting Code Block](https://wordpress.org/plugins/syntax-highlighting-code-block/) plugin. In `classes.php` the plugin-provided styling is disabled, and the theme incorporates sass styling from the highlight.js node package, imported in `_code-highlight.scss` (to change the highlight style, change the import there).

However, the plugin doesn't support highlighting inline code, but I like that option, so the theme also incorporates highlight.js in `main.js` with a DOM Loaded action to highlight any code blocks tagged with the class `to-highlight` (must also have `language-$LANG` class) -- this should be done in WordPress in the editor, where you can edit a paragraph as HTML and add the classes (e.g. `<code class="to-highlight language-python">`).

## Static Files via nginx

Static files under `assets/_root` should be served by nginx with location config like so:

```conf
location ~ /(robots.txt|favicon.ico|F185CEE29A3D443_public_key.asc|android-chrome-192x192.png|android-chrome-512x512.png|browserconfig.xml|keybase.txt|mstile-150x150.png|qpalpha.jpg|thatsjotuncock.gif|vpalpha.jpg) {
    root /var/www/dev1/wordpress-5.8-RC2/wp-content/themes/wp-73k/assets/_root/;
    allow all;
    log_not_found off;
    access_log off;
}
```

## Deployment 
```bash
npm run build
```
This will run both a production and development set of webpack tasks. The enqueue hook will load the correct version of the JS file, based on whether your development/staging server's `SCRIPT_DEBUG` constant is set to `true`.

## Bootstrap
You can customize Bootstrap SCSS & JavaScript imports in the `assets/css/app.scss` and `assets/js/main.js` files.

## PurgeCSS
*WP 73k* uses PurgeCSS to remove unused styles from the production build. It scans your project directory for strings that match SCSS declarations. You can modify the directories to search for in the `webpack.config.js` file. **Always check your production build to make sure styles you were developing with compiled correctly.**
