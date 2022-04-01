// import external dependencies
import 'jquery';
import modular from 'modujs';
import * as modules from './modules';

// Import everything from autoload
// import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';


const module = new modular({
  modules: modules,
});

module.init(module);

copyrights()

/**
 * Copyright
 */

function copyrights() {
  if (console !== undefined) {
    console.log('');
    console.log('%c Developpment by 💥 Cyril Salvi 💥', 'background: #1d202c; color: #f91fff; padding: 15px');
    console.log('');
  }
}


/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
