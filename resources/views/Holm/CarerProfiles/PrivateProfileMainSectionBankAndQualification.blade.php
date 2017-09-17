<div id="carerBank" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">BANK ACCOUNT </h2>
        <a href="#" class="btn btn-info btn-edit btn-edit"><span class="fa fa-pencil" data-id="carerPrivateBank"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>

    </div>
</div>

{!! Form::model($user, ['method'=>'POST','route'=>'ImCarerPrivatePage','id'=>'carerPrivateBank']) !!}
{!! Form::hidden('id',null) !!}
{!! Form::hidden('stage','bank') !!}
<div class="borderContainer">
    <div class="profileRow">
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ">
                SORT CODE
              </span>

            </h2>
            {!! Form::text('sort_code',$carerProfile->sort_code,['class'=>'profileField__input','placeholder'=>'Sort code',
            'maxlength'=>16]) !!}
        </div>
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ">
                ACCOUNT NUMBER
              </span>

            </h2>
            {!! Form::text('account_number',$carerProfile->account_number,['class'=>'profileField__input',
            'placeholder'=>'Account number','maxlength'=>32]) !!}
            @if ($errors->has('account_number'))
                <span class="help-block">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
</div>
{!! Form::close()!!}

<div class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">QUALIFICATIONS </h2>
        <a href="#" class="btn btn-info btn-edit btn-edit"><span class="fa fa-pencil" data-id="carerPrivateAvailability"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
    </div>
</div>

