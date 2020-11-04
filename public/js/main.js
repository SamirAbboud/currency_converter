$(function () {
   $('.select2').select2({
       placeholder: 'Select an currency',
       theme: "classic",
   });

   $('[placeholder]').focus(function () {
       $(this).data('text', $(this).attr('placeholder')).attr('placeholder', '');
   }).blur(function () {
        $(this).attr('placeholder', $(this).data('text'));
   });

});