// Import SCSS
import '../css/app.scss'

// Import icons for sprite-loader
// navbar brand icon
import "../../node_modules/@mdi/svg/svg/desktop-classic.svg"; // brand
// other:
import "../../node_modules/@mdi/svg/svg/home.svg";
import "../../node_modules/@mdi/svg/svg/information.svg";
import "../../node_modules/@mdi/svg/svg/account.svg";
import "../../node_modules/@mdi/svg/svg/briefcase-account.svg";
import "../../node_modules/@mdi/svg/svg/zip-disk.svg";
import "../../node_modules/@mdi/svg/svg/typewriter.svg";
import "../../node_modules/@mdi/svg/svg/calendar-clock.svg";
import "../../node_modules/@mdi/svg/svg/tag-multiple.svg";
import "../../node_modules/@mdi/svg/svg/rss.svg";
import "../../node_modules/@mdi/svg/svg/account-hard-hat.svg";
import "../../node_modules/@mdi/svg/svg/open-in-new.svg";
// social
import "../../node_modules/@mdi/svg/svg/linkedin.svg";
import "../../node_modules/@mdi/svg/svg/github.svg";
import "../../node_modules/@mdi/svg/svg/key-variant.svg";
import "../raw/gitea.svg";
import "../../node_modules/@mdi/svg/svg/goodreads.svg";
import "../../node_modules/@mdi/svg/svg/twitter.svg";
import "../../node_modules/@mdi/svg/svg/facebook.svg";
import "../../node_modules/@mdi/svg/svg/instagram.svg";
import "../../node_modules/@mdi/svg/svg/steam.svg";
import "../../node_modules/@mdi/svg/svg/discord.svg";

// Import Bootstrap JS
import 'bootstrap/js/dist/collapse';
import 'bootstrap/js/dist/alert';
import 'bootstrap/js/dist/button';
import 'bootstrap/js/dist/dropdown';

// import navbar burger code
import "./_hamburger-helper";

// import highlight.js for handling inline code
import hljs from '../../node_modules/highlight.js/lib/core';
import markdown from '../../node_modules/highlight.js/lib/languages/markdown';
hljs.registerLanguage('markdown', markdown);
import javascript from '../../node_modules/highlight.js/lib/languages/javascript';
hljs.registerLanguage('javascript', javascript);
import powershell from '../../node_modules/highlight.js/lib/languages/powershell';
hljs.registerLanguage('powershell', powershell);
import bash from '../../node_modules/highlight.js/lib/languages/bash';
hljs.registerLanguage('bash', bash);
import shell from '../../node_modules/highlight.js/lib/languages/shell';
hljs.registerLanguage('shell', shell);
import csharp from '../../node_modules/highlight.js/lib/languages/csharp';
hljs.registerLanguage('csharp', csharp);
import python from '../../node_modules/highlight.js/lib/languages/python';
hljs.registerLanguage('python', python);
import php from '../../node_modules/highlight.js/lib/languages/php';
hljs.registerLanguage('php', php);
import elixir from '../../node_modules/highlight.js/lib/languages/elixir';
hljs.registerLanguage('elixir', elixir);

// highlight any code blocks tagged with class 'to-highlight'
document.addEventListener('DOMContentLoaded', (event) => {
  document.querySelectorAll('code.to-highlight').forEach((el) => {
    hljs.highlightElement(el);
  });
});