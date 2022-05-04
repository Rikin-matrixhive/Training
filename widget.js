$(function () {
   $.widget("custom.myCustomWidget", {

      _create: function () {
         var parentBlock = (this.element.parent().attr('class') || ''),
            parentBlock1 = (this.element.attr('class') || ''),
            parentBlock2 = (this.element.parent().attr('class') || ''),
            newData = parentBlock, parentBlock1, parentBlock2;
         console.log(newData);
         this.element.parent().append('<span style ="position:relative" class="inc">' +
            '<button type="button" class="' + newData + 'decrement btn btn-primary">-</button>' +
            '<span class="counting" id= "result">0</span>' +
            '<button type="button" class="' + newData + 'increment btn btn-primary" value = "+">+</button>' +
            '</span>'
         )
         var value = 0;
         // console.log(value);


         $("." + newData + "increment").click(function () {
            //alert("hello");
            var value = ($(this).parent(".inc").find(".counting")[0].innerHTML);
            value++;
            console.log(value);

            $(this).parent(".inc").find(".counting")[0].innerHTML = value;
            $(this).parent(".inc").prevAll("input").first().val(value);

         })
         $("." + newData + "decrement").click(function () {
            //alert("another hello");

            var value = ($(this).parent(".inc").find(".counting")[0].innerHTML);
            value--;
            console.log(value);
            $(this).parent(".inc").find(".counting")[0].innerHTML = value;
            $(this).parent(".inc").prevAll("input").first().val(value);


         })


      }
   });
});      
