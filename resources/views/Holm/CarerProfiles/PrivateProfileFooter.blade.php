
<footer class="footer">
    <div class="container">
        <div class="footerNav">
            <a href="/" class="footerNav__item">
                about us
            </a>
            <a href="/" class="footerNav__item">
                contact
            </a>
            <a href="/" class="footerNav__item">
                FREQUENTLY ASKED QUESTIONS

            </a>
            <a href="/" class="footerNav__item">
                blog
            </a>
        </div>
        <div class="footerContainer">
            <a href="/" class=" themeLogo themeLogo--dark">

            </a>
            <a href="/" class="carerSelf">
                i am a carer
            </a>
            <div class="loginBox">
                <a href="/" class=" centeredLink loginBox__link">
                    Login
                </a>
                <a href="/" class=" centeredLink loginBox__link loginBox__link--active">
                    Sign up
                </a>
            </div>

            <div class="payment">
                <a href="" class="payment__item">
                    <img src="./img/pay1.png" alt="">
                </a>
                <a href="" class="payment__item">
                    <img src="./img/pay2.png" alt="">
                </a>
                <a href="" class="payment__item">
                    <img src="./img/pay3.png" alt="">
                </a>
                <a href="" class="payment__item">
                    <img src="./img/pay4.png" alt="">
                </a>
            </div>
        </div>

        <div class="footerExtra">
            <p class="copyright">
                COPYRIGHT © 2017 Holm. All rights reserved
            </p>
            <a href="Terms_and_Conditions.html" class="footerExtra__terms">
                Terms and Conditions
            </a >
            <div class="footerSocial">
                <a href="https://www.facebook.com/HolmCareUK/" class="footerSocial__item">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="https://twitter.com/holmcare" class="footerSocial__item">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="https://plus.google.com/communities/102900900688938220709" class="footerSocial__item">
                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                </a>
                <!--
                          <a href="#" class="footerSocial__item">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                          </a>
                          <a href="#" class="footerSocial__item">
                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
                          </a>
                -->
            </div>
        </div>
    </div>
</footer>





<script>
    $('.footerSocial a, .headerSocial a').click(function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        window.open(href, '_blank').focus();
    });

    var $j = jQuery.noConflict();
    //$j("#datepicker").datepicker();

    $j( function() {
        $j( "#datepicker_driver_licence" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat:"dd/mm/yy",
            showAnim:"slideDown"
        });
    } );

    $j( function() {
        $j( "#datepicker_insurance" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat:"dd/mm/yy",
            showAnim:"slideDown"
        });
    } );

    $j(document).ready(function() {

        $j(".allTime").change(function(){
            if(this.checked){
                $j(".checkSingle").each(function(){
                    this.checked=true;
                })
            }else{
                $j(".checkSingle").each(function(){
                    this.checked=false;
                })
            }
        });

        $j(".checkSingle").click(function () {
            if ($j(this).is(":checked")){
                var isAllChecked = 0;
                $j(".checkSingle").each(function(){
                    if(!this.checked)
                        isAllChecked = 1;
                })
                if(isAllChecked == 0){ $j(".allTime").prop("checked", true); }
            }
            else {
                $j(".allTime").prop("checked", false);
            }
        });
    });


</script>


</body>
</html>
