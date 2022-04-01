<?php


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
                     <div class="relative have-child"  x-data="{ open: false }">
                          <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                          <button type="button"
                                  class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 rounded-md py-2 px-3 text-sm font-medium group flex focus:ring-0"
                                  aria-expanded="false"
                                  @click="open = ! open">

                                <span>' . $title . '</span>

                              <svg class="text-primary ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                              </svg>
                          </button>';
            } else {

                $output .= '
                    <a href="' . $permalink . '" class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 rounded-md py-2 px-3 text-sm font-medium">
                      ' . $title . '
                    </a>';


            }

        } elseif (!empty($permalink) && !empty($title) && $depth == 1) {
            $icon = get_field('icon', $item->ID);
            $output .= '<a href="' . $permalink . '" class="-m-3 px-3 py-3 flex items-center rounded-lg">';

            if (!empty($icon)) {
                $output .= '<img class="h-10 w-10" src="' . $icon['url'] . '" alt="' . $icon['url'] . '">';
            } else {
                $output .= '<svg class="flex-shrink-0 h-10 w-10 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>';
            }
            $output .= '<div class="ml-4">
                            <p class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 rounded-md py-2 px-3 text-sm font-medium hover:underline">
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
                                <div class="relative grid gap-2 bg-white px-5 py-6 sm:p-8"> ';
        }

    }

    function end_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth == 0) {
            $output .= '</div>

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
            $icon = get_field('icon', $item->ID);

            if ($dispo == false) {
                $output .= '<a href="' . $permalink . '" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">';

                if (!empty($icon)) {
                    $output .= ' <img class="h-8 w-8" src="' . $icon["url"] . '" alt="' . $icon['alt'] . '">';
                }

                $output .= '<span class="ml-3 text-base font-medium text-gray-900">' . $title . '</span>
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

