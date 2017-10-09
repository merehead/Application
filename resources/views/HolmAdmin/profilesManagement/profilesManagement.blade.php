<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-user" aria-hidden="true"></i>
          </span>
        Profiles managment
    </h2>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
    {!! Form::open(['method'=>'GET','action'=>'Admin\User\UserController@index','id'=>'user_filter']) !!}
    <div class="panelHead">
        <div class="filterGroup">
            <div class="filterBox">
                <h2 class="filterBox__title themeTitle">
                    Type of profile:
                </h2>

                <div class="formField formField--fixed">
                    {!! Form::select('profileType',[''=>'Any']+$profileType,null,['class'=>'formItem formItem--select']) !!}
                </div>

            </div>
            <div class="filterBox">
                <h2 class="filterBox__title themeTitle">
                    status
                </h2>
                <div class="formField formField--fixed">
                    {!! Form::select('statusType',[''=>'Any']+$statusType,null,['class'=>'formItem formItem--select']) !!}
                </div>

            </div>
        </div>
        <a href="#" class="actionsBtn actionsBtn--filter actionsBtn--bigger"
           onclick="event.preventDefault();document.getElementById('user_filter').submit();">
            filter
        </a>

        <div class="panelHead__group">
        <a href="#" class="print">
            <i class="fa fa-print" aria-hidden="true"></i>
        </a>
        </div>
    </div>
    {!! Form::close()!!}

    @include(config('settings.theme').'.profilesManagement.summaryTable')

    @include(config('settings.theme').'.profilesManagement.mainTable')

