@if ( ! defined( 'ABSPATH' ) )
  @php
    exit; // Exit if accessed directly.
  @endphp
@endif

@php do_action( 'woocommerce_before_customer_login_form' ); @endphp


<section class="grid grid-cols-2 gap-12">
  <div class="min-h-full flex justify-center py-12 px-4 sm:px-6 lg:px-8" id="customer_login">
    <div class="max-w-md w-full space-y-8">

      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        {!! _e('Login', 'woocommerce') !!}
      </h2>

      <form class="mt-8 space-y-6 login" method="post">
        @php do_action('woocommerce_login_form_start'); @endphp

        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="username">@php esc_html_e('Username or email address', 'woocommerce'); @endphp<span
                class="required">*</span></label>

            <input type="text"
                   name="username" id="username"
                   autocomplete="username"
                   value="@php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; @endphp"
                   class="mt-2 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
                   placeholder="exemple@exemple.com"
            >
          </div>


          <div>
            <label for="password" class="sr-only">@php esc_html_e('Password', 'woocommerce'); @endphp</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
                   placeholder="Password">
          </div>
        </div>

        @php do_action('woocommerce_login_form'); @endphp


        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded"
                   name="rememberme" type="checkbox"
                   id="rememberme" value="forever"
            >
            <label for="remember-me"
                   class="ml-2 block text-sm text-gray-900"> @php esc_html_e('Remember me', 'woocommerce'); @endphp </label>
          </div>

          <div class="text-sm">
            <a href="{!! wp_lostpassword_url() !!}" class="font-medium text-primary">
              @php esc_html_e('Lost your password?', 'woocommerce'); @endphp
            </a>
          </div>
        </div>

        <div>
          @php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); @endphp

          <button type="submit"
                  class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-hover"
                  name="login"
                  value="@php esc_attr_e('Log in', 'woocommerce'); @endphp">
            @php esc_html_e('Log in', 'woocommerce'); @endphp
          </button>
        </div>

        @php do_action('woocommerce_login_form_end'); @endphp
      </form>
    </div>
  </div>

  {{--  Register --}}
  <div class="min-h-full flex justify-center py-12 px-4 sm:px-6 lg:px-8" id="customer_register">
    <div class="max-w-md w-full space-y-8">

      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        {!! _e('Register', 'woocommerce') !!}
      </h2>

      <form class="mt-8 space-y-6 register" method="post">

        @php do_action('woocommerce_register_form_tag'); @endphp
        @php do_action('woocommerce_register_form_start'); @endphp

        @if ( 'no' === get_option('woocommerce_registration_generate_username') )
          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label class="sr-only" for="reg_username">
              @php esc_html_e('Username', 'woocommerce'); @endphp
              <span class="required">*</span>
            </label>
            <input type="text"
                   class="mt-2 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
                   name="username"
                   id="reg_username" autocomplete="username"
                   value="@php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; @endphp"/>
          </p>
        @endif

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
          <label for="reg_email">@php esc_html_e('Email', 'woocommerce'); @endphp<span
              class="required">*</span>
          </label>

          <input type="email"
                 class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
                 name="email"
                 id="reg_email"
                 placeholder="exemple@exemple.com"
                 autocomplete="email"
                 value="@php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; @endphp"/>
        </p>

        @if ( 'no' === get_option('woocommerce_registration_generate_password') )

          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_password">@php esc_html_e('Password', 'woocommerce'); @endphp<span
                class="required">*</span></label>
            <input type="password"
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm"
                   name="password"
                   id="reg_password"
                   autocomplete="new-password"/>
          </p>

        @else
          <p class="text-sm">
            {{_e('A password will be sent to your email address.', 'woocommerce')}}
          </p>
        @endif
        @php do_action('woocommerce_register_form'); @endphp

        <p class="woocommerce-form-row form-row">
          @php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); @endphp

          <button type="submit"
                  class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                  name="register"
                  value="@php esc_attr_e('Register', 'woocommerce'); @endphp">
            {{_e('Register', 'woocommerce')}}
          </button>
        </p>

        @php do_action('woocommerce_register_form_end'); @endphp

      </form>
    </div>
  </div>
</section>

@php do_action('woocommerce_after_customer_login_form'); @endphp