<div class="borderContainer" id="carerPrivateAvailability">
    <div class="profileRow">
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               NVQs
              </span>
            </h2>

            <div class="addContainer">
              <input disabled class="pickfiles" value=""
                accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
              <span class="pickfiles-delete">X</span>

              <div id="nvq" class="pickfiles_img"></div>
                <a class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                    <div class="add__comment add__comment--smaller"></div>
                </a>
            </div>
            <div class="addInfo">
                <input disabled type="text" name="nvq" class="addInfo__input" placeholder="Name">
            </div>

        </div>
        <div class="profileField ">

          <div class="addContainer">
            <input disabled class="pickfiles" value=""
              accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
            <span class="pickfiles-delete">X</span>

            <div id="nvq1" class="pickfiles_img"></div>
              <a class="add add--moreHeight">
                  <i class="fa fa-plus-circle"></i>
                  <div class="add__comment add__comment--smaller"></div>
              </a>
          </div>
          <div class="addInfo">
              <input disabled type="text" name="nvq" class="addInfo__input" placeholder="Name">
          </div>
        </div>

        <div class="profileField ">

          <div class="addContainer">
            <input disabled class="pickfiles" value=""
              accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
            <span class="pickfiles-delete">X</span>

            <div id="nvq2" class="pickfiles_img"></div>
              <a class="add add--moreHeight">
                  <i class="fa fa-plus-circle"></i>
                  <div class="add__comment add__comment--smaller"></div>
              </a>
          </div>
          <div class="addInfo">
              <input disabled type="text" name="nvq" class="addInfo__input" placeholder="Name">
          </div>
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Care Certificates
              </span>
            </h2>

            <div class="addContainer">
              <input disabled class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
              <span class="pickfiles-delete">X</span>

              <div id="care_certificate" class="pickfiles_img"></div>
                <a class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                    <div class="add__comment add__comment--smaller"></div>
                </a>
            </div>
            <div class="addInfo">
                <input disabled type="text" name="care_certificate" class="addInfo__input" placeholder="Name">
            </div>

        </div>
        <div class="profileField ">

          <div class="addContainer">
            <input disabled class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
            <span class="pickfiles-delete">X</span>

            <div id="care_certificate1" class="pickfiles_img"></div>
              <a class="add add--moreHeight">
                  <i class="fa fa-plus-circle"></i>
                  <div class="add__comment add__comment--smaller"></div>
              </a>
          </div>
          <div class="addInfo">
              <input disabled type="text" name="care_certificate" class="addInfo__input" placeholder="Name">
          </div>
        </div>

        <div class="profileField ">

          <div class="addContainer">
            <input disabled class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
            <span class="pickfiles-delete">X</span>

            <div id="care_certificate2" class="pickfiles_img"></div>
              <a class="add add--moreHeight">
                  <i class="fa fa-plus-circle"></i>
                  <div class="add__comment add__comment--smaller"></div>
              </a>
          </div>
          <div class="addInfo">
              <input disabled type="text" name="care_certificate" class="addInfo__input" placeholder="Name">
          </div>
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Health and Social
              </span>
            </h2>

            <div class="addContainer">
              <input disabled class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
              <span class="pickfiles-delete">X</span>

              <div id="health_and_social" class="pickfiles_img"></div>
                <a class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                    <div class="add__comment add__comment--smaller"></div>
                </a>
            </div>
            <div class="addInfo">
                <input disabled type="text" name="health_and_social" class="addInfo__input" placeholder="Name">
            </div>

        </div>
        <div class="profileField ">

          <div class="addContainer">
            <input disabled class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
            <span class="pickfiles-delete">X</span>

            <div id="health_and_social1" class="pickfiles_img"></div>
              <a class="add add--moreHeight">
                  <i class="fa fa-plus-circle"></i>
                  <div class="add__comment add__comment--smaller"></div>
              </a>
          </div>
          <div class="addInfo">
              <input disabled type="text" name="health_and_social" class="addInfo__input" placeholder="Name">
          </div>
        </div>

        <div class="profileField ">

          <div class="addContainer">
            <input disabled class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
            <span class="pickfiles-delete">X</span>

            <div id="health_and_social2" class="pickfiles_img"></div>
              <a class="add add--moreHeight">
                  <i class="fa fa-plus-circle"></i>
                  <div class="add__comment add__comment--smaller"></div>
              </a>
          </div>
          <div class="addInfo">
              <input disabled type="text" name="health_and_social" class="addInfo__input" placeholder="Name">
          </div>
        </div>
    </div>


    <div class="profileRow">
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Training certificates
              </span>
            </h2>

            <div class="addContainer">
              <input disabled class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
              <span class="pickfiles-delete">X</span>

              <div id="training_certificate" class="pickfiles_img"></div>
                <a class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                    <div class="add__comment add__comment--smaller"></div>
                </a>
            </div>
            <div class="addInfo">
                <input disabled type="text" name="training_certificate" class="addInfo__input" placeholder="Name">
            </div>

        </div>
        <div class="profileField ">

          <div class="addContainer">
            <input disabled class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
            <span class="pickfiles-delete">X</span>

            <div id="training_certificate1" class="pickfiles_img"></div>
              <a class="add add--moreHeight">
                  <i class="fa fa-plus-circle"></i>
                  <div class="add__comment add__comment--smaller"></div>
              </a>
          </div>
          <div class="addInfo">
              <input disabled type="text" name="training_certificate" class="addInfo__input" placeholder="Name">
          </div>
        </div>

        <div class="profileField ">

          <div class="addContainer">
            <input disabled class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
            <span class="pickfiles-delete">X</span>

            <div id="training_certificate2" class="pickfiles_img"></div>
              <a class="add add--moreHeight">
                  <i class="fa fa-plus-circle"></i>
                  <div class="add__comment add__comment--smaller"></div>
              </a>
          </div>
          <div class="addInfo">
              <input disabled type="text" name="training_certificate" class="addInfo__input" placeholder="Name">
          </div>
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Additional training courses
              </span>
            </h2>

            <div class="addContainer">
              <input disabled class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
              <span class="pickfiles-delete">X</span>

              <div id="additional_training_course" class="pickfiles_img"></div>
                <a class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                    <div class="add__comment add__comment--smaller"></div>
                </a>
            </div>
            <div class="addInfo">
                <input disabled type="text" name="additional_training_course" class="addInfo__input" placeholder="Name">
            </div>

        </div>
        <div class="profileField ">

          <div class="addContainer">
            <input disabled class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
            <span class="pickfiles-delete">X</span>

            <div id="additional_training_course1" class="pickfiles_img"></div>
              <a class="add add--moreHeight">
                  <i class="fa fa-plus-circle"></i>
                  <div class="add__comment add__comment--smaller"></div>
              </a>
          </div>
          <div class="addInfo">
              <input disabled type="text" name="additional_training_course" class="addInfo__input" placeholder="Name">
          </div>
        </div>

        <div class="profileField ">

          <div class="addContainer">
            <input disabled class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
            <span class="pickfiles-delete">X</span>

            <div id="additional_training_course2" class="pickfiles_img"></div>
              <a class="add add--moreHeight">
                  <i class="fa fa-plus-circle"></i>
                  <div class="add__comment add__comment--smaller"></div>
              </a>
          </div>
          <div class="addInfo">
              <input disabled type="text" name="additional_training_course" class="addInfo__input" placeholder="Name">
          </div>
        </div>
    </div>


    <div class="profileRow">
        <div class="profileField ">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Other relevant qualifications
              </span>
            </h2>

            <div class="addContainer">
              <input disabled class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
              <span class="pickfiles-delete">X</span>

              <div id="other_relevant_qualifications" class="pickfiles_img"></div>
                <a class="add add--moreHeight">
                    <i class="fa fa-plus-circle"></i>
                    <div class="add__comment add__comment--smaller"></div>
                </a>
            </div>
            <div class="addInfo">
                <input disabled type="text" name="other_relevant_qualification" class="addInfo__input" placeholder="Name">
            </div>

        </div>
        <div class="profileField ">

          <div class="addContainer">
            <input disabled class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
            <span class="pickfiles-delete">X</span>

            <div id="other_relevant_qualifications1" class="pickfiles_img"></div>
              <a class="add add--moreHeight">
                  <i class="fa fa-plus-circle"></i>
                  <div class="add__comment add__comment--smaller"></div>
              </a>
          </div>
          <div class="addInfo">
              <input disabled type="text" name="other_relevant_qualification" class="addInfo__input" placeholder="Name">
          </div>
        </div>

        <div class="profileField ">

          <div class="addContainer">
            <input disabled class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />
            <span class="pickfiles-delete">X</span>

            <div id="other_relevant_qualifications2" class="pickfiles_img"></div>
              <a class="add add--moreHeight">
                  <i class="fa fa-plus-circle"></i>
                  <div class="add__comment add__comment--smaller"></div>
              </a>
          </div>
          <div class="addInfo">
              <input disabled type="text" name="other_relevant_qualification" class="addInfo__input" placeholder="Name">
          </div>
        </div>
    </div>


</div>
