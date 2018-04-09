/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){

   'use strict';
   var windH=$(window).height();
   var upperH=$('.upper-bar').innerHeight();
   var navH=$('.navbar').innerHeight();
   console.log(windH+100-(upperH+navH));
   $('.slider,.carousel-item').height(windH+400-(upperH+navH));
   
   $('.feature-work ul li').on('click',function (){
       
       $(this).addClass('active').siblings().removeClass('active');
       console.log($(this).data('class'));
       if($(this).data('class') ==='all'){
           
           $('.shuffle-images .row .col-sm').css('opacity',1);
       }
        else {
            $('.shuffle-images .row .col-sm').css('opacity',.09);
            $($(this).data('class')).parent().css('opacity',1);
        }

   });
   
//         ////////////////////////////////////////////////


  $('.logreg .container ul li').on('click',function (){
       
       $(this).addClass('active').siblings().removeClass('active');
       console.log($(this).data('class'));
       
       if($(this).data('class') ==='.signup'){
           
           $('.signup').show();
           $('.signin').hide();
       }
        else {
            $('.signin').show();
           $('.signup').hide();
        }

   });
});
$('a[href^="#"]').on('click', function(event) {
    var target = $(this.getAttribute('href'));
    if( target.length ) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: target.offset().top
        }, 1000);
    }
});