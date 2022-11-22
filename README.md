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
6. Run `npm watch` to start webpack watching ot output updated assets.

## Webpack
The theme uses Webpack as its bundler with ES6 modules for JavaScript files.

### Inline SVGs

SVG images and icons can be optimized and injected inline; in order to do this, `@import` them in `main.js` (see that file for examples). Optimized output files are named per config in `webpack.config.js` with prefixes supported for some icon packs ([@mdi/svg](https://www.npmjs.com/package/@mdi/svg), [bootstrap-icons](https://www.npmjs.com/package/bootstrap-icons), [heroicons](https://www.npmjs.com/package/heroicons)), or a default prefix of `svg-`.

Insert one in the theme using `inline_svg()` function defined in `custom-functions.php` -- it takes two arguments: the icon file name (minus `.svg` extension), and a key-value array to handle svg class, outer div with class for icons, and some accessibility options. For standard square icons, use a div class if `icon baseline` - in rare situations just `icon`. For non-icon images, skip the div_class and use an svg_class as needed.

This theme also supports icons in the navbar menu items via setting `icon-<PREFIX>-<ICON-NAME>` in the class field for a menu item in the Wordpress menu editor.

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
