// Import SCSS
import '../css/app.scss'

// Import Bootstrap JS
import 'bootstrap/js/dist/collapse';
import 'bootstrap/js/dist/alert';
import 'bootstrap/js/dist/button';
import 'bootstrap/js/dist/dropdown';

// Import JS Modules
import menu_init from './modules/menu'

// Load Menu Script
document.addEventListener( 'DOMContentLoaded', menu_init );