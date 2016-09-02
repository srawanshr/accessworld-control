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

elixir(function(mix) {
    mix.styles(['bootstrap.css'], 'public/css/bootstrap.min.css')
        .styles(['materialadmin.css'], 'public/css/materialadmin.min.css')
        .styles(['/libs/DataTables/jquery.dataTables.css'], 'public/css/libs/DataTables/jquery.dataTables.min.css')
        .styles(['/libs/DataTables/TableTools.css'], 'public/css/libs/DataTables/TableTools.min.css')
        .styles(['/libs/DataTables/extensions/dataTables.colVis.css'], 'public/css/libs/DataTables/extensions/dataTables.colVis.min.css')
        .styles(['/libs/DataTables/extensions/dataTables.tableTools.css'], 'public/css/libs/DataTables/extensions/dataTables.tableTools.min.css')
        .styles(['/libs/toastr/toastr.css'], 'public/css/libs/toastr/toastr.min.css');

    mix.scripts(['App.js'], 'public/js/core/source/App.min.js')
        .scripts(['AppCard.js'], 'public/js/core/source/AppCard.min.js')
        .scripts(['AppForm.js'], 'public/js/core/source/AppForm.min.js')
        .scripts(['AppNavigation.js'], 'public/js/core/source/AppNavigation.min.js')
        .scripts(['AppNavSearch.js'], 'public/js/core/source/AppNavSearch.min.js')
        .scripts(['AppToast.js'], 'public/js/core/source/AppToast.min.js')
        .scripts(['AppVendor.js'], 'public/js/core/source/AppVendor.min.js')
        .scripts(['AppBootBox.js'], 'public/js/core/source/AppBootBox.min.js')
        .scripts(['toastr.js'], 'public/js/libs/toastr/toastr.min.js');
});
