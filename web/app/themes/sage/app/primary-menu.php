<?php

/**
 * Navigation Menu template functions
 *
 */
//
//function register_my_menu()
//{
//    register_nav_menu('primary-menu', __('Menu Primary'));
//}
//add_action('init', 'register_my_menu');
//add_theme_support('custom-logo');

//class Walker_Primary extends Walker_Nav_Menu
//{
//    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
//    {
//        $object = $item->object;
//        $title = $item->title;
//        $permalink = $item->url;
//
//        if (!empty($permalink) && !empty($title) && $depth == 0) {
//            if ($args->walker->has_children) {
//                $output .= '
//                     <div class="relative have-child"  x-data="{ open: false }">
//                          <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
//                          <button type="button"
//                                  class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
//                                  aria-expanded="false"
//                                  @click="open = ! open"
//                                  >
//
//                            <span class="text-gray-500 hover:text-gray-900">' . $title . '</span>
//
//                            <!-- Item active: "text-gray-600", Item inactive: "text-gray-400" -->
//                            <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
//                                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
//                              <path fill-rule="evenodd"
//                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
//                                    clip-rule="evenodd"/>
//                            </svg>
//                          </button>';
//            } else {
//                $output .= '
//                    <a href="' . $permalink . '" class="text-base font-medium text-gray-500 hover:text-gray-900">
//                      ' . $title . '
//                    </a>';
//            }
//
//        } elseif (!empty($permalink) && !empty($title) && $depth == 1) {
//            $icon  = get_field('icon', $item->ID);
//            $output .= '
//              <a href="'.$permalink.'" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
//                    '.$icon.'
//                  <div class="ml-4">
//                    <p class="text-base font-medium text-gray-900">
//                      '.$title.'
//                    </p>
//
//                  </div>
//                </a>';
//        }
//    }
//
//    function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
//    {
//        if ($depth == 0) {
//            $output .= '</div>';
//        }
//    }
//
//
//    function start_lvl(&$output, $depth = 0, $args = null)
//    {
//        if ($depth == 0) {
//            $output .= '<div
//                            x-cloak
//                            x-show="open"
//                            @click.outside="open = false"
//                            x-transition:enter="transition ease-out duration-300"
//                            x-transition:enter-start="opacity-0 scale-90"
//                            x-transition:enter-end="opacity-100 scale-100"
//                            x-transition:leave="transition ease-in duration-300"
//                            x-transition:leave-start="opacity-100 scale-100"
//                            x-transition:leave-end="opacity-0 scale-90"
//                            class="dropdown absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
//                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
//                                <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">';
//        }
//
//    }
//
//    function end_lvl(&$output, $depth = 0, $args = null)
//    {
//        if ($depth == 0) {
//            $output .= '
//                            </div>
//                        </div>
//                    </div>';
//        }
//    }
//}


/**
 * Navigation Menu template functions
 *
 */
class Walker_Primary extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $object = $item->object;
        $title = $item->title;
        $permalink = $item->url;

        if (!empty($permalink) && !empty($title) && $depth == 0) {
            if ($args->walker->has_children) {
                $output .= '
                     <div class="relative have-child md:ml-10"  x-data="{ open: false }">
                          <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                          <button type="button"
                                  class=" text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                                  aria-expanded="false"
                                  @click="open = ! open">

                                <span>' . $title . '</span>

                              <svg class="text-primary ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                              </svg>
                          </button>';
            } else {

                    $output .= '
                    <a href="' . $permalink . '" class="text-base font-medium text-gray-500 hover:text-gray-900 md:ml-10">
                      ' . $title . '
                    </a>';


            }

        } elseif (!empty($permalink) && !empty($title) && $depth == 1) {
            $icon = get_field('icon', $item->ID);
            $output .= '<a href="' . $permalink . '" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">';

            if (!empty($icon)) {
                $output .= $icon;
            } else {
                $output .= '<svg class="flex-shrink-0 h-6 w-6 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>';
            }
            $output .= '<div class="ml-4">
                            <p class="text-base font-medium text-gray-900">
                                ' . $title . '
                            </p>';

            if (!empty($description)) {
                $output .= '<p class="mt-1 text-sm text-gray-500">
                                ' . $description . '
                            </p>';
            }

            $output .= '
                  </div>
              </a>';


        }
    }

    function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        if (in_array('menu-item-has-children', $item->classes)) {
            $output .= '
            </div>';
        }
    }


    function start_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth == 0) {
            $output .= '<div x-cloak
                            x-show="open"
                            @click.outside="open = false"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-90"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-90"
                            class="absolute z-50 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">

                              <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8"> ';
        }

    }

    function end_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth == 0) {
            $output .= '</div>
                        <div class="px-5 py-5 bg-gray-50 space-y-6 sm:flex sm:space-y-0 sm:space-x-10 sm:px-8 bg-white">
                            <div class="flow-root">
                                <a href="#" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">
                                <svg class="flex-shrink-0 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-3">Watch Demo</span>
                              </a>
                            </div>

                            <div class="flow-root">
                              <a href="#" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">
                                <svg class="flex-shrink-0 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="ml-3">Contact Sales</span>
                              </a>
                            </div>
                        </div>
                    </div>
                </div>';
        }
    }
}


class Walker_Primary_Mobile extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $object = $item->object;
        $title = $item->title;
        $permalink = $item->url;
        if (!empty($permalink) && !empty($title) && $depth == 0) {
            $dispo = get_field('no_dispo', $item->ID);
            if ($dispo == false) {
                $output .= '
                <a href="' . $permalink . '" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                    <svg class="flex-shrink-0 h-6 w-6 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span class="ml-3 text-base font-medium text-gray-900">
                    ' . $title . '
                    </span>
                </a>';
            } else {
                $output .= '
                <a href="' . $permalink . '" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                    <svg class="flex-shrink-0 h-6 w-6 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span class="ml-3 text-base font-medium text-gray-300">
                    ' . $title . '
                    </span>
                    <button type="button" class=" ml-4 inline-flex items-center px-1 py-0.5 border border-transparent text-xs font-medium shadow-sm text-white bg-primary-600 hover:bg-primary-700">
                        Bientôt dispo !
                    </button>
                </a>';
            }
        }
    }

//    function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
//    {
//        if (in_array('menu-item-has-children', $item->classes)) {
//            $output .= '
//            </div>';
//        }
//    }

//
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth == 0) {
            $output .= '';
        }

    }

    function end_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth == 0) {
            $output .= '';
        }
    }
}

