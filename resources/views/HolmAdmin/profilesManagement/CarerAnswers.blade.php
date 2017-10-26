<div class="modal fade" id="NTAModal" role="dialog" style="position: fixed; top:50%; left:50%;">
    <div class="modal-dialog">
        <div class="popupWrap">
            <div class="adminPopup ">
                <div class="adminPopup__head popupHead">
                    <a href="#" class="closeModal" onclick="event.preventDefault();$('#NTAModal').modal('hide');">
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
                                <?PHP
                                $document = $user[1]->documents->filter(function ($documents) {
                                    return $documents->type =='ADDITIONAL_DOCUMENTS_CV';
                                })->first();
                                if(!empty($document)) $document=$document->toArray(); else $document['id']='';
                                ?>
                                <img height="182px" src="/api/document/{{$document['id']}}/preview" alt="">
                            </div>
                            <p class="question-info">
                                <a href="/document/{{$document['id']}}/download">Download</a>
                            </p>
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

                                <?PHP
                                $document = $user[1]->documents->filter(function ($documents) {
                                    return $documents->type =='PASSPORT';
                                })->first();
                                if(!empty($document)) $document=$document->toArray(); else $document['id']='';
                                ?>
                                <img height="182px" src="/api/document/{{$document['id']}}/preview" alt="">
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
                                {{$user[1]->userCarerProfile->work_UK}}
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
                                {{$user[1]->userCarerProfile->work_UK_restriction}}
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
                                {{$user[1]->userCarerProfile->work_UK_description}}
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
                                {{$user[0][0]->name??''}}
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
                                {{$user[0][0]->job_title??''}}
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
                                {{$user[0][0]->relationship??''}}
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
                                {{$user[0][0]->phone??''}}
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
                                {{$user[0][0]->email??''}}
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
                                {{$user[0][1]->name??''}}
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
                                {{$user[0][1]->job_title??''}}
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
                                {{$user[0][1]->relationship??''}}
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
                                {{$user[0][1]->phone??''}}
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
                                {{$user[0][1]->email??''}}
                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <h2 class="ordinaryTitle">
                                Qualifications
                            </h2>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <?PHP
                            $document = $user[1]->documents->filter(function ($documents) {
                                return $documents->type =='NVQ';
                            })->first();
                            if(!empty($document)) $document=$document->toArray(); else $document['id']='';
                            ?>
                            <p class="question-info">
                                {{$document['title']??''}}
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-img">

                                <img height="182px" src="/api/document/{{$document['id']}}/preview" alt="">
                            </div>
                            <p class="question-info">

                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <?PHP
                            $document = $user[1]->documents->filter(function ($documents) {
                                return $documents->type =='CARE_CERTIFICATE';
                            })->first();
                            if(!empty($document)) $document=$document->toArray(); else $document['id']='';
                            ?>
                            <p class="question-info">
                                {{$document['title']??''}}
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-img">

                                <img height="182px" src="/api/document/{{$document['id']}}/preview" alt="">
                            </div>
                            <p class="question-info">

                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <?PHP
                            $document = $user[1]->documents->filter(function ($documents) {
                                return $documents->type =='HEALTH_AND_SOCIAL';
                            })->first();
                            if(!empty($document)) $document=$document->toArray(); else $document['id']='';
                            ?>
                            <p class="question-info">
                                {{$document['title']??''}}
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-img">

                                <img height="182px" src="/api/document/{{$document['id']}}/preview" alt="">
                            </div>
                            <p class="question-info">

                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <?PHP
                            $document = $user[1]->documents->filter(function ($documents) {
                                return $documents->type =='TRAINING_CERTIFICATE';
                            })->first();if(!empty($document)) $document=$document->toArray(); else $document['id']='';
                            ?>
                            <p class="question-info">
                                {{$document['title']??''}}
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-img">

                                <img height="182px" src="/api/document/{{$document['id']}}/preview" alt="">
                            </div>
                            <p class="question-info">

                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <?PHP
                            $document = $user[1]->documents->filter(function ($documents) {
                                return $documents->type =='ADDITIONAL_TRAINING_COURSE';
                            })->first();if(!empty($document)) $document=$document->toArray(); else $document['id']='';
                            ?>
                            <p class="question-info">
                                {{$document['title']??''}}
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-img">

                                <img height="182px" src="/api/document/{{$document['id']}}/preview" alt="">
                            </div>
                            <p class="question-info">

                            </p>
                        </div>
                    </div>
                    <div class="question-row">
                        <div class="question-column">
                            <?PHP
                            $document = $user[1]->documents->filter(function ($documents) {
                                return $documents->type =='OTHER_RELEVANT_QUALIFICATION';
                            })->first();if(!empty($document)) $document=$document->toArray(); else $document['id']='';
                            ?>
                            <p class="question-info">
                                {{$document['title']??''}}
                            </p>
                        </div>
                        <div class="question-column">
                            <div class="question-img">
                                <img height="182px" src="/api/document/{{$document['id']}}/preview" alt="">
                            </div>
                            <p class="question-info">

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
                                <?PHP
                                $document = $user[1]->documents->filter(function ($documents) {
                                    return $documents->type =='DRIVING_LICENCE_PHOTO';
                                })->first();if(!empty($document)) $document=$document->toArray(); else $document['id']='';
                                ?>
                                <img height="182px" src="/api/document/{{$document['id']}}/preview" alt="">

                            </div>
                            <p class="question-info">
                                <a href="/document/{{$document['id']}}/download">Download</a>
                            </p>
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
                                <?PHP
                                $document = $user[1]->documents->filter(function ($documents) {
                                    return $documents->type =='CAR_INSURANCE_PHOTO';
                                })->first();if(!empty($document)) $document=$document->toArray(); else $document['id']='';
                                ?>
                                <img height="182px" src="/api/document/{{$document['id']}}/preview" alt="">
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
                                <?PHP
                                $document = $user[1]->documents->filter(function ($documents) {
                                    return $documents->type =='DBS_CERTIFICATE_PHOTO';
                                })->first();if(!empty($document)) $document=$document->toArray(); else $document['id']='';
                                ?>
                                <img height="182px" src="/api/document/{{$document['id']}}/preview" alt="">
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
                                {{$user[1]->userCarerProfile->DBS_identifier}}
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
                                {{$user[1]->userCarerProfile->dbs_date}}
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
                                {{$user[1]->userCarerProfile->criminal_conviction}}
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
                                {{$user[1]->userCarerProfile->have_questions}}
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
                                {{$user[1]->userCarerProfile->questions}}
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
