<section id="footer_bottom" class="clearfix">
    <div class="container">
     <div class="row">
      <div class="col-sm-12">
       <div class="footer_bottom_1 text-center">
        <p class="mgt col_1"> © 2013 Your Website Name. All Rights Reserved | Design by <a class="col" href="http://www.templateonweb.com">TemplateOnWeb</a></p>
       </div>
      </div>
     </div>
    </div>
   </section>
   
   <script>
   $(document).ready(function(){
   
   /*****Fixed Menu******/
   var secondaryNav = $('.cd-secondary-nav'),
      secondaryNavTopPosition = secondaryNav.offset().top;
       $(window).on('scroll', function(){
           if($(window).scrollTop() > secondaryNavTopPosition ) {
               secondaryNav.addClass('is-fixed');	
           } else {
               secondaryNav.removeClass('is-fixed');
           }
       });	
       
   });
   </script>