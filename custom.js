
$( function() {
    $.widget( "custom.myCustomWidget", {
    _create: function() {
       this.element.attr("type","date")
       // $("*").attr("type","date");
     }
    });
 });
