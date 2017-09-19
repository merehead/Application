<div id="health-div" class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">Health</h2>
        <a href="#" class="btn btn-info btn-edit"><span class="fa fa-pencil" data-id="health"></span> EDIT</a>
        <button type="button" class="btn btn-success hidden" id="load" data-loading-text="<i class='fa fa-spinner
        fa-spin '></i> Processing"><i class="fa fa-floppy-o"></i>  Save</button>
    </div>
</div>
{!! Form::model($serviceUsersProfile,['method'=>'POST','action'=>['ServiceUserPrivateProfileController@update',$serviceUsersProfile->id],'id'=>'health']) !!}
{!! Form::hidden('id',null) !!}
{!! Form::hidden('stage','health') !!}
{{Form::submit('Click Me!')}}

<div class="borderContainer">
    <h2 class="fieldCategory">
        Conditions
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Mental / Psychological conditions
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Deafness / Serious hearing Impairment 
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Has problems understanding other people
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                please give their name and relationship to  [Service User name]   </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Long Term medical conditions
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                What long term health conditions does [Service User name] have?   </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>
    </div>
    <div class="profileRow">
        <div class="profileField profileField--full-width">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               HAS OTHER MEDICAL CONDITIONS
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>

    </div>
</div>
<div class="borderContainer">
    <h2 class="fieldCategory">
        Communication
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Has problems understanding other people
              </span>
            </h2>
            {!! Form::select('comprehension',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('comprehension'))
                <span class="help-block"><strong>{{ $errors->first('comprehension') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('comprehension_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('comprehension_detail'))
                <span class="help-block"><strong>{{ $errors->first('comprehension_detail') }}</strong></span>
            @endif
        </div>
    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Has difficulties understanding or  communicating with other
              </span>
            </h2>
            {!! Form::select('comprehension',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('comprehension'))
                <span class="help-block"><strong>{{ $errors->first('comprehension') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('comprehension_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('comprehension_detail'))
                <span class="help-block"><strong>{{ $errors->first('comprehension_detail') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Has difficulties understanding or  communicating with other
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Needs help with speech
              </span>
            </h2>
            {!! Form::select('speech',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('speech'))
                <span class="help-block"><strong>{{ $errors->first('speech') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('speech_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('speech_detail'))
                <span class="help-block"><strong>{{ $errors->first('speech_detail') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Has serious impediments seeing
              </span>
            </h2>
            {!! Form::select('vision',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('vision'))
                <span class="help-block"><strong>{{ $errors->first('vision') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('vision_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('vision_detail'))
                <span class="help-block"><strong>{{ $errors->first('vision_detail') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Has serious impediments hearing
              </span>
            </h2>
            {!! Form::select('hearing',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('hearing_detail'))
                <span class="help-block"><strong>{{ $errors->first('hearing_detail') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('hearing_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('hearing_detail'))
                <span class="help-block"><strong>{{ $errors->first('hearing_detail') }}</strong></span>
            @endif
        </div>
    </div>
</div>

<div class="borderContainer">
    <h2 class="fieldCategory">
        Medication
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Requires assistance in taking medication / treatments
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>

    </div>


</div>

<div class="borderContainer">
    <h2 class="fieldCategory">
        Allergies
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Has allergies to food / medication / anything else
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>
    </div>


</div>

<div class="borderContainer">
    <h2 class="fieldCategory">
        skin
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Has  risk of developing pressure sores on their skin
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Needs assistance with changing wound dressings
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>
    </div>


</div>

<div class="borderContainer">
    <h2 class="fieldCategory">
        mobility
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Requires help with mobility  
              </span>
            </h2>

            {!! Form::select('help_with_mobility',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('help_with_mobility'))
                <span class="help-block"><strong>{{ $errors->first('help_with_mobility') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>

            {!! Form::text('common_mobility_details',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"250"]) !!}
            @if ($errors->has('common_mobility_details'))
                <span class="help-block"><strong>{{ $errors->first('common_mobility_details') }}</strong></span>
            @endif
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Needs help moving around home
              </span>
            </h2>
            {!! Form::select('mobility_home',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('mobility_home'))
                <span class="help-block"><strong>{{ $errors->first('mobility_home') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('mobility_home_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('mobility_home_detail'))
                <span class="help-block"><strong>{{ $errors->first('mobility_home_detail') }}</strong></span>
            @endif
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Needs help getting in / out of bed
              </span>
            </h2>

            {!! Form::select('mobility_bed',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('mobility_bed'))
                <span class="help-block"><strong>{{ $errors->first('mobility_bed') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>

            {!! Form::text('mobility_bed_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('mobility_bed_detail'))
                <span class="help-block"><strong>{{ $errors->first('mobility_bed_detail') }}</strong></span>
            @endif
        </div>

    </div>


    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Has  a history of falls
              </span>
            </h2>
            {!! Form::select('history_of_falls',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('history_of_falls'))
                <span class="help-block"><strong>{{ $errors->first('history_of_falls') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('falls_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('falls_detail'))
                <span class="help-block"><strong>{{ $errors->first('falls_detail') }}</strong></span>
            @endif
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Needs help going shopping, or to other local facilities / events
              </span>
            </h2>
            {!! Form::select('mobility_shopping',['Yes'=>'Yes','No'=>'No','Sometimes'=>'Sometimes'],null,['class'=>'profileField__select','placeholder'=>'Please select']) !!}
            @if ($errors->has('mobility_shopping'))
                <span class="help-block"><strong>{{ $errors->first('mobility_shopping') }}</strong></span>
            @endif
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            {!! Form::text('mobility_shopping_detail',null,['class'=>'profileField__input ','placeholder'=>'Type details','maxlength'=>"500"]) !!}
            @if ($errors->has('mobility_shopping_detail'))
                <span class="help-block"><strong>{{ $errors->first('mobility_shopping_detail') }}</strong></span>
            @endif
        </div>

    </div>


</div>

<div class="borderContainer">
    <h2 class="fieldCategory">
        Nutrition
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Requires assistance with eating / drinking
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Can prepare food for themselves
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Would  like assistance with preparing meals
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>

    </div>


    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Has special nutritional or belief based dietary requirements
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              Has other special dietary requirements
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>

    </div>


</div>


<div class="borderContainer">
    <h2 class="fieldCategory">
        Personal Hygiene
    </h2>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Requires assistance in getting dressed / bathing or toileting
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Needs assistance in choosing appropriate clothes
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Needs assistance getting dressed / undressed
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>

    </div>


    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
               Needs assistance with bathing / showering
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>

    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              Needs  assistance managing their toilet needs
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>

    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              Needs help mobilising themselves to the toilet
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>

    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              Needs help cleaning themselves when using the toilet
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>

    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              Has incontinence
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>

    </div>
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              Needs help in choosing incontinence products
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>

    </div>



    <div class="profileRow">
        <div class="profileField profileField--full-width">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                The incontinence products are stored...    </span>
            </h2>
            <textarea class="profileField__area" placeholder="Type details"></textarea>
        </div>
    </div>







    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
              Has own supply of incontinence wear
              </span>
            </h2>
            <select class="profileField__select">
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="profileField profileField--two-thirds">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Please, give details  </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="Type details">
        </div>

    </div>


</div>