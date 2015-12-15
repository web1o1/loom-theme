/* Placeholders.js v3.0.2 */
(function(t){"use strict";function e(t,e,r){return t.addEventListener?t.addEventListener(e,r,!1):t.attachEvent?t.attachEvent("on"+e,r):void 0}function r(t,e){var r,n;for(r=0,n=t.length;n>r;r++)if(t[r]===e)return!0;return!1}function n(t,e){var r;t.createTextRange?(r=t.createTextRange(),r.move("character",e),r.select()):t.selectionStart&&(t.focus(),t.setSelectionRange(e,e))}function a(t,e){try{return t.type=e,!0}catch(r){return!1}}t.Placeholders={Utils:{addEventListener:e,inArray:r,moveCaret:n,changeType:a}}})(this),function(t){"use strict";function e(){}function r(){try{return document.activeElement}catch(t){}}function n(t,e){var r,n,a=!!e&&t.value!==e,u=t.value===t.getAttribute(V);return(a||u)&&"true"===t.getAttribute(P)?(t.removeAttribute(P),t.value=t.value.replace(t.getAttribute(V),""),t.className=t.className.replace(R,""),n=t.getAttribute(z),parseInt(n,10)>=0&&(t.setAttribute("maxLength",n),t.removeAttribute(z)),r=t.getAttribute(D),r&&(t.type=r),!0):!1}function a(t){var e,r,n=t.getAttribute(V);return""===t.value&&n?(t.setAttribute(P,"true"),t.value=n,t.className+=" "+I,r=t.getAttribute(z),r||(t.setAttribute(z,t.maxLength),t.removeAttribute("maxLength")),e=t.getAttribute(D),e?t.type="text":"password"===t.type&&K.changeType(t,"text")&&t.setAttribute(D,"password"),!0):!1}function u(t,e){var r,n,a,u,i,l,o;if(t&&t.getAttribute(V))e(t);else for(a=t?t.getElementsByTagName("input"):f,u=t?t.getElementsByTagName("textarea"):h,r=a?a.length:0,n=u?u.length:0,o=0,l=r+n;l>o;o++)i=r>o?a[o]:u[o-r],e(i)}function i(t){u(t,n)}function l(t){u(t,a)}function o(t){return function(){b&&t.value===t.getAttribute(V)&&"true"===t.getAttribute(P)?K.moveCaret(t,0):n(t)}}function c(t){return function(){a(t)}}function s(t){return function(e){return A=t.value,"true"===t.getAttribute(P)&&A===t.getAttribute(V)&&K.inArray(C,e.keyCode)?(e.preventDefault&&e.preventDefault(),!1):void 0}}function d(t){return function(){n(t,A),""===t.value&&(t.blur(),K.moveCaret(t,0))}}function v(t){return function(){t===r()&&t.value===t.getAttribute(V)&&"true"===t.getAttribute(P)&&K.moveCaret(t,0)}}function g(t){return function(){i(t)}}function p(t){t.form&&(T=t.form,"string"==typeof T&&(T=document.getElementById(T)),T.getAttribute(U)||(K.addEventListener(T,"submit",g(T)),T.setAttribute(U,"true"))),K.addEventListener(t,"focus",o(t)),K.addEventListener(t,"blur",c(t)),b&&(K.addEventListener(t,"keydown",s(t)),K.addEventListener(t,"keyup",d(t)),K.addEventListener(t,"click",v(t))),t.setAttribute(j,"true"),t.setAttribute(V,x),(b||t!==r())&&a(t)}var f,h,b,m,A,y,E,x,L,T,S,N,w,B=["text","search","url","tel","email","password","number","textarea"],C=[27,33,34,35,36,37,38,39,40,8,46],k="#ccc",I="placeholdersjs",R=RegExp("(?:^|\\s)"+I+"(?!\\S)"),V="data-placeholder-value",P="data-placeholder-active",D="data-placeholder-type",U="data-placeholder-submit",j="data-placeholder-bound",q="data-placeholder-focus",Q="data-placeholder-live",z="data-placeholder-maxlength",F=document.createElement("input"),G=document.getElementsByTagName("head")[0],H=document.documentElement,J=t.Placeholders,K=J.Utils;if(J.nativeSupport=void 0!==F.placeholder,!J.nativeSupport){for(f=document.getElementsByTagName("input"),h=document.getElementsByTagName("textarea"),b="false"===H.getAttribute(q),m="false"!==H.getAttribute(Q),y=document.createElement("style"),y.type="text/css",E=document.createTextNode("."+I+" { color:"+k+"; }"),y.styleSheet?y.styleSheet.cssText=E.nodeValue:y.appendChild(E),G.insertBefore(y,G.firstChild),w=0,N=f.length+h.length;N>w;w++)S=f.length>w?f[w]:h[w-f.length],x=S.attributes.placeholder,x&&(x=x.nodeValue,x&&K.inArray(B,S.type)&&p(S));L=setInterval(function(){for(w=0,N=f.length+h.length;N>w;w++)S=f.length>w?f[w]:h[w-f.length],x=S.attributes.placeholder,x?(x=x.nodeValue,x&&K.inArray(B,S.type)&&(S.getAttribute(j)||p(S),(x!==S.getAttribute(V)||"password"===S.type&&!S.getAttribute(D))&&("password"===S.type&&!S.getAttribute(D)&&K.changeType(S,"text")&&S.setAttribute(D,"password"),S.value===S.getAttribute(V)&&(S.value=x),S.setAttribute(V,x)))):S.getAttribute(P)&&(n(S),S.removeAttribute(V));m||clearInterval(L)},100)}K.addEventListener(t,"beforeunload",function(){J.disable()}),J.disable=J.nativeSupport?e:i,J.enable=J.nativeSupport?e:l}(this),function(t){"use strict";var e=t.fn.val,r=t.fn.prop;Placeholders.nativeSupport||(t.fn.val=function(t){var r=e.apply(this,arguments),n=this.eq(0).data("placeholder-value");return void 0===t&&this.eq(0).data("placeholder-active")&&r===n?"":r},t.fn.prop=function(t,e){return void 0===e&&this.eq(0).data("placeholder-active")&&"value"===t?"":r.apply(this,arguments)})}(jQuery);

