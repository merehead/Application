<div class="modal fade" id="myModal{{$item->id}}" role="dialog" style="position: fixed; top:50%; left:50%;">
    <div class="modal-dialog">
        <div id="popupWrap{{$item->id}}" class="popupWrap">

            {{--<div class="adminPopup ">--}}
                {{--<div class="adminPopup__head popupHead">--}}
                    {{--<a href="#" data-dismiss="modal" class="close closeModal" style="opacity: 0.9">--}}
                        {{--<i class="fa fa-times"></i>--}}
                    {{--</a>--}}
                    {{--            <a href="#" class="closeModal">--}}

                                    {{--<i class="fa fa-times"></i>--}}
                                {{--</a>--}}
                    {{--<p>NTA anwsers</p>--}}
                {{--</div>--}}
                {{--<div class="question-body">--}}

                    {{--@if(!empty($item->nta['Would the service user like someone to visit regularly for companionship?'] ))--}}
                        {{--<div class="question-row">--}}
                            {{--<div class="question-column">--}}
                                {{--<h2 class="ordinaryTitle">--}}
                                    {{--COMPANIONSHIP--}}
                                {{--</h2>--}}
                                {{--<p class="question-info">--}}
                                    {{--WOULD THE SERVICE USER LIKE SOMEONE TO VISIT REGULARLY FOR COMPANIONSHIP?--}}
                                {{--</p>--}}
                            {{--</div>--}}
                            {{--<div class="question-column">--}}
                                {{--<p class="question-info">--}}
                                    {{--yes--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{--@if(!empty($item->nta['REQUIRES ASSISTANCE IN TAKING MEDICATION TREATMENTS'] ))--}}
                        {{--<div class="question-row">--}}
                            {{--<div class="question-column">--}}
                                {{--<h2 class="ordinaryTitle">--}}
                                    {{--TYPE OF CARE NEEDED--}}
                                {{--</h2>--}}
                            {{--</div>--}}
                            {{--<div class="question-column">--}}
                                {{--<p class="question-info">--}}
                                    {{--Medication/treatments--}}
                                {{--</p>--}}
                                {{--<div class="question-comment">--}}
                                    {{--<p class="question-info">{{$item->nta['REQUIRES ASSISTANCE IN TAKING MEDICATION TREATMENTS']}}</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{--@if(!empty($item->nta['Date of start'] ))--}}
                        {{--<div class="question-row">--}}
                            {{--<div class="question-column">--}}
                                {{--<h2 class="ordinaryTitle">--}}
                                    {{--FIRST DATE FOR CARER--}}
                                {{--</h2>--}}

                            {{--</div>--}}
                            {{--<div class="question-column">--}}
                                {{--<p class="question-info">--}}
                                    {{--<strong>{{$item->nta['Date of start']}}</strong>--}}
                                {{--</p>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{--@if(!empty($item->nta['Require assistance with eating / drinking']))--}}
                        {{--<div class="question-row">--}}
                            {{--<div class="question-column">--}}
                                {{--<h2 class="ordinaryTitle">--}}
                                    {{--NUTRITION--}}
                                {{--</h2>--}}
                                {{--                                <p class="question-info">--}}
                                                                    {{--REQUIRE ASSISTANCE WITH EATING / DRINKING--}}
                                                                {{--</p>--}}
                            {{--</div>--}}
                            {{--<div class="question-column">--}}
                                {{--<p class="question-info">--}}
                                    {{--{{$item->nta['Require assistance with eating / drinking']}}--}}
                                {{--</p>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{--@if(!empty($item->nta['Needs help in choosing incontinence products']))--}}
                        {{--<div class="question-row">--}}
                            {{--<div class="question-column">--}}
                                {{--<h2 class="ordinaryTitle">--}}
                                    {{--PERSONAL HYGIENE--}}
                                {{--</h2>--}}
                                {{-- <p class="question-info">--}}
                                     {{--NEEDS HELP IN CHOOSING INCONTINENCE PRODUCTS--}}
                                 {{--</p>--}}
                            {{--</div>--}}
                            {{--<div class="question-column">--}}
                                {{--<div class="question-comment">--}}
                                    {{--NEEDS HELP IN CHOOSING INCONTINENCE PRODUCTS--}}
                                {{--</div>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{--@if(count($item->Behaviours))--}}
                        {{--<div class="question-row">--}}
                            {{--<div class="question-column">--}}
                                {{--<h2 class="ordinaryTitle">--}}
                                    {{--ВEHAVIOUR--}}
                                {{--</h2>--}}
                            {{--</div>--}}
                            {{--<div class="question-column">--}}

                                {{--@foreach($item->Behaviours->splice(0,count($item->Behaviours)/2) as $behaviour)--}}

                                    {{--@if($behaviour->name != 'other')--}}
                                        {{--@if($behaviour->name != 'None')--}}

                                            {{--<p class="question-info">--}}
                                                {{--{{$behaviour->name}}--}}
                                            {{--</p>--}}

                                        {{--@endif--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}

                                {{--@foreach($item->Behaviours as $behaviour)--}}
                                    {{--@if($behaviour->name != 'other')--}}
                                        {{--@if($behaviour->name != 'None')--}}
                                            {{--<p class="question-info">--}}
                                                {{--{{$behaviour->name}}--}}
                                            {{--</p>--}}
                                        {{--@endif--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{--@if(!empty($item->nta['doctors_note']))--}}
                        {{--<div class="question-row">--}}
                            {{--<div class="question-column">--}}
                                {{--<h2 class="ordinaryTitle">--}}
                                    {{--Details--}}
                                {{--</h2>--}}
                                {{-- <p class="question-info">--}}
                                     {{--HAS A DOCTOR'S NOTE OR COURT ORDER SAYING THAT THEY ARE NOT ABLE TO GIVE CONSENT--}}
                                 {{--</p>--}}
                            {{--</div>--}}
                            {{--<div class="question-column">--}}
                                {{--<p class="question-info">{{$item->nta['doctors_note']}}</p>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{--@if(!empty($item->nta['Time would they like someone']))--}}
                        {{--<div class="question-row">--}}
                            {{--<div class="question-column">--}}
                                {{--<h2 class="ordinaryTitle">--}}
                                    {{--Night Time--}}
                                {{--</h2>--}}
                                {{-- <p class="question-info">--}}
                                     {{--WHAT TIME WOULD THEY LIKE SOMEONE TO COME AND HELP?--}}
                                 {{--</p>--}}
                            {{--</div>--}}
                            {{--<div class="question-column">--}}
                                {{--<p class="question-info">--}}
                                    {{--{{$item->nta['Time would they like someone']}}--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{--@if(!empty($item->nta['Needs assistance keeping safe at night']))--}}
                        {{--<div class="question-row">--}}
                            {{--<div class="question-column">--}}
                                {{--<p class="question-info">--}}
                                    {{--NEEDS ASSISTANCE KEEPING SAFE AT NIGHT--}}
                                {{--</p>--}}
                            {{--</div>--}}
                            {{--<div class="question-column">--}}
                                {{--<p class="question-info">--}}
                                    {{--{{$item->nta['Needs assistance keeping safe at night']}}"--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{--@if(!empty($item->nta['Needs the assistance of more than one person at a time']))--}}
                        {{--<div class="question-row">--}}
                            {{--<div class="question-column">--}}
                                {{--<h2 class="ordinaryTitle">--}}
                                    {{--other--}}
                                {{--</h2>--}}
                                {{-- <p class="question-info">--}}
                                     {{--NEEDS THE ASSISTANCE OF MORE THAN ONE PERSON AT A TIME TO ACHIEVE ANY PARTICULAR--}}
                                     {{--TASK--}}
                                 {{--</p>--}}
                            {{--</div>--}}
                            {{--<div class="question-column">--}}

                                {{--<p class="question-info">--}}

                                    {{--{{$item->nta['Needs the assistance of more than one person at a time']}}--}}
                                {{--</p>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{--@if(!empty($item->nta['Are there any other medical conditions']))--}}
                        {{--<div class="question-row">--}}
                            {{--<div class="question-column">--}}
                                {{--<p class="question-info">--}}
                                    {{--ARE THERE ANY OTHER MEDICAL CONDITIONS, DISABILITIES, OR OTHER PIECES OF INFORMATION--}}
                                    {{--NOT--}}
                                    {{--ALREADY COVERED WHICH YOU FEEL MAY BE OF USE?--}}
                                {{--</p>--}}
                            {{--</div>--}}
                            {{--<div class="question-column">--}}

                                {{--<p class="question-info">--}}
                                    {{--{{$item->nta['Are there any other medical conditions']}}--}}
                                {{--</p>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}
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
                                cv
                            </h2>
                        </div>
                        <div class="question-column">
                            <div class="question-img">
                                <img src="dist/img/cv.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                Photographic proof of your id
                            </h2>
                        </div>
                        <div class="question-column">
                            <div class="question-img">
                                <img src="dist/img/cv.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                work
                            </h2>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                Are you able to work legally in the UK?
                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                {{$item->work_UK}}
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                Are there any restrictions on you working in the UK?
                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                {{$item->work_UK_restriction}}
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                If yes, what restrictions are there?
                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                {{$item->work_UK_description}}
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                PERSONAL REFERENCES
                            </h2>
                        </div>

                    </div>
                    {{$carerReference = $item->CarerReferences}}
                    @if(!empty($carerReference))
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                PERSON #1
                            </h2>
                        </div>

                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                Name
                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
{{--                                {{$carerReference->name}}--}}
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                Job title
                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                Lorem ipsum
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                Relationship
                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                Lorem ipsum
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                Phone
                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                Email
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                Email
                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                Chris@gmail.com
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                PERSON #2
                            </h2>
                        </div>

                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                Name
                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                Chris
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                Job title
                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                Lorem ipsum
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                Relationship
                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                Lorem ipsum
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                Phone
                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                Email
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                Email
                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                Chris@gmail.com
                            </p>
                        </div>
                    </div>
                    @endif
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                Qualifications
                            </h2>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                certificate №1
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-img">
                                <img src="dist/img/cer.jpg" alt="">
                            </div>
                            <p class="question-info">
                                NVQ
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                certificare №2
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-img">
                                <img src="dist/img/cer.jpg" alt="">
                            </div>
                            <p class="question-info">
                                CARE CERTIFICATES
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                certificate №3
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-img">
                                <img src="dist/img/cer.jpg" alt="">
                            </div>
                            <p class="question-info">
                                HEALTH AND SOCIAL
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                certificate №3
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-img">
                                <img src="dist/img/cer.jpg" alt="">
                            </div>
                            <p class="question-info">

                                TRAINING CERTIFICATES
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                certificate №3
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-img">
                                <img src="dist/img/cer.jpg" alt="">
                            </div>
                            <p class="question-info">
                                ADDITIONAL TRAINING COURSES

                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                certificate №3
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-img">
                                <img src="dist/img/cer.jpg" alt="">
                            </div>
                            <p class="question-info">
                                OTHER RELEVANT QUALIFICATIONS
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                Transport
                            </h2>
                        </div>

                    </div>

                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                Driving Licence
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-img">
                                <img src="dist/img/cer.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                Car insurance
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-img">
                                <img src="dist/img/cer.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                Criminal records
                            </h2>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                DBS Certificate photo
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-img">
                                <img src="dist/img/cer.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                DBS UPDATE SERVICE IDENTIFIER
                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                Lorem Ipsum
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                DBS DATE CERTIFICATE
                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                01/01/2017
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                CRIMINAL CONVICTIONS
                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                Lorem Ipsum
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                FURTHER INFORMATION
                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                Lorem Ipsum
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                Other question
                            </h2>
                        </div>

                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                Do you have any other questions?

                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                Yes
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <p class="question-info">
                                If yes, what questions do you have?

                            </p>
                        </div>
                        <div class="question-column">
                            <p class="question-info">
                                Lorem ipsum
                            </p>
                        </div>

                    </div>
                    <!--
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
                         <p class="question-info">
                           yes
                         </p>

                       </div>
                     </div>
                     <div class="question-row">
                       <div class="question-column">
                          <h2 class="ordinaryTitle">
                            TYPE OF CARE NEEDED
                          </h2>
                       </div>
                       <div class="question-column">
                         <p class="question-info">
                           Medication/treatments
                         </p>



                       </div>
                     </div>
                     <div class="question-row">
                       <div class="question-column">
                          <h2 class="ordinaryTitle">
                            FIRST DATE FOR CARER
                          </h2>

                       </div>
                       <div class="question-column">
                         <p class="question-info">
                           06.06.2017
                         </p>

                       </div>
                     </div>
                     <div class="question-row">
                       <div class="question-column">
                          <h2 class="ordinaryTitle">
                            NUTRITION
                          </h2>
                       </div>
                       <div class="question-column">
                         <p class="question-info">
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                         </p>
                       </div>
                     </div>
                     <div class="question-row">
                       <div class="question-column">
                          <h2 class="ordinaryTitle">
                            PERSONAL HYGIENE
                          </h2>

                       </div>
                       <div class="question-column">
                         <p class="question-info">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                         </p>
                       </div>
                     </div>
                     <div class="question-row">
                       <div class="question-column">
                          <h2 class="ordinaryTitle">
                            ВEHAVIOUR
                          </h2>
                       </div>
                       <div class="question-column">
                         <p class="question-info">
                            Anxiety
                         </p>

                       </div>
                     </div>
                     <div class="question-row">
                       <div class="question-column">
                          <h2 class="ordinaryTitle">
                            Details
                          </h2>

                       </div>
                       <div class="question-column">
                         <p class="question-info">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                         </p>

                       </div>
                     </div>
                     <div class="question-row">
                       <div class="question-column">
                          <h2 class="ordinaryTitle">
                            Night Time
                          </h2>

                       </div>
                       <div class="question-column">
                         <p class="question-info">
                           7:30 PM
                         </p>
                       </div>
                     </div>
                     <div class="question-row">
                       <div class="question-column">
                          <p class="question-info">
                            NEEDS ASSISTANCE KEEPING SAFE AT NIGHT
                          </p>
                       </div>
                       <div class="question-column">

                         <p class="question-info">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                         </p>

                       </div>
                     </div>
                     <div class="question-row">
                       <div class="question-column">
                          <h2 class="ordinaryTitle">
                            other
                          </h2>

                       </div>
                       <div class="question-column">
                         <p class="question-info">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                         </p>

                       </div>
                     </div>
                     <div class="question-row">
                       <div class="question-column">

                          <p class="question-info">
                            ARE THERE ANY OTHER MEDICAL CONDITIONS, DISABILITIES, OR OTHER PIECES OF INFORMATION NOT ALREADY COVERED WHICH YOU FEEL MAY BE OF USE?
                          </p>
                       </div>
                       <div class="question-column">
                         <p class="question-info">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                         </p>
                       </div>
                     </div>
                   -->
                </div>
            </div>
    </div>
</div>
</div>
