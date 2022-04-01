<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_edit_account_form'); ?>


<form class="mt-12 space-y-6 flex flex-col flex-nowrap" action=""
      method="post" <?php do_action('woocommerce_edit_account_form_tag'); ?> >

  <h2 class="block text-xl ml-6"><?php esc_html_e('Update informations', 'woocommerce'); ?></h2>

  <?php do_action('woocommerce_edit_account_form_start'); ?>
  <div class="flex ml-8">
    <div class="w-full">
      <label for="account_first_name"
             class="block text-sm font-medium text-blue-gray-900"> <?php esc_html_e('First name', 'woocommerce'); ?> </label>
      <input type="text" name="account_first_name" id="account_first_name" autocomplete="given-name"
             class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div class="w-full ml-6">
      <label class="block text-sm font-medium text-blue-gray-900"
             for="account_last_name"><?php esc_html_e('Last name', 'woocommerce'); ?>&nbsp;<span
          class="required">*</span></label>

      <input type="text"
             class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500"
             name="account_last_name"
             id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr($user->last_name); ?>"/>
    </div>
  </div>

  <div class="flex ml-8">
    <div class="w-full">


      <label class="block text-sm font-medium text-blue-gray-900"
             for="account_display_name"><?php esc_html_e('Display name', 'woocommerce'); ?>&nbsp;<span
          class="required">*</span></label>
      <input type="text"
             class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500"
             name="account_display_name"
             id="account_display_name" value="<?php echo esc_attr($user->display_name); ?>"/>
      <span><em><?php esc_html_e('This will be how your name will be displayed in the account section and in reviews', 'woocommerce'); ?></em></span>

    </div>

    <div class="w-full ml-6">

      <label class="block text-sm font-medium text-blue-gray-900"
             for="account_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span
          class="required">*</span></label>
      <input type="email"
             class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500"
             name="account_email"
             id="account_email" autocomplete="email" value="<?php echo esc_attr($user->user_email); ?>"/>

    </div>
  </div>


  <fieldset>
    <h2 class="block text-xl ml-6 pb-6"><?php esc_html_e('Password change', 'woocommerce'); ?></h2>

    <div class="w-full ml-6 mt-4">
      <label class="block text-sm font-medium text-blue-gray-900"
             for="password_current"><?php esc_html_e('Current password (leave blank to leave unchanged)', 'woocommerce'); ?></label>
      <input type="password"
             class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500"
             name="password_current"
             id="password_current" autocomplete="off"/>
    </div>
    <div class="w-full ml-6 mt-4 ">
      <label class="block text-sm font-medium text-blue-gray-900"
             for="password_1"><?php esc_html_e('New password (leave blank to leave unchanged)', 'woocommerce'); ?></label>
      <input type="password"
             class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500"
             name="password_1"
             id="password_1" autocomplete="off"/>
    </div>
    <div class="w-full ml-6 mt-4 ">

      <label class="block text-sm font-medium text-blue-gray-900"

             for="password_2"><?php esc_html_e('Confirm new password', 'woocommerce'); ?></label>
      <input type="password"
             class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500"
             name="password_2"
             id="password_2" autocomplete="off"/>
    </div>
  </fieldset>

  <?php do_action('woocommerce_edit_account_form'); ?>

  <div class="w-full ml-6">
    <?php wp_nonce_field('save_account_details', 'save-account-details-nonce'); ?>
    <button type="submit"
            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
            name="save_account_details"
            value="<?php esc_attr_e('Save changes', 'woocommerce'); ?>"><?php esc_html_e('Save changes', 'woocommerce'); ?></button>
    <input type="hidden" name="action" value="save_account_details"/>
  </div>

  <?php do_action('woocommerce_edit_account_form_end'); ?>
</form>


<?php do_action('woocommerce_after_edit_account_form'); ?>