/*-----------------------------------------------------------------------------------*/
/*	WORDPRESS FIXES
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function ($) {

	$('p:empty').remove();
	
	/**
	 * Newsletter widget Fixes
	 */
	$('.widget_ns_mailchimp form label').each(function(){
		var text = $(this).text();
		text = text.replace(':','');
		$(this).next().attr('placeholder', text);
	});
	
	/**
	 * One Page Version Stuff
	 */
	if( wp_data.site_version == 'one-page' ){
		$(window).scroll(function(){
			$('#menu-standard-navigation a[href^="#"]').each(function(){
				var scrollHref = $(this).attr('href');
				if( $(scrollHref).length > 0 ){
					if( $(window).scrollTop() > $(scrollHref).offset().top - 240 ) {
						$('#menu-standard-navigation a[href^="#"]').removeClass('active');
						$(this).addClass('active');
					}
				}
			});
		});
		jQuery('#menu-standard-navigation a[href^="#"]').click(function(){
			var url = $(this).attr('href');
			if( $(url).length > 0 ){
				$("html, body").animate({ scrollTop: $(url).offset().top - 61 }, 500);
			}
			return false;
		});
	}
	
	jQuery(document).on('click', '.yamm .dropdown-menu', function(e) {
	  e.stopPropagation()
	});
	jQuery('.dropdown ul li.menu-item-object-mega_menu').parents('.dropdown').addClass('yamm-fw');
	jQuery('.woocommerce-result-count').appendTo('h1.page-title');
	
});
/*-----------------------------------------------------------------------------------*/
/*	STICKY NAVIGATION
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
"use strict";
	
	/**
	 * Check that we're going to use the fixed header
	 * @var wp_data.fixed_header
	 * @type boolean
	 */
	if( wp_data.fixed_header == 1 ){
	
	    var menu = jQuery('.navbar'),
	        pos = menu.offset();
	
	    jQuery(window).scroll(function () {
	        if (jQuery(this).scrollTop() > pos.top + menu.height() && menu.hasClass('default') && jQuery(this).scrollTop() > 150) {
	            menu.fadeOut('fast', function () {
	                jQuery(this).removeClass('default').addClass('fixed').fadeIn('fast');
	            });
	        } else if (jQuery(this).scrollTop() <= pos.top + 150 && menu.hasClass('fixed')) {
	            menu.fadeOut(0, function () {
	                jQuery(this).removeClass('fixed').addClass('default').fadeIn(0);
	            });
	        }
	    });
	    
	}

});
jQuery(document).ready(function() {
"use strict";
	var $offset = jQuery('.offset'),
		$navbar = jQuery('.navbar'),
		$navbarHeight = jQuery('.navbar').height();
	
	if( $navbarHeight < 103 )
		$navbarHeight = 103;
		
	$offset.css('padding-top', $navbarHeight + 'px'); 
	
	jQuery(window).resize(function() {
		$offset.css('padding-top', $navbarHeight + 'px');        
	}); 
}); 
/*-----------------------------------------------------------------------------------*/
/*	OWL CAROUSEL
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
"use strict";    
     jQuery(".owlcarousel").owlCarousel({
        navigation: true,
        navigationText : ['<i class="icon-left-open"></i>','<i class="icon-right-open"></i>'],
        pagination: false,
        rewindNav: false,
        items: 3,
        mouseDrag: true,
        itemsDesktop: [1200, 3],
        itemsDesktopSmall: [1024, 3],
        itemsTablet: [970, 2],
        itemsMobile: [767, 1]
    });

    jQuery(".owl-clients").owlCarousel({

        autoPlay: 9000,
        rewindNav: false,
        items: 6,
        itemsDesktop: [1200, 6],
        itemsDesktopSmall: [1024, 5],
        itemsTablet: [768, 3],
        itemsMobile: [480, 2],
        navigation: false,
        pagination: false

    });
    
    var owl = jQuery(".owl-portfolio-slider:not('.ebor-portfolio-slider')");

    owl.owlCarousel({
        navigation: false,
        autoHeight: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });

    // Custom Navigation Events
    jQuery(".slider-next").click(function () {
        owl.trigger('owl.next');
    });
    jQuery(".slider-prev").click(function () {
        owl.trigger('owl.prev');
    });
    jQuery(document).keydown(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 37) {
            owl.trigger('owl.prev');
        } else if (code == 39) {
            owl.trigger('owl.next');
        }
    });
    

});
/*-----------------------------------------------------------------------------------*/
/*	FANCYBOX
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
"use strict";
    jQuery('.fancybox-media, a[href$=".gif"], a[href$=".jpg"], a[href$=".png"], a[href$=".bmp"]').fancybox({
        arrows: true,
        padding: 0,
        closeBtn: true,
        openEffect: 'fade',
        closeEffect: 'fade',
        prevEffect: 'fade',
        nextEffect: 'fade',
        helpers: {
            media: {},
            overlay: {
                locked: false
            },
            buttons: false,
            thumbs: {
                width: 50,
                height: 50
            },
            title: {
                type: 'inside'
            }
        },
        beforeLoad: function () {
            var el, id = jQuery(this.element).data('title-id');
            if (id) {
                el = jQuery('#' + id);
                if (el.length) {
                    this.title = el.html();
                }
            }
        }
    });
});
/*-----------------------------------------------------------------------------------*/
/*	PRELOADER
/*-----------------------------------------------------------------------------------*/
jQuery(window).load(function(){
"use strict";
	jQuery('#status').fadeOut();
	jQuery('#preloader').delay(350).fadeOut('slow');
});
/*-----------------------------------------------------------------------------------*/
/*	ISOTOPE FULLSCREEN PORTFOLIO
/*-----------------------------------------------------------------------------------*/

