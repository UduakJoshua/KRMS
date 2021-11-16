$(function() {
    $('.mySelect').on('change', function() {
        $.cookie('mySelect', this.value);
    });
    $('.mySelect').val( $.cookie('mySelect') || 1 );
});
  