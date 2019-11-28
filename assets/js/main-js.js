(function ($) {
    $(document).ready(function () {

        $(".navbar").hover(function () {
            $(".navbar").toggleClass("navbar-desaparece");
        });

        $('.boton-menu').click(function () {
            $('#menu-mobile').toggleClass('esconde-menu-mobile');
        });

        /*$(document).scroll(function() {
            var y = $(this).scrollTop();
            if (y > 200) {
            console.log('200');
            $('#barra-menu').addClass('esconde-barra');
            } else {
            $('#barra-menu').removeClass('esconde-barra');
            }
        });*/

        $(window).scroll(function () {
            if ($(this).scrollTop() > 700) {
                $('#barramenu').addClass('escondebarra');
                $('#menu-scroll').removeClass('esconde-menu-scroll');
            } else {
                $('#barramenu').removeClass('escondebarra');
                $('#menu-scroll').addClass('esconde-menu-scroll');
            }
        });


        $('#contenedor-detalle-categoria > div:first-child').addClass('selected');
        $('.js-selectores-ul .js-selectores-li').each(function () {

            $(this).on('click', function () {
                var selectorId = $(this).data('name');
                $('.detalle-categoria.selected').removeClass('selected');
                $('#contenedor-detalle-categoria').find('#' + selectorId).addClass('selected');
            });
        });

        $(".owl-carousel-clubes").owlCarousel({
            loop: false,
            nav: true,
            dots: true,
            margin: 10,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 6,
                }
            }
        });

        $(".owl-carousel-eventos").owlCarousel({
            loop: true,
            autoplay: true,
            nav: false,
            dots: true,
            margin: 0,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 4,
                }
            }
        });

        $('.tp-bgimg').addClass('cabecera-pagina');

        // $(".owl-next").css({
        //     'position': 'absolute',
        //     'top': '140px',
        //     'right': '-30px',
        //     'transform': 'scale(2)',
        // });

        // $(".owl-prev").css({
        //     'position': 'absolute',
        //     'top': '140px',
        //     'left': '-30px',
        //     'transform': 'scale(2)',
        // });

        $('.clocks').each(function () {

            let $this = $(this),
                finalDate = $(this).data('countdown');

            $this.countdown(finalDate, function (event) {
                $this.html(event.strftime('%-w Semanas'));
            });

        });

        $(".contenedor-noticias > a:first-child").addClass("col-12 col-md-6");

        $('.modal').click(function (event) {
            event.preventDefault();
            var e = $(this),
                image = e.find('.director').attr('src'),
                title = e.find('.titulo').text(),
                body = e.find('.resumen').text();
            $('#modal-img').attr('src', image);
            $('#modal-title').text(title);
            $('#modal-body').text(body);
            $("#myModal").modal("show");
        });

        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
          })


        // $('.club-card').on('click', function(){
        //     let dataName = $(this).attr('data-name');
        //     console.log(dataName);
        //     $('.club-card--tax').each(function(){
        //         console.log($(this  + dataName));
        //         $('.' + dataName).removeClass('d-none');
        //     });
        // });

        //var selectorRegion = $('#clubes-regiones-selector').val();
        
        $('#clubes-regiones-selector').on('change', function () {
            let rgName = $(this).val();
            //console.log(rgName);
            $('.ch-federados--cards').find('.' + rgName).fadeIn("slow");
        });

        $('.ch-federados--card-link').on('click', function (e) {
            e.preventDefault();
            let rgName = $(this).data('name'),
            deporte = $(this).data('deporte'),
            selectorTex = $('#clubes-regiones-selector').val();
            //console.log(rgName+' / '+deporte+' / '+selectorTex);

            $('.ch-federados--cards').fadeOut("fast");
            $(this).clone().appendTo('.ch-clone-card').fadeIn("slow");
            $('.ch-club-atras--btn').append(' en '+selectorTex);
            $('.ch-club-atras').fadeIn();
            
            array = rgName.split(" ");

            //console.log(array)

            $.each(array, function (index, value) {
                $('.ch-federados--text').each(function (){
                    if ($(this).hasClass(deporte) && $(this).hasClass(selectorTex)){
                        $(this).removeClass('d-none');
                    }
                });
                //$('.ch-federados--info').find('.' + value).removeClass('d-none');
            });
            
            
        });

        $('.ch-club-title').on('click', function (e) {
            e.preventDefault();
            $('.ch-club-body').slideUp();
            $(this).parents('.list-group').find('.ch-club-body').slideDown();
        });

        $('.ch-club-atras--btn').on('click', function (e) {
            e.preventDefault();
            $('.ch-clone-card a').remove();
            $('.ch-club-atras').fadeOut();
            $('.ch-federados--cards').fadeIn("fast");
            $('.ch-federados--info').fadeOut();
        });
    });
}(jQuery));