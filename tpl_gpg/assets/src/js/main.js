jQuery.noConflict();

(function ($) {

    "use strict";

    var $window = $( window );
    var windowsize = $window.width();
    function checkWidth() {
        windowsize = $window.width();
    }

    function popinGranit(){
        var _element = $('.granit__liste li.granit__item');

        _element.each(function(index, item){
            $(item).click(function () {
                $('.popin-granit--active').remove();
                /*  $(this).find('.popin-granit').remove(); */
                //var currentChild = $children.index(this);
                var currentChild = index;
                var graniteListlength = $('.granit__liste > li').length;
                var popinHtml = $(this).find('.popin-granit').html();
                popinHtml = '<li class="popin-granit popin-granit--active">' + popinHtml + '</li>';
                //console.log('currentchild: '+ currentChild);
    
                if(window.matchMedia('(min-width: 992px)').matches){
                    if(graniteListlength < 4){
                        $(popinHtml).insertAfter('.granit__liste > li:last-child');
                    }else if((graniteListlength > 3) && (graniteListlength < 7)) {
                        if(currentChild < 3){
                            $(popinHtml).insertAfter('.granit__liste > li:nth-child(3)');
                        }else if ( (currentChild > 2) && (currentChild < 6)){
                            $(popinHtml).insertAfter('.granit__liste > li:last-child');
                        }
                    }
                }else{
                    if(window.matchMedia('(min-width: 576px)').matches){
                        if(graniteListlength < 3){
                            $(popinHtml).insertAfter('.granit__liste > li:last-child');
                        }else if((graniteListlength > 2) && (graniteListlength < 7)) {
                            if(currentChild < 2){
                                $(popinHtml).insertAfter('.granit__liste > li:nth-child(2)');
                            }else if ( (currentChild > 1) && (currentChild < 4)){
                                $(popinHtml).insertAfter('.granit__liste > li:nth-child(4)');
                            }else{
                                $(popinHtml).insertAfter('.granit__liste > li:last-child');
                            }
                        }
                    }else{
                        $(popinHtml).insertAfter(this);
                    }
                }
    
                $('html, body').animate({
                    scrollTop: $('.popin-granit--active').offset().top - 150 + "px"
                }, 500);

                //console.log('ato isika');
                        
                $('.popin-granit--active .btn-close').on('click', function() {
                    $('.popin-granit--active').remove();
                });
            });
        });
    }

    $(document).ready(function() {

        var countrySlug = ['france', 'inde', 'bresil', 'afrique-du-sud', 'chine', 'norvege', 'suede', 'finlande'];

        $('#toutes').on('click', function(e){
            if(e.target.checked){
                $('*[data-country]').addClass('active');

                $('.provenance__filter .provenance__list-country').each(function(){
                    $(this).find('input[type="checkbox"]').prop('checked', false);
                });
            }else{
                $('*[data-country]').removeClass('active');
            }
        })


        $('.provenance__filter .provenance__list-country').each(function(){
            $(this).find('input[type="checkbox"]').on('click', function(e){
                var _id = e.target.id;
                if(e.target.checked){
                    $('*[data-country]').removeClass('active');
                    $('#toutes').prop('checked', false);


                    $('input[name="provenance[]"]:checked').each(function(){
                        $('path[data-country="'+ $(this).val() +'"]').addClass('active');
                    });

                    
                    $('path[data-country="'+ _id +'"]').addClass('active');
                }else{
                    $('path[data-country="'+ _id +'"]').removeClass('active');

                    var _checked = [];
                    $('input[name="provenance[]"]:checked').each(function(){
                        _checked.push($(this).val());
                    });
                    if(_checked.length == 0){
                        $('*[data-country]').addClass('active');
                        $('#toutes').prop('checked', true);
                    }
                }
            })
            
        });


        countrySlug.forEach(function(item, index){
            $('path[data-country="' + item + '"]').on('click', function(e){
                //console.log(e);
                var _id = '#' + e.target.dataset.country;
                //console.log(_id);
                $(_id).trigger('click');
            })
        });

            var Widthliste = $('.granit__liste').width();
            $('.popin-granit').css('width', (Widthliste - 20));

            // //Color list
            var numberOfItems=6;

            $('.couleur__filter li:lt('+numberOfItems+')').show();

            $('#loadMore').on('click', function(e){
                e.preventDefault();
                $('.couleur__list--more').removeClass('couleur__list--hide');
                $(this).hide();
                $('#showLess').show();
            });

            $('#showLess').on('click', function(e){
                e.preventDefault();
                $('.couleur__list--more').addClass('couleur__list--hide');
                $('#loadMore').show();
                $(this).hide();
            });

            //hp monument slider 
            $('.monument__slider').not('.slick-initialized').slick({
                autoplay: true,
                dots: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    },
        
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
                        
            var currentZoom = 1.0;
            $('#zoom-in').click(function () {
                currentZoom = currentZoom + 0.35;
                if(currentZoom > 2.4){
                    currentZoom = 2.4;
                    return;
                }
                var scaleString = "scale(" + currentZoom + ")";
                $('.image_featured_monument > img').css({"transform":scaleString, "transform-origin":"50% 50%", "transition":"transform 200ms ease-in-out 0s"});
            })
            $('#zoom-out').click(function () {
                currentZoom = currentZoom - 0.35;
                if(currentZoom < 0){
                    currentZoom = 0.3;
                    return;
                }
                var scaleString = "scale(" + currentZoom + ")";
                $('.image_featured_monument > img').css({"transform":scaleString, "transform-origin":"50% 50%", "transition":"transform 200ms ease-in-out 0s"});
            })
            //monument

            //nuancier == nuancier == nuancier
            //filtre par provenances : selectProvenance
            $('#selectProvenance').on('change', function(){
                var $filter = $(this).find('option:selected').val();
                $.ajax({
                    url: ajaxurl, 
                    type: "GET",
                    data: {
                        'action': 'load_nuancier_perprovenance',
                        'provenance': $filter
                    }
                }).done(function(response){
                    //console.log(response);
                    $('#lesNuances').empty();
                    $('#lesNuances').html(response);
                });
            });

            //filtre par color
            $('#filterColor').on('change', function(){
                var $filter = $(this).find('option:selected').val();

                $.ajax({
                    url: ajaxurl, 
                    type: "GET",
                    data: {
                        'action': 'load_nuancier_percolor',
                        'color': $filter
                    }
                }).done(function(response){
                    //console.log(response);
                    $('#lesNuances').empty();
                    $('#lesNuances').html(response);
                });
            });

            // filtre par nom
            $('#filterName').on('keypress', function(e){
                if(e.keyCode == 13){
                    e.preventDefault();
                    var textsearch = $(this).val();

                    $.ajax({
                        url: ajaxurl, 
                        type: "GET",
                        data: {
                            'action': 'load_nuancier_pername',
                            'textsearch': textsearch
                        }
                    }).done(function(response){
                        //console.log(response);

                        $('#lesNuances').empty();
                        $('#lesNuances').html(response);
                    });
                }
            });

            $('#button_search_pername').on('click', function(e){
                e.preventDefault();
                var _event = $.Event('keypress');
                _event.which = 13;
                _event.keyCode = 13;
                $('#filterName').trigger(_event);
            });
            //nuancier == nuancier == nuancier

            $(".menu-burger").click(function(){
                $("body").toggleClass("open-menu");
            });

            $(".catalogue-filters__text, .filter__granit").click(function(){
                $("body").addClass("open-filter");
            });

            $(".filter-close").click(function() {
                $("body").removeClass("open-filter");
            });

            $('#filter-per-categorie').on('click', function(){
                $('.select_cat_list_mobile').toggleClass('shows');
                $('body').toggleClass('pos-fixed');
            });

            $('#close-filter').on('click', function(e){
                e.preventDefault();
                $('#filter-per-categorie').trigger('click');
            });

            $('#select_cat_list li a').on('click', function(){
                $('#filter-per-categorie').trigger('click');
            });

            if ($(window).width() > 1199) { 
                $(".icon-loupe").click(function(e) {
                    e.preventDefault();
                    $("body").toggleClass("open-search");
                    setTimeout(function () { $("#input_search").focus() }, 300);
                });
            }


            //hp slider 
            $('.hp-slider').not('.slick-initialized').slick({
                autoplay: true,
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                useTransform: false,
            }).on('afterChange', function(){
                $('#pause-slider-hp').trigger('click');
                setTimeout(function(){
                    $('#play-slider-hp').trigger('click');
                }, 4000);
            });

            $('#pause-slider-hp').on('click', function() {
                $('.hp-slider').slick('slickPause');
            });
            $('#play-slider-hp').on('click', function() {
                $('.hp-slider').slick('slickPlay');
            });

            //slider Qui sommes-nous
            $('.qsn-slider-wrapper').not('.slick-initialized').slick({
                dots: true,
                autoplay: true,
                infinite: false,
                speed: 2000,
                slidesToShow: 1,
                slidesToScroll: 1,
            });
            //--slider Qui sommes-nous

            $('.faq-item .faq-item-question').on('click', function(){
                $(this).toggleClass('active');
                $(this).siblings('.faq-item-reponse').toggle();
            });

            $('.clickboard').on({
                "click": function() {

                var clipboardText = "";
                clipboardText = $( '#boutonclick' ).val(); 
                copyToClipboard( clipboardText );
                $(this).tooltip({ items: ".clickboard", content: "<span style='color:#324854' >copié !</span>"});
                $(this).tooltip("open");

                },

                "mouseout": function() {      
                $(this).tooltip("disable");   
                }
            });

                function copyToClipboard(text) {

                var textArea = document.createElement( "textarea" );
                textArea.value = text;
                document.body.appendChild( textArea );       
                textArea.select();

                try {
                    var successful = document.execCommand( 'copy' );
                    var msg = successful ? 'successful' : 'unsuccessful';
                    console.log('Copying text command was ' + msg);
                } catch (err) {
                    console.log('Oops, unable to copy',err);
                }    
                document.body.removeChild( textArea );
                }

            $('.select_cat_list').on('change', function() {
                //$('.cat_search').val(this.value);
                var categorie_single = $(this).val();
                //console.log('ito ilay valeur : '+ categorie_single);
                if(categorie_single) {
                    $.ajax({

                        url: ajaxurl,
                        type: 'post',
                    
                        data: {
                            categorie_single: categorie_single,
                            action: 'filter_blog_gpg'

                        },
                        error: function (response) {
                            console.log('erreur');
                        },
                        success: function (response) {
                            window.location.href = response;
                        }

                    });

            }
            });

            var carselect = '0';
            $('#select_cat_list li').on('click',function() {
                carselect = $(this).attr('value');
            
                if(carselect) {
                $.ajax({

                    url: ajaxurl,
                    type: 'post',
                    data: {
                        categorie_single: carselect,
                        action: 'filter_blog_gpg'

                    },
                    error: function (response) {
                        console.log('erreur');
                    },
                    success: function (response) {
                        window.location.replace(response);
                    }

                });

            }  

            });


            if ($("body.category")[0]){
                var current_page_id = get_current_page_id();
                var result = current_page_id.slice(9);
                //console.log('result');

                var final_cat = '';
                // console.log(result);
                // console.log(article_cat_data);

                for(var i in article_cat_data){
                    if(result == article_cat_data[i].slug){
                        final_cat = article_cat_data[i].name;
                        break;
                    }
                }

                $('.filter-option-inner-inner').html(final_cat);
            }

        function get_current_page_id() {
            var page_body = $('body.category');
            var page_id = '';
            if(page_body) {
                var classList = page_body.attr('class').split(/\s+/);

                $.each(classList, function(index, item) {
                    if (item.indexOf('category-') >= 0) {
                        page_id = item;
                        return false;
                    }
                });
            }
            return page_id;
        }


        $('#nos_granit').on('submit', function(e){
            e.preventDefault();
            console.log('manomboka isika izao');
            var provenance_granit = [],
                couleur_granit    = [],
                durabilite_granit = [];
            
            $('input[name="provenance[]"]:checked').each(function(){
                provenance_granit.push($(this).val());
            });
            $('input[name="couleur[]"]:checked').each(function(){
                couleur_granit.push($(this).val());
            });
            $('input[name="qualite[]"]:checked').each(function(){
                durabilite_granit.push($(this).val());
            });
            //console.log(durabilite_granit);
            provenance_granit = provenance_granit.length > 0 ? 'provenance/' + provenance_granit.join('+') + '/' : '';
            couleur_granit = couleur_granit.length > 0 ? 'couleur/' + couleur_granit.join('+') + '/' : '';
            durabilite_granit = durabilite_granit.length > 0 ? 'qualite/' + durabilite_granit.join('+') : '';
            var site_lien = window.location;
            var sep = '/';
            var dynamicUrl = site_lien.origin + sep + site_lien.pathname.split('/')[1]+ sep;
            var dataUrl = provenance_granit + couleur_granit + durabilite_granit;
            window.location.href = dynamicUrl+ dataUrl;
        });


        $('.clic_cat').on('change', function(){

                var style_select = $('#style_select').val();
                var cat_style    = $('option:selected', '#style_select').attr('slug-cat');

                var select_couleur = $('#select_couleur').val();
                var cat_couleur    = $('option:selected', '#select_couleur').attr('slug-cat');

                var select_religion = $('#select_religion').val();
                var cat_religion    = $('option:selected', '#select_religion').attr('slug-cat');

                var select_type = $('#select_type').val();
                var cat_type    = $('option:selected', '#select_type').attr('slug-cat');

                var select_granit = $('#select_granit').val();
                var cat_granit    = $('option:selected', '#select_granit').attr('slug-cat');

                var select_prix = $('#select_prix').val();
                var cat_prix    = $('option:selected', '#select_prix').attr('slug-cat');

                var site_lien = window.location;
                var sep = '/';
                var dynamicUrl = site_lien.origin + sep + site_lien.pathname.split('/')[1]+ sep;
                var dataUrl = style_select+sep+select_couleur+sep+select_religion+sep+select_type+sep+select_granit+sep+select_prix;
                window.location.href = dynamicUrl+ dataUrl;
        
        });

        $('#reset-filter-global, #refresh_resultat').on('click', function(e){
            e.preventDefault();
            var site_lien = window.location;
            var sep = '/';
            var dynamicUrl = site_lien.origin + sep + site_lien.pathname.split('/')[1];
            window.location.href = dynamicUrl;
        })

        function reset_catalogue_par_item(id){
            $(id).on('click', function(e){
                e.preventDefault();
                var dataFilter = $(this).attr('data-filter');
                var style_select = dataFilter === 'Style' ? 'Style' : $('#style_select').val();
                var select_couleur = dataFilter === 'Couleur' ? 'Couleur' : $('#select_couleur').val();
                var select_religion = dataFilter === 'Religion' ? 'Religion' : $('#select_religion').val();
                var select_type = dataFilter === 'Type' ? 'Type' : $('#select_type').val();
                var select_granit = dataFilter === 'Nuance' ? 'Nuance' : $('#select_granit').val();
                var select_prix = dataFilter === 'Prix' ? 'Prix' : $('#select_prix').val();
                var site_lien = window.location;
                var sep = '/';
                var dynamicUrl = site_lien.origin + sep + site_lien.pathname.split('/')[1]+ sep;
                var dataUrl = style_select+sep+select_couleur+sep+select_religion+sep+select_type+sep+select_granit+sep+select_prix;
                window.location.href = dynamicUrl+ dataUrl;
            });
        }
        reset_catalogue_par_item('#reset-filter-style');
        reset_catalogue_par_item('#reset-filter-couleur');
        reset_catalogue_par_item('#reset-filter-religion');
        reset_catalogue_par_item('#reset-filter-type');
        reset_catalogue_par_item('#reset-filter-nuance');
        reset_catalogue_par_item('#reset-filter-prix');

        
            $('.js-slick-md').not('.slick-initialized').slick({
                dots: true,
                infinite: false,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                mobileFirst: true,
                responsive: [
                    {
                        breakpoint: 480,
                        settings: {
                        slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                        slidesToShow: 4
                        }
                    }
                ]
            });

            $('.js-slick-md-perso').not('.slick-initialized').slick({
                dots: true,
                infinite: false,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                mobileFirst: true,
                responsive: [
                    {
                        breakpoint: 480,
                        settings: {
                        slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 1023,
                        settings: 'unslick'
                    }
                ]
            });

            var _target =  window.location.hash;
            _target = _target.replace('#', '');
            if(_target){
                $('html, body').animate({
                    scrollTop: $("#" + _target).offset().top - 90 + "px"
                }, 800);
                return false;
            }

            //call popinGranit
            popinGranit();
    });

    $(window).on('load resize orientationchange', function(){
        if ($(window).width() < 1025) {
            $('.monument__similaires__wrap').not('.slick-initialized').slick({
                dots: true,
                infinite: false,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 480,
                        settings: {
                        slidesToShow: 1
                        }
                    }
                    ]
            });
        }
    });

    $(window).on('load', function(){
        localStorage.clear();
    })

})(jQuery);