var isotopeBreakpoints = [
    { min_width: 1680, columns: 5 },
    { min_width: 1440, max_width: 1680, columns: 5 },
    { min_width: 1024, max_width: 1440, columns: 4 },
    { min_width: 768, max_width: 1024, columns: 3 },
    { max_width: 768, columns: 1 }
];

jQuery(window).load(function () {
"use strict";

    var $container = jQuery('.full-portfolio .items');

    $container.isotope({
        itemSelector: '.item',
        layoutMode: 'fitRows'
    });

    // hook to window resize to resize the portfolio items for fluidity / responsiveness
    jQuery(window).smartresize(function() {
        var windowWidth = jQuery(window).width();
        var windowHeight = jQuery(window).height();

        for ( var i = 0; i < isotopeBreakpoints.length; i++ ) {
            if (windowWidth >= isotopeBreakpoints[i].min_width || !isotopeBreakpoints[i].min_width) {
                if (windowWidth < isotopeBreakpoints[i].max_width || !isotopeBreakpoints[i].max_width) {
                    $container.find('.item').each(function() {
                        jQuery(this).width( Math.floor( $container.width() / isotopeBreakpoints[i].columns ) );
                    });

                    break;
                }
            }
        }
    });
    
    jQuery(window).trigger('resize').trigger( 'smartresize' );

    jQuery('.filter li a').click(function () {

        jQuery('.filter li a').removeClass('active');
        jQuery(this).addClass('active');

        var selector = jQuery(this).attr('data-filter');
        jQuery('.full-portfolio li a').attr({ 'rel' : 'portfolio' });
        jQuery(selector).find('a').attr({ 'rel' : 'active' });
        $container.isotope({
            filter: selector
        });

        return false;
    });
    
    setTimeout(function(){
    	$container.isotope('layout');
    }, 300);
    
});
/*-----------------------------------------------------------------------------------*/
/*	ISOTOPE CLASSIC PORTFOLIO
/*-----------------------------------------------------------------------------------*/
jQuery(window).load(function () {
"use strict";
    var $container = jQuery('.fix-portfolio .items');
    
    $container.isotope({
        itemSelector: '.fix-portfolio .item',
        layoutMode: 'fitRows'
    });

    jQuery('.fix-portfolio .filter li a').click(function () {

        jQuery('.fix-portfolio .filter li a').removeClass('active');
        jQuery(this).addClass('active');

        var selector = jQuery(this).attr('data-filter');
        jQuery('.fix-portfolio li a').attr({ 'rel' : 'portfolio' });
        jQuery(selector).find('a').attr({ 'rel' : 'active' });
        $container.isotope({
            filter: selector
        });

        return false;
    });
    
    setTimeout(function(){
    	$container.isotope('layout');
    }, 300);
});
/*-----------------------------------------------------------------------------------*/
/*	MENU
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
"use strict";
    jQuery('.js-activated').dropdownHover({
        instantlyCloseOthers: false,
        delay: 0
    }).dropdown();
});
/*-----------------------------------------------------------------------------------*/
/*	IMAGE ICON HOVER
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
"use strict";
    jQuery('.icon-overlay a').prepend('<span class="icn-more"></span>');
});
/*-----------------------------------------------------------------------------------*/
/*	PARALLAX MOBILE
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
"use strict";
    if (navigator.userAgent.match(/Android/i) ||
        navigator.userAgent.match(/webOS/i) ||
        navigator.userAgent.match(/iPhone/i) ||
        navigator.userAgent.match(/iPad/i) ||
        navigator.userAgent.match(/iPod/i) ||
        navigator.userAgent.match(/BlackBerry/i)) {
        jQuery('.parallax').addClass('mobile');
    }
});
/*-----------------------------------------------------------------------------------*/
/*	TABS
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
"use strict";
    jQuery('.tabs.services').easytabs({
        animationSpeed: 300,
        updateHash: false,
        cycle: 5000
    });
});
/*-----------------------------------------------------------------------------------*/
/*	DATA REL
/*-----------------------------------------------------------------------------------*/
jQuery('a[data-rel]').each(function () {
"use strict";
    jQuery(this).attr('rel', jQuery(this).data('rel'));
});
/*-----------------------------------------------------------------------------------*/
/*	TOOLTIP
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
"use strict";
    if (jQuery("[rel=tooltip]").length) {
        jQuery("[rel=tooltip]").tooltip();
    }
});
/*-----------------------------------------------------------------------------------*/
/*	VIDEO
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
"use strict";
    jQuery('.player').fitVids();
});
/*-----------------------------------------------------------------------------------*/
/*	PRETTIFY
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
"use strict";
    window.prettyPrint && prettyPrint()
});
/*-----------------------------------------------------------------------------------*/
/*	NAV BASE LINK
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($) {

	jQuery('a.js-activated').not('a.js-activated[href^="#"]').click(function(){
		var url = $(this).attr('href');
		window.location.href = url;
		return true;
	});
		
});