<div class="registration">
    <div class="personal">
        <form class="questionForm">


            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Does [Service_user_name] have regular social interaction with friends / family?
                </h2>
                <div class="inputWrap">
                    <select class="formSelect">


                        <option value="select">Please select</option>


                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                        <option value="normally">Sometimes</option>
                    </select>
                </div>


            </div>






            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Would [Service_user_name] like someone to visit regularly for companionship?
                </h2>
                <div class="inputWrap">
                    <select class="formSelect">



                        <option value="select">Please select</option>

                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                        <option value="normally">Sometimes</option>
                    </select>
                </div>


            </div>

            <!-- <div class="formField">
                         <h2 class="formLabel questionForm__label">
                         If yes, please give more information.
                         </h2>

                         <div class="inputWrap">
                           <textarea class="formArea" placeholder="Details"></textarea>
                         </div>


                       </div>
           -->





        </form>
    </div>

</div>
</div>


<form id="step" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='9'>
    <input type="hidden" name="serviceUserProfileID" value = {{$serviceUserProfileID}}>
</form>

<form id="stepback" method="POST" action="{{ route('ServiceUserRegistration',['id' =>$serviceUserProfileID]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="step" value='9'>
    <input type="hidden" name="stepback" value='7'>
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