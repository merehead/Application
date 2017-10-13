<section class="mainSection">
    <div class="container">
        <div class="justifyContainer justifyContainer--smColumn">
            <div class="breadcrumbs">
                <a href="{{route('mainHomePage')}}" class="breadcrumbs__item">
                    Home
                </a>
                <span class="breadcrumbs__arrow">&gt;</span>
                <a href="{{route('ContactPage')}}" class="breadcrumbs__item">
                    Contact Us
                </a>
            </div>
        </div>
        <div class="contactBox">
            <div class="contactBox__item">
                <h2 class="contactBox__title bigTitle">Write to Us</h2>
                <p class="contactBox__info">We’re always happy to hear from you. Please let us know if we can help.</p>
                {{--<form class="contactForm">--}}
                    {!! Form::model(null, ['method'=>'POST','route'=>'ContactSendMail',
                    'id'=>'contactSendMail','class'=>"contactForm"]) !!}
                    <div class="contactForm__column">
                        <h2 class="fieldTitle">name</h2>
                        <div class="contactForm__field">
                            <input type="text" name="name" class="contactForm__item" placeholder="Name">
                            <span class="contactForm__ico"><i class="fa fa-user"></i></span>
                        </div>
                    </div>
                    <div class="contactForm__column">
                        <h2 class="fieldTitle">email adress <span> * </span></h2>
                        <div class="contactForm__field">
                            <input type="email" name="email" class="contactForm__item" required placeholder="Your email">
                            <span class="contactForm__ico"><i class="fa fa-envelope"></i></span>
                        </div>
                    </div>
                    <div class="contactForm__column">
                        <h2 class="fieldTitle">Phone Number</h2>
                        <div class="contactForm__field">
                            <input type="text" name="phone" class="contactForm__item" placeholder="Your phone" maxlength="11">
                            <span class="contactForm__ico"><i class="fa fa-mobile"></i></span>
                        </div>
                    </div>

                    <div class="contactForm__column">
                        <h2 class="fieldTitle">Topic</h2>
                        <div class="contactForm__field">
                            <select type="text" name="topic" class="contactForm__item contactForm__item--select">
                                <option value="Select topic">Select topic</option>
                                <option value="I would like to work for Holm">I would like to work for Holm</option>
                                <option value="I would like more information about Holm">I would like more information about Holm</option>
                                <option value="I need help finding a carer">I need help finding a carer</option>
                                <option value="I need help registering as a care worker">I need help registering as a care worker</option>
                                <option value="I need help registering to buy care">I need help registering to buy care</option>
                                <option value="I need help editing my profile">I need help editing my profile</option>
                                <option value="I have a payment question">I have a payment question</option>
                                <option value="I would like to change a booking">I would like to change a booking</option>
                                <option value="I need help with a recent appointment">I need help with a recent appointment</option>
                                <option value="I would like Holm to come to my town / city">I would like Holm to come to my town / city</option>
                                <option value="Something else">Something else</option>
                            </select>
                            <span class="contactForm__ico"><i class="fa fa-file"></i></span>
                        </div>
                    </div>

                    <div class="contactForm__column">
                        <h2 class="fieldTitle">Message</h2>
                        <div class="contactForm__field contactForm__field--area ">
                            <textarea type="text" name="message" class="contactForm__item contactForm__item--area" maxlength="500"></textarea>
                            <span class="contactForm__ico"><i class="fa fa-pencil"></i></span>
                        </div>
                    </div>
                    <div class="roundedBtn contactForm__btn">
                        <button class=" roundedBtn__item roundedBtn__item--contact ">
                            submit
                        </button>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="contactBox__item">
                <h2 class="contactBox__title bigTitle">Address &amp; contacts</h2>
                <ul class="contactList">
                    <li class="contactList__item">
              <span class="contactList__ico">
               <i class="fa fa-map-marker" aria-hidden="true"></i>
              </span>
                        <span class="contactList__text">
                New Care Ltd, Kemp House, 160 City Road, London, EC1V 2NX
              </span>
                    </li>
                    <li class="contactList__item">
              <span class="contactList__ico">
               <i class="fa fa-mobile" aria-hidden="true"></i>
              </span>
                        <span class="contactList__text">
              <a href="tel: 0161 706 0288 "> 0161 706 0288  </a>    (9:00 AM - 5:00 PM)
              </span>
                    </li>
                    <li class="contactList__item">
              <span class="contactList__ico">
               <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
                        <span class="contactList__text contactList__text--email">
                <a href="mailto:info@holm.care">info@holm.care</a><p></p>
              </span>
                    </li>
                </ul>
                <div class="contactMap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.2356888081663!2d-0.09094908468441215!3d51.52723681707428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761ca671c887ed%3A0x35325a4cd49f9074!2zS0VNUCBIT1VTRSwgQ2l0eSBSZCwgTG9uZG9uIEVDMVYgMlBELCDQktC10LvQuNC60L7QsdGA0LjRgtCw0L3QuNGP!5e0!3m2!1sru!2sru!4v1499257456621"
                            frameborder="0" style="border:0" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
