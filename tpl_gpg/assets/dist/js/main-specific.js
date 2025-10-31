(function ($) {
    "use strict";
    $(document).ready(function() {
        $('#select_cat_list_desktop').append('Sélectionner une catégorie');
        $('#select_cat_list_desktop').selectpicker('refresh');
        $('#select_cat_list_desktop').val(1);

        $("#reset-filter-categorie,#reset-filter-categorie-mobile").on('click', function(e){
            e.preventDefault();
            // var _protocol = window.location.protocol;
            // var _hostname = window.location.hostname;
            // var _href = _protocol + '//' + _hostname + '/conseils';
            // window.location.href = _href;
            var site_lien = window.location;
            var sep = '/';
            //var dynamicUrl = site_lien.origin + sep + site_lien.pathname.split('/')[1] + 's';
            var dynamicUrl = site_lien.origin + sep + 'conseils';
            window.location.href = dynamicUrl;
        })
    });
})(jQuery);

