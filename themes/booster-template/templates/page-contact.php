<?php

/* Template Name: Contact Us */

get_header();

?>

<div class="container white-bg default-padding page-contact" style="min-height: 60vh;">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 left">
        <div class="col-xs-12 col-sm-12 atas">
          <ul>
            <li><a href="tel:+442032877868"><i class="fa fa-phone"></i>020 3287 7868</a></li>
            <li><a href="mailto:info@mobilebooster.co.uk"><i class="fa fa-envelope-o"></i>info@mobilebooster.co.uk</a></li>
            <li><a href="#"><i class="fa fa-map-marker"></i>59 The Drive Hove, <br> East Sussex, BNF 3PF, <br> United Kingdom</a></li>
<!--			  <li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4887137.044562891!2d-7.073618185618411!3d53.26629106944278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5f55468af21547aa!2sMobile%20Signal%20Booster%20UK!5e0!3m2!1sen!2sin!4v1575112759299!5m2!1sen!2sin" width="500" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe></li>-->
          </ul>
        </div>

        <div class="col-xs-12 col-sm-12 social">
            <h4>Follow us</h4>
            <a href="https://www.facebook.com/mobileboosteruk" >

                <img  src="<?php echo get_template_directory_uri() ?>/assets/img/fb.jpg" alt="">
            </a>
            <a href="https://www.twitter.com/mobileboosteruk" target="_blank" rel="nofollow">
                <svg width="42" height="42" viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg"><title>tw</title><g transform="translate(1 1)" fill="none" fill-rule="evenodd"><path d="M28.613 14.602c-.47.69-1.04 1.276-1.708 1.76.007.1.01.247.01.443 0 .914-.133 1.826-.4 2.736-.267.91-.673 1.784-1.218 2.62-.544.836-1.192 1.576-1.944 2.22-.752.642-1.66 1.155-2.72 1.538-1.06.383-2.196.574-3.405.574-1.904 0-3.647-.51-5.228-1.528.246.028.52.042.822.042 1.58 0 2.99-.485 4.227-1.455-.74-.013-1.4-.24-1.983-.678-.583-.44-.983-1-1.2-1.682.23.035.445.053.642.053.3 0 .6-.04.895-.116-.787-.162-1.44-.553-1.956-1.175-.517-.622-.775-1.344-.775-2.166v-.043c.477.267.99.412 1.54.433-.465-.31-.834-.714-1.108-1.213-.274-.5-.41-1.04-.41-1.623 0-.618.153-1.19.463-1.718.85 1.047 1.885 1.885 3.104 2.514 1.22.63 2.524.978 3.916 1.05-.056-.268-.085-.528-.085-.78 0-.943.332-1.746.997-2.41.664-.664 1.466-.996 2.408-.996.984 0 1.813.358 2.488 1.075.766-.147 1.486-.42 2.16-.822-.26.808-.758 1.434-1.496 1.876.653-.07 1.307-.247 1.96-.528z" fill="#0B4F6C"/><circle stroke="#0B4F6C" cx="20" cy="20" r="20"/></g></svg>
            </a>
            <a href="https://www.instagram.com/mobileboosters" target="_blank" rel="nofollow">
                <svg width="42" height="42" viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg"><title>ig</title><g transform="translate(1 1)" fill="none" fill-rule="evenodd"><path d="M26.187 25.52v-6.75H24.78c.14.438.21.893.21 1.365 0 .875-.223 1.683-.667 2.422-.445.74-1.05 1.325-1.813 1.756-.763.43-1.597.645-2.5.645-1.368 0-2.538-.47-3.51-1.41-.972-.942-1.458-2.08-1.458-3.413 0-.472.07-.927.208-1.364h-1.47v6.75c0 .18.062.332.184.454.12.12.272.182.453.182h11.135c.174 0 .323-.06.448-.182s.187-.273.187-.453zm-2.958-5.55c0-.862-.315-1.597-.944-2.204-.628-.608-1.387-.912-2.276-.912-.882 0-1.637.304-2.265.912-.63.607-.943 1.342-.943 2.203 0 .86.314 1.594.943 2.202.628.608 1.383.91 2.265.91.89 0 1.648-.302 2.276-.91.63-.608.943-1.342.943-2.203zm2.957-3.75V14.5c0-.194-.07-.363-.208-.505-.14-.143-.31-.214-.51-.214h-1.814c-.2 0-.37.072-.51.215-.14.142-.21.31-.21.505v1.72c0 .2.07.37.21.51.14.138.31.208.51.208h1.813c.2 0 .37-.07.51-.21.138-.138.207-.308.207-.51zM28 14.05v11.896c0 .562-.2 1.045-.604 1.448-.403.403-.886.604-1.448.604H14.052c-.562 0-1.045-.2-1.448-.604-.403-.403-.604-.886-.604-1.448V14.052c0-.562.2-1.045.604-1.448.403-.403.886-.604 1.448-.604h11.896c.562 0 1.045.2 1.448.604.403.403.604.886.604 1.448z" fill="#0B4F6C"/><circle stroke="#0B4F6C" cx="20" cy="20" r="20"/></g></svg>
            </a>
        </div>

      <div class="col-xs-12 col-sm-6 col-md-6 right">
        <?php echo do_shortcode('[contact-form-7 id="455" title="Contact"]'); ?>
      </div>

    </div>
</div>

<?php get_footer(); ?>
