$(function () {
   $.widget("custom.myCustomWidget", {
      options: {
         myvalue: 0
      },
      _create: function () {

      
      
         var parentBlock = (this.element.parent().attr('class') || ''),
         parentBlock1 = (this.element.attr('class') || ''),
         parentBlock2 = (this.element.parent().attr('class') || ''),
         newData = parentBlock,parentBlock1,parentBlock2
         this.element.parent().append('<span data-myCustomWidget-class="'+newData+'" style ="position:absolute" class="inc">' +
         '<button type="button" class="decrement btn btn-primary">-</button>' +
            '<span class="counting" id= "result">0</span>' +
         '<button type="button" class="increment btn btn-primary" value = "+">+</button>' +
            '</span>'
         )
         var value = 0;

         
             $(".increment").click(function () {

                var value =$("span").attr("data-myCustomWidget-class",newData).val();
                //console.log(value);
                value++;
                console.log(value);
               $(".counting").val(value);                
               //  $(this).parent(".inc").prevAll("input").first().val(value);
               //  $(this).find(".counting")[0].prevAll("input").first().val(value);
               //console.log($(this).find(".counting")[0].prevAll("input").first().val(value))
             });
             $(".decrement").click(function () {
                var value =$("span").attr("data-myCustomWidget-class",newData);
                console.log(value);

                $(this).parent(".inc").find(".counting")[0].innerHTML = value;
               //  $(this).parent(".inc").prevAll("input").first().val(value);
               //  $(this).find(".counting")[0].prevAll("input").first().val(value);
             });
     }
   });
});