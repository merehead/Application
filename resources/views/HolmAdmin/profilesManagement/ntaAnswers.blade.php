<div class="modal fade" id="myModal{{$item->id}}" role="dialog">
    <div class="modal-dialog">
        <div id="popupWrap{{$item->id}}" class="popupWrap">
            <div class="adminPopup ">
                <div class="adminPopup__head popupHead">
                    {{--            <a href="#" class="closeModal">

                                    <i class="fa fa-times"></i>
                                </a>--}}
                    <p>NTA anwsers</p>
                </div>
                <div class="question-body">

                    @if(!empty($item->nta['Would the service user like someone to visit regularly for companionship?'] ))
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
                                        <b>Yes</b>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif
                    @if(!empty($item->nta['REQUIRES ASSISTANCE IN TAKING MEDICATION TREATMENTS'] ))
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
                                            <strong> MEDICATION/TREATMENTS</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="question-comment">
                                    <input type="text" class="question-comment__field"
                                           value="{{$item->nta['REQUIRES ASSISTANCE IN TAKING MEDICATION TREATMENTS']}}"
                                           placeholder="Comment">
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(!empty($item->nta['Date of start'] ))
                        <div class="question-row">
                            <div class="question-column">
                                <h2 class="ordinaryTitle">
                                    FIRST DATE FOR CARER
                                </h2>

                            </div>
                            <div class="question-column">
                                <div class="formField formField--full">
                                    <div class="fieldWrap">
                                        <div class="question-check">
                                            <strong>{{$item->nta['Date of start']}}</strong>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif
                    @if(!empty($item->nta['Require assistance with eating / drinking']))
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

                                <div class="question-comment">
                                    <input type="text" class="question-comment__field"
                                           value="{{$item->nta['Require assistance with eating / drinking']}}"
                                           placeholder="Comment">
                                </div>

                            </div>
                        </div>
                    @endif
                    @if(!empty($item->nta['Needs help in choosing incontinence products']))
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
                                <div class="question-comment">
                                    Yes
                                </div>

                            </div>
                        </div>
                    @endif
                    @if(count($item->Behaviours))
                        <div class="question-row">
                            <div class="question-column">
                                <h2 class="ordinaryTitle">
                                    ВEHAVIOUR
                                </h2>
                            </div>
                            <div class="question-column">
                                <div class="question-checkboxes">
                                    <div class="check-column">


                                        @foreach($item->Behaviours->splice(0,count($item->Behaviours)/2) as $behaviour)

                                            @if($behaviour->name != 'other')
                                                @if($behaviour->name != 'None')

                                                    <div class="question-check">
                                                        <label for="checkbox3"> {{$behaviour->name}} </label>
                                                    </div>

                                                @endif
                                            @endif
                                        @endforeach

                                    </div>
                                    <div class="check-column">
                                        @foreach($item->Behaviours as $behaviour)
                                            @if($behaviour->name != 'other')
                                                @if($behaviour->name != 'None')
                                                    <div class="question-check">
                                                        <label for="checkbox3"> {{$behaviour->name}} </label>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(!empty($item->nta['doctors_note']))
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
                                <div class="question-comment">
                                    <input type="text" class="question-comment__field"
                                           value="{{$item->nta['doctors_note']}}"
                                           placeholder="Comment">
                                </div>

                            </div>
                        </div>
                    @endif
                    @if(!empty($item->nta['Time would they like someone']))
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
                                        {{$item->nta['Time would they like someone']}}
                                    </div>
                                </div>


                            </div>
                        </div>
                    @endif
                    @if(!empty($item->nta['Needs assistance keeping safe at night']))
                        <div class="question-row">
                            <div class="question-column">
                                <p class="question-info">
                                    NEEDS ASSISTANCE KEEPING SAFE AT NIGHT
                                </p>
                            </div>
                            <div class="question-column">

                                <div class="question-comment">
                                    <input type="text" class="question-comment__field"
                                           value="{{$item->nta['Needs assistance keeping safe at night']}}"
                                           placeholder="Comment">
                                </div>

                            </div>
                        </div>
                    @endif
                    @if(!empty($item->nta['Needs the assistance of more than one person at a time']))
                        <div class="question-row">
                            <div class="question-column">
                                <h2 class="ordinaryTitle">
                                    other
                                </h2>
                                <p class="question-info">
                                    NEEDS THE ASSISTANCE OF MORE THAN ONE PERSON AT A TIME TO ACHIEVE ANY PARTICULAR
                                    TASK
                                </p>
                            </div>
                            <div class="question-column">

                                <div class="question-comment">
                                    <input type="text" class="question-comment__field"
                                           value="{{$item->nta['Needs the assistance of more than one person at a time']}}"
                                           placeholder="Comment">
                                </div>

                            </div>
                        </div>
                    @endif
                    @if(!empty($item->nta['Are there any other medical conditions']))
                        <div class="question-row">
                            <div class="question-column">

                                <p class="question-info">
                                    ARE THERE ANY OTHER MEDICAL CONDITIONS, DISABILITIES, OR OTHER PIECES OF INFORMATION
                                    NOT
                                    ALREADY COVERED WHICH YOU FEEL MAY BE OF USE?
                                </p>
                            </div>
                            <div class="question-column">

                                <div class="question-comment">
                                    <input type="text" class="question-comment__field"
                                           value="{{$item->nta['Are there any other medical conditions']}}"
                                           placeholder="Comment">
                                </div>

                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
