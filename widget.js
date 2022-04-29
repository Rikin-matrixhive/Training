$(function () {
   $.widget("custom.myCustomWidget", {
      options: {
         myvalue: 0

      },
      _create: function () {
         // console.log (this.element.parent().attr('class'))
         // console.log (typeof this.element.parent().attr('id') == 'undefined')
         // console.log (this.element.attr('class'))
         // console.log (this.element.attr('id'))
         var parentBlock = (this.element.parent().attr('class') || ''),
         parentBlock1 = (this.element.attr('class') || ''),
         parentBlock2 = (this.element.parent().attr('class') || ''),
         newData = parentBlock,parentBlock1,parentBlock2
         
         
         
         // console.log("parentBlock")
         // console.log(this.element.closest('button'))
         this.element.parent().append('<span data-myCustomWidget-class="'+newData+'" style ="position:absolute" class="inc">' +
            '<button type="button" class="increment btn btn-primary" value = "+">+</button>' +
            '<span class="counting" id= "result">0</span>' +
            '<button type="button" class="decrement btn btn-primary">-</button>' +
            '</span>'   


         )
         var value = 0;
console.log(this.element.closest('span > button').val())
         this.element.closest('button').click(function () {
            if(this.element.closest('button').val() == '+'){
               console.log('+++')
            }
               var value = ($(this).parent(".inc").find(".counting")[0].innerHTML);

               value++; 
               $(this).parent(".inc").find(".counting")[0].innerHTML = value;

            });

            $(".decrement").click(function () {
               var value = ($(this).parent(".inc").find(".counting")[0].innerHTML);

               value--;
               $(this).parent(".inc").find(".counting")[0].innerHTML = value;

            });

      }
 




   });
});



