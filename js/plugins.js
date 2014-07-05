/*! http://mths.be/placeholder v2.0.7 by @mathias */
;(function(f,h,$){var a='placeholder' in h.createElement('input'),d='placeholder' in h.createElement('textarea'),i=$.fn,c=$.valHooks,k,j;if(a&&d){j=i.placeholder=function(){return this};j.input=j.textarea=true}else{j=i.placeholder=function(){var l=this;l.filter((a?'textarea':':input')+'[placeholder]').not('.placeholder').bind({'focus.placeholder':b,'blur.placeholder':e}).data('placeholder-enabled',true).trigger('blur.placeholder');return l};j.input=a;j.textarea=d;k={get:function(m){var l=$(m);return l.data('placeholder-enabled')&&l.hasClass('placeholder')?'':m.value},set:function(m,n){var l=$(m);if(!l.data('placeholder-enabled')){return m.value=n}if(n==''){m.value=n;if(m!=h.activeElement){e.call(m)}}else{if(l.hasClass('placeholder')){b.call(m,true,n)||(m.value=n)}else{m.value=n}}return l}};a||(c.input=k);d||(c.textarea=k);$(function(){$(h).delegate('form','submit.placeholder',function(){var l=$('.placeholder',this).each(b);setTimeout(function(){l.each(e)},10)})});$(f).bind('beforeunload.placeholder',function(){$('.placeholder').each(function(){this.value=''})})}function g(m){var l={},n=/^jQuery\d+$/;$.each(m.attributes,function(p,o){if(o.specified&&!n.test(o.name)){l[o.name]=o.value}});return l}function b(m,n){var l=this,o=$(l);if(l.value==o.attr('placeholder')&&o.hasClass('placeholder')){if(o.data('placeholder-password')){o=o.hide().next().show().attr('id',o.removeAttr('id').data('placeholder-id'));if(m===true){return o[0].value=n}o.focus()}else{l.value='';o.removeClass('placeholder');l==h.activeElement&&l.select()}}}function e(){var q,l=this,p=$(l),m=p,o=this.id;if(l.value==''){if(l.type=='password'){if(!p.data('placeholder-textinput')){try{q=p.clone().attr({type:'text'})}catch(n){q=$('<input>').attr($.extend(g(this),{type:'text'}))}q.removeAttr('name').data({'placeholder-password':true,'placeholder-id':o}).bind('focus.placeholder',b);p.data({'placeholder-textinput':q,'placeholder-id':o}).before(q)}p=p.removeAttr('id').hide().prev().attr('id',o).show()}p.addClass('placeholder');p[0].value=p.attr('placeholder')}else{p.removeClass('placeholder')}}}(this,document,jQuery));

jQuery(document).ready(function($) {    
    $("ul.archive li a, .post-edit-link, .categories a, .page-tools a").addClass("animated");
    $(".tags.box a").wrapInner("<span data-hover='Zobacz'></span>");
    var slider = $(".carousel");
    slider.owlCarousel({
        navigation: true,
        slideSpeed: 300,
        isFitWidth: true,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: true,
        stopOnHover: true
    });
    $('#slider, .item').css({'height': (($(window).height() * 0.88) - 70) + 'px'});
    $(window).resize(function() { // On resize
        $('#slider, .item').css({'height': (($(window).height() * 0.88) - 70) + 'px'});
    });
    $('hgroup').css({'margin-top': (($(window).height() * 0.4) - 110) + 'px'});
    $(window).resize(function() { // On resize
        $('hgroup').css({'margin-top': (($(window).height() * 0.4) - 110) + 'px'});
    });
    $('.animated').wrap("<div class='linkhover'></div>");
    $newdiv1 = $("<div class='line'/>"),
            $(".linkhover").prepend($newdiv1);
    $('.animated').each(
    function() {
        $(this).parent().width($(this).width());
        $(this).siblings('.line').width($(this).width());
        if (!agentID) {
            $(this).hover(defaultHOver, defaultHOut);
        }
    });   
    
});

var deviceAgent = navigator.userAgent.toLowerCase();
var agentID = deviceAgent.match(/(iphone|ipod|ipad)/);

function defaultHOver() {
    $(this).siblings('.line').attr('over', '1');
    $(this).siblings('.line').show(
            'slide', {
                direction: 'left',
                easing: 'easeOutCubic'
            },
    300,
            function() {
                if ($(this).attr('over') != '1') {
                    $(this).hide(
                            'slide', {
                                direction: 'right',
                                easing: 'easeOutCubic'
                            },
                    300);
                }
            });
    $(this).stop(true).animate(
            300,
            'easeOutCubic');
}

function defaultHOut() {
    $(this).siblings().find('.line').attr('over', '0');
    $(this).siblings('.line').hide(
            'slide', {
                direction: 'right',
                easing: 'easeOutCubic'
            },
    300);
    $(this).stop(true).animate(
            100,
            'easeOutCubic');
}