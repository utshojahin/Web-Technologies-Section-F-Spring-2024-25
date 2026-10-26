<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="theme-color" content="#06070a" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
<link rel="stylesheet" href="../Assets/CSS/style.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
/* Minimal Bootstrap-modal compatible shim so existing .modal('show'/'hide') calls work. */
(function ($) {
    if (!$) { return; }
    function show(el, options) {
        var $el = $(el);
        options = options || {};
        $el.addClass('in').css('display', 'block').attr('aria-hidden', 'false');
        $('body').addClass('modal-open');
        if (!$('.modal-backdrop-shim').length) {
            $('<div class="modal-backdrop-shim"></div>').css({
                position: 'fixed', inset: '0', background: 'transparent', zIndex: 1999
            }).appendTo('body');
        }
        $el.data('backdrop-static', options.backdrop === 'static' || options.keyboard === false);
        // Fire asynchronously so handlers attached right after .modal() still run.
        setTimeout(function () { $el.trigger('shown.bs.modal'); }, 0);
    }
    function hide(el) {
        var $el = $(el);
        $el.trigger('hide.bs.modal').removeClass('in').css('display', 'none').attr('aria-hidden', 'true');
        $('body').removeClass('modal-open');
        $('.modal-backdrop-shim').remove();
    }
    $.fn.modal = function (arg) {
        var opts = (typeof arg === 'object') ? arg : {};
        var action = (typeof arg === 'string') ? arg : 'show';
        return this.each(function () {
            if (action === 'hide') { hide(this); } else { show(this, opts); }
        });
    };
    $(document).on('click', '[data-dismiss="modal"]', function () {
        hide($(this).closest('.modal'));
    });
    $(document).on('click', '.modal', function (e) {
        if (e.target === this && !$(this).data('backdrop-static')) { hide(this); }
    });
    $(document).on('keyup', function (e) {
        if (e.key === 'Escape' || e.keyCode === 27) {
            $('.modal.in, .modal.show').each(function () {
                if (!$(this).data('backdrop-static')) { hide(this); }
            });
        }
    });
}(window.jQuery));
</script>
<!-- jQuery -->
