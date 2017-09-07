<div class="registration">
    <div class="registration__column registration__column--with-padding">
        <div class="questionsBox">
            <h2>Flat information</h2>


            <div class="questionsBox__img">
                <img src="./img/Signup_P_step9_1.jpg" alt="">
            </div>


        </div>

    </div>
    <div class="registration__column  registration__column--bg">
        <div class="personal">
            <form class="questionForm">

                <div class="formField">
                    <h2 class="formLabel questionForm__label">
                        Is there a lift to the flat? <span>*</span>
                    </h2>
                    <div class="inputWrap">
                        <select class="formSelect">


                            <option value="select">Please select</option>


                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>


                </div>




                <div class="formField formField--margin-top">

                    <div class="formField">
                        <h2 class="formLabel questionForm__label">
                            What floor is the flat on? <span>*</span>
                        </h2>
                        <div class="inputWrap">
                            <select class="formSelect">
                                <option value="select">Please select</option>
                                <option value="yes">Ground</option>
                                <option value="yes">1</option>
                                <option value="yes">2</option>
                                <option value="yes">3</option>
                                <option value="yes">4</option>
                                <option value="yes">5</option>
                                <option value="yes">6</option>
                                <option value="yes">7</option>
                                <option value="yes">8</option>
                                <option value="yes">9</option>
                                <option value="yes">10</option>
                                <option value="yes">11</option>
                                <option value="yes">12</option>
                                <option value="yes">13</option>
                                <option value="yes">14</option>
                                <option value="yes">15</option>
                                <option value="yes">16</option>
                                <option value="yes">17</option>
                                <option value="yes">18</option>
                                <option value="yes">19</option>
                                <option value="yes">20</option>
                                <option value="yes">21</option>
                                <option value="yes">22</option>
                                <option value="yes">23</option>
                                <option value="yes">24</option>
                                <option value="yes">25</option>
                                <option value="yes">26</option>
                                <option value="yes">27</option>
                                <option value="yes">28</option>
                                <option value="yes">29</option>
                                <option value="yes">30</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>


<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='9_1'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='9_1'>
    <input type="hidden" name="stepback" value='8'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>


<div class="registrationBtns">

    <div class="registrationBtns__left">
        <a href="back" class="registrationBtns__item registrationBtns__item--back"
           onclick="event.preventDefault();document.getElementById('stepback').submit();"
        >
            <i class="fa fa-arrow-left "></i>back
        </a>
        <a href="/" class="registrationBtns__item registrationBtns__item--later">
            continue later
        </a>
    </div>


    <a href="next" class="registrationBtns__item"
       onclick="event.preventDefault();document.getElementById('step').submit();"
    >
        next step
        <i class="fa fa-arrow-right"></i>
    </a>
</div>