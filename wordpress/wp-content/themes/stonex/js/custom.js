(function ($) {
    //thumb overlays
    $('.es-carousel ul li, .three_columns_portfolio_item').hover(function () {
        //Display the caption
        $(this).find('.latest_portfolio_overlay, .portfolio_overlay').stop(false, true).fadeIn(500);
    }, function () {
        //Hide the caption
        $(this).find('.latest_portfolio_overlay, .portfolio_overlay').stop(false, true).fadeOut(500);
    });

    //tabs and accordions
    $(function () {
        //accordion
        $(".accordion").fptabs("div.pane", {
            tabs: '.tab',
            effect: 'slide'
        });
        //tabs
        $("ul.tabs").fptabs("div.panes > div", {
            effect: 'fade'
        });
    });
    //vertical tabs
    $(function () {
        $('#vertical_tabs, #vertical_tabs1, #vertical_tabs2, #vertical_tabs3, #vertical_tabs4, #vertical_tabs5, #vertical_tabs6, #vertical_tabs7, #vertical_tabs8, #vertical_tabs9, #vertical_tabs10').tabs({
            fx: [{
                opacity: 'toggle',
                duration: 90
            }, // hide option
            {
                opacity: 'toggle',
                duration: 90
            }]
        }); // show option
    });

    //toggles
    $(".toggle_title").toggle(

    function () {
        $(this).addClass('toggle_active');
        $(this).siblings('.toggle_content').slideDown("fast");
    }, function () {
        $(this).removeClass('toggle_active');
        $(this).siblings('.toggle_content').slideUp("fast");
    });


    // superfish menu
    $(function () {
        $('ul.sf-menu').superfish({
            animation: {
                height: 'show'
            }
        });
    });
    //prettyphoto		
    $("a[rel^='portfolio'], a[rel^='gallery_img']").prettyPhoto({
        theme: 'pp_default',
        default_width: 500,
        overlay_gallery: false
    });

    $("a[rel^='recent_projects']").prettyPhoto({
        theme: 'pp_default',
        default_width: 290,
        default_height: 344,
        overlay_gallery: false
    });

    //back to top
    $(function () {
       $('a[href=#top]').click(function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });
    });
    //testimonial fader
    $('#testimonial_slider blockquote').quovolver();

    //tooltips
    $(".tool_tip_content").hover(function () {
        $(this).next(".tooltip, .tooltip_links_video, .tooltip_links_more").stop(true, true).animate({
            opacity: "show",
            bottom: "20"
        }, "slow");
    }, function () {
        $(this).next(".tooltip, .tooltip_links_video, .tooltip_links_more").animate({
            opacity: "hide",
            bottom: "20"
        }, "fast");
    });
	
	//subscribe icons hover
    $('.subscribe li.subscribe_facebook').hover(function () {
        //Display the caption
        $(this).stop(true, true).toggleClass('subscribe_facebook_hover').fadeIn(400);
    }, function () {
        //Hide the caption
        $(this).stop(true, true).toggleClass('subscribe_facebook_hover');
    });
    //isotope
    $(function () {

        var $container = $('.single_column_portfolio, .three_columns_portfolio, .two_columns_portfolio,  .list_style_portfolio');

        $container.isotope({
            itemSelector: '.single_column_portfolio_item, .three_columns_portfolio_item, .two_columns_portfolio_item, .list_style_portfolio_item'
        });


        var $optionSets = $('.option-set'),
            $optionLinks = $optionSets.find('a');

        $optionLinks.click(function () {
            var $this = $(this);
            // don't proceed if already selected
            if ($this.hasClass('selected')) {
                return false;
            }
            var $optionSet = $this.parents('.option-set');
            $optionSet.find('.selected').removeClass('selected');
            $this.addClass('selected');

            // make option object dynamically, i.e. { filter: '.my-filter-class' }
            var options = {},
                key = $optionSet.attr('data-option-key'),
                value = $this.attr('data-option-value');
            // parse 'false' as false boolean
            value = value === 'false' ? false : value;
            options[key] = value;
            if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
                // changes in layout modes need extra logic
                changeLayoutMode($this, options)
            } else {
                // otherwise, apply new options
                $container.isotope(options);
            }

            return false;
        });

    });
	//mobile menu
	$('#nav').mobileMenu({
		switchWidth: 767,
		prependTo: '#header'
		});
	//elastislide
	$('#carousel').elastislide({
				imageW 	: 205,
				minItems	: 1,
				margin      : 40
			});

    // don't display untill everything is loaded
    document.documentElement.className = 'js';
    $('html').removeClass();
	
	// search effect
	$("input#searchsubmit").click(function(){
	if( $('#search form input#s').val() == '' ){
			return false;
		}
	});
	$("input#searchsubmit").mouseover(function(){
		$('#search form input#s').animate({ 
		width: '127px',
		marginRight: '-6px',
		paddingLeft: '10px',
		paddingRight: '10px'
		}).focus();
	});
	$("#search").mouseleave(function(){
		value = '';
		$('#search form input#s').animate({ 
		width: '4px',
		marginRight: '0',
		padding: '0'
		}).blur().val(value);
	});



    //end
})(jQuery);