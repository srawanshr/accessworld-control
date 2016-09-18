const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
elixir.config.sourcemaps = false;

elixir(function (mix) {
    mix.styles(['libs/summernote.css'], 'public/css/libs/summernote/summernote.min.css')
        .styles(['libs/datatables.css'], 'public/js/DataTables/datatables.min.css')
        .styles(['libs/dropify.css'], 'public/css/libs/dropify/dropify.min.css');

    mix.scripts(['App.js'], 'public/js/core/source/App.min.js')
        .scripts(['AppCard.js'], 'public/js/core/source/AppCard.min.js')
        .scripts(['AppForm.js'], 'public/js/core/source/AppForm.min.js')
        .scripts(['AppNavigation.js'], 'public/js/core/source/AppNavigation.min.js')
        .scripts(['AppNavSearch.js'], 'public/js/core/source/AppNavSearch.min.js')
        .scripts(['AppToast.js'], 'public/js/core/source/AppToast.min.js')
        .scripts(['AppVendor.js'], 'public/js/core/source/AppVendor.min.js')
        .scripts(['AppBootBox.js'], 'public/js/core/source/AppBootBox.min.js')
        .scripts(['libs/toastr.js'], 'public/js/libs/toastr/toastr.min.js')
        .scripts(['pages/form_checkbox_role.js'], 'public/js/pages/form_checkbox_role.min.js')
        .scripts(['pages/dt_user.js'], 'public/js/pages/dt_user.min.js')
        .scripts(['pages/dt_order.js'], 'public/js/pages/dt_order.min.js')
        .scripts(['pages/dt_vps_order.js'], 'public/js/pages/dt_vps_order.min.js')
        .scripts(['pages/dt_web_email_order.js'], 'public/js/pages/dt_web_email_order.min.js')
        .scripts(['pages/dt_customer.js'], 'public/js/pages/dt_customer.min.js')
        .scripts(['pages/dt_staff.js'], 'public/js/pages/dt_staff.min.js')
        .scripts(['pages/dt_vps_provision.js'], 'public/js/pages/dt_vps_provision.min.js')
        .scripts(['pages/dt_dhcp_map.js'], 'public/js/pages/dt_dhcp_map.min.js')
        .scripts(['pages/dt_ip.js'], 'public/js/pages/dt_ip.min.js')
        .scripts(['pages/form_order.js'], 'public/js/pages/form_order.min.js');

    mix.scripts([
        'node_modules/vue/dist/vue.js'
    ], 'public/assets/js/vue.js', './')
});