</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="popupWrap">
            <div class="adminPopup ">
                <div class="adminPopup__head popupHead">
                    <a href="#" class="closeModal">
                        <i class="fa fa-times"></i>
                    </a>
                    <p>NTA anwsers</p>
                </div>
                <div class="question-body">
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                COMPANIONSHIP
                            </h2>
                            <p class="question-info">
                                WOULD THE SERVICE USER LIKE SOMEONE TO VISIT REGULARLY FOR COMPANIONSHIP?
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-choise">
                                <div class="choise-item">
                                    <input type="radio" class="radio radio--green" id="radio" name="radio" />
                                    <label for="radio">yes</label>
                                </div>
                                <div class="choise-item">
                                    <input type="radio" class="radio radio--green" id="radio2" name="radio" />
                                    <label for="radio2">no</label>
                                </div>
                            </div>
                            <div class="question-comment">
                                <input type="text" class="question-comment__field" placeholder="Comment">
                            </div>

                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                TYPE OF CARE NEEDED
                            </h2>
                        </div>
                        <div class="question-column">
                            <div class="question-checkboxes">
                                <div class="check-column">
                                    <div class="question-check">
                                        <input type="checkbox" class="checkbox" id="checkbox" />
                                        <label for="checkbox"> MEDICATION</label>
                                    </div>
                                    <div class="question-check">
                                        <input type="checkbox" class="checkbox" id="checkbox2" />
                                        <label for="checkbox2"> TREATMENTS</label>
                                    </div>
                                </div>
                                <div class="check-column">
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                FIRST DATE FOR CARER
                            </h2>

                        </div>
                        <div class="question-column">
                            <div class="formField formField--full">
                                <div class="fieldWrap">
                                    <input type="text" class="formItem formItem--input formItem--date-ico " placeholder="06/06/2017">
                                    <span class="field-ico">
                 <i class="fa fa-calendar"></i>
               </span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                NUTRITION
                            </h2>
                            <p class="question-info">
                                REQUIRE ASSISTANCE WITH EATING / DRINKING
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-choise">
                                <div class="choise-item">
                                    <input type="radio" class="radio radio--green" id="radio3" name="radio1" />
                                    <label for="radio3">yes</label>
                                </div>
                                <div class="choise-item">
                                    <input type="radio" class="radio radio--green" id="radio4" name="radio1" />
                                    <label for="radio4">no</label>
                                </div>
                            </div>
                            <div class="question-comment">
                                <input type="text" class="question-comment__field" placeholder="Comment">
                            </div>

                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                PERSONAL HYGIENE
                            </h2>
                            <p class="question-info">
                                NEEDS HELP IN CHOOSING INCONTINENCE PRODUCTS
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-choise">
                                <div class="choise-item">
                                    <input type="radio" class="radio radio--green" id="radio5" name="radio2" />
                                    <label for="radio5">yes</label>
                                </div>
                                <div class="choise-item">
                                    <input type="radio" class="radio radio--green" id="radio6" name="radio2" />
                                    <label for="radio6">no</label>
                                </div>
                            </div>
                            <div class="question-comment">
                                <input type="text" class="question-comment__field" placeholder="Comment">
                            </div>

                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                ВEHAVIOUR
                            </h2>
                        </div>
                        <div class="question-column">
                            <div class="question-checkboxes">
                                <div class="check-column">
                                    <div class="question-check">
                                        <input type="checkbox" class="checkbox" id="checkbox3" />
                                        <label for="checkbox3"> AGGRESSION</label>
                                    </div>
                                    <div class="question-check">
                                        <input type="checkbox" class="checkbox" id="checkbox4" />
                                        <label for="checkbox4"> ANXIETY</label>
                                    </div>
                                    <div class="question-check">
                                        <input type="checkbox" class="checkbox" id="checkbox5" />
                                        <label for="checkbox5"> VIOLENCE</label>
                                    </div>
                                    <div class="question-check">
                                        <input type="checkbox" class="checkbox" id="checkbox6" />
                                        <label for="checkbox6"> AGITATION</label>
                                    </div>
                                    <div class="question-check">
                                        <input type="checkbox" class="checkbox" id="checkbox7" />
                                        <label for="checkbox7"> ANTISOCIAL BEHAVIOUR</label>
                                    </div>
                                </div>
                                <div class="check-column">
                                    <div class="question-check">
                                        <input type="checkbox" class="checkbox" id="checkbox8" />
                                        <label for="checkbox8"> CONFUSION</label>
                                    </div>
                                    <div class="question-check">
                                        <input type="checkbox" class="checkbox" id="checkbox9" />
                                        <label for="checkbox9"> AGITATION</label>
                                    </div>
                                    <div class="question-check">
                                        <input type="checkbox" class="checkbox" id="checkbox10" />
                                        <label for="checkbox10"> INAPPROPRIATE SEXUAL BEHAVIOUR</label>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                Details
                            </h2>
                            <p class="question-info">
                                HAS A DOCTOR'S NOTE OR COURT ORDER SAYING THAT THEY ARE NOT ABLE TO GIVE CONSENT
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-choise">
                                <div class="choise-item">
                                    <input type="radio" class="radio radio--green" id="radio7" name="radio3" />
                                    <label for="radio7">yes</label>
                                </div>
                                <div class="choise-item">
                                    <input type="radio" class="radio radio--green" id="radio8" name="radio3" />
                                    <label for="radio8">no</label>
                                </div>
                            </div>
                            <div class="question-comment">
                                <input type="text" class="question-comment__field" placeholder="Comment">
                            </div>

                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                Night Time
                            </h2>
                            <p class="question-info">
                                WHAT TIME WOULD THEY LIKE SOMEONE TO COME AND HELP?
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="formField formField--full">
                                <div class="fieldWrap">
                                    <input type="text" class="formItem formItem--input formItem--date-ico " placeholder="12:00 AM - 5:00 PM">
                                    <span class="field-ico">
                 <i class="fa fa-clock-o"></i>
               </span>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                NEEDS ASSISTANCE KEEPING SAFE AT NIGHT
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-choise">
                                <div class="choise-item">
                                    <input type="radio" class="radio radio--green" id="radio01" name="radio01" />
                                    <label for="radio01">yes</label>
                                </div>
                                <div class="choise-item">
                                    <input type="radio" class="radio radio--green" id="radio01" name="radio01" />
                                    <label for="radio01">no</label>
                                </div>
                            </div>
                            <div class="question-comment">
                                <input type="text" class="question-comment__field" placeholder="Comment">
                            </div>

                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                other
                            </h2>
                            <p class="question-info">
                                NEEDS THE ASSISTANCE OF MORE THAN ONE PERSON AT A TIME TO ACHIEVE ANY PARTICULAR TASK
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-choise">
                                <div class="choise-item">
                                    <input type="radio" class="radio radio--green" id="radio9" name="radio4" />
                                    <label for="radio9">yes</label>
                                </div>
                                <div class="choise-item">
                                    <input type="radio" class="radio radio--green" id="radio10" name="radio4" />
                                    <label for="radio10">no</label>
                                </div>
                            </div>
                            <div class="question-comment">
                                <input type="text" class="question-comment__field" placeholder="Comment">
                            </div>

                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">

                            <p class="question-info">
                                ARE THERE ANY OTHER MEDICAL CONDITIONS, DISABILITIES, OR OTHER PIECES OF INFORMATION NOT ALREADY COVERED WHICH YOU FEEL MAY BE OF USE?
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-choise">
                                <div class="choise-item">
                                    <input type="radio" class="radio radio--green" id="radio11" name="radio5" />
                                    <label for="radio11">yes</label>
                                </div>
                                <div class="choise-item">
                                    <input type="radio" class="radio radio--green" id="radio12" name="radio5" />
                                    <label for="radio12">no</label>
                                </div>
                            </div>
                            <div class="question-comment">
                                <input type="text" class="question-comment__field" placeholder="Comment">
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>





    </div>
</div>