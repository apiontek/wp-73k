# 73k WordPress Bootstrap 5/PurgeCSS Theme
The WordPress theme for 73k.us, based on Bootstrap 5 and PurgeCSS.

## Requirements
- [NodeJS](https://nodejs.org)
- [Composer](https://getcomposer.org)

## How to get started
1. Clone or [download](https://github.com/apiontek/wp-73k/archive/refs/heads/master.zip "Download the WP 73k Zip") the project onto your `themes` directory `(./wp-content/themes)`
2. Run a find/replace for the following strings:
- `wp-73k`
- `WP_73k`
- `wp_73k_`
3. Run `composer install`
4. Run `npm install` 
5. Set environment variables for BrowserSyncPlugin to the domain/ports you need (see `webpack.config.js` for variables needed).
6. Run `npm start` to begin development server.

## Webpack
The theme uses Webpack as its bundler with ES6 modules for JavaScript files.

### SpriteLoaderPlugin

SVG icons can be pulled into a sprite file (output to `dist/images/icon-sprites.svg`). For this to work, `@import` them in main.js (see examples). Sprite names are set by the config in `webpack.config.js` with prefixes supported for some icon packs ([@mdi/svg](https://www.npmjs.com/package/@mdi/svg), [bootstrap-icons](https://www.npmjs.com/package/bootstrap-icons), [heroicons](https://www.npmjs.com/package/heroicons)). They can then be used for menus (put `icon-<PREFIX>-<ICON-NAME>` in the class for a menu item), or used in the theme php files with the `svg_icon_use($icon_name, $div_class)` function from `custom-functions.php` to get a div containing the correct svg use tag. `$div_class` should usually include `baseline` for proper layout.

## Syntax Highlighting

This theme supports server-side syntax highlighting via the [Syntax-highlighting Code Block](https://wordpress.org/plugins/syntax-highlighting-code-block/) plugin. In `classes.php` the plugin-provided styling is disabled, and the theme incorporates sass styling from the highlight.js node package, imported in `_code-highlight.scss` (to change the highlight style, change the import there).

However, the plugin doesn't support highlighting inline code, but I like that option, so the theme also incorporates highlight.js in `main.js` with a DOM Loaded action to highlight any code blocks tagged with the class `to-highlight` (must also have `language-$LANG` class) -- this should be done in WordPress in the editor, where you can edit a paragraph as HTML and add the classes (e.g. `<code class="to-highlight language-python">`).

## Static Files via nginx

Static files under `assets/_root` cal be served by nginx with location config like below - otherwise they (or your versions of whatever you want served from your WordPress site root) should be moved to your WordPress site root.

```conf
location ~ /(robots.txt|favicon.ico|android-chrome-192x192.png|android-chrome-512x512.png|browserconfig.xml|mstile-150x150.png) {
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
