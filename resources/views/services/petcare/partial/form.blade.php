<div class="w3-row-padding w3-card-1">
    {{-- BASIC INFORMATION --}}
    <fieldset>
        <legend>Basic information:</legend>
        <label>First Name</label>
        {!! Form::text('name', null, ['class' => 'form-control w3-input w3-border-teal']) !!}
        <label>Last Name</label>
        {!! Form::text('lastname', null, ['class' => 'form-control w3-input w3-border-teal']) !!}

        <label>Address</label>
        {!! Form::text('address', null, ['class' => 'form-control w3-input w3-border-teal']) !!}

        <label>Email</label>
        {!! Form::email('email', null, ['class' => 'form-control w3-input w3-border-teal']) !!}

        <label>Phone</label>
        {!! Form::tel('phone', null, ['class' => 'form-control w3-input w3-border-teal']) !!}
        <br/>
        <label>Avatar</label>
        <p>{{ Form::file('avatar') }}</p><br/>
    </fieldset>
    {{-- SKILLS --}}
    <fieldset>
        <legend>Skills:</legend>
        @if(empty($employee))
            <label>Skill </label>
            {!! Form::select('skill', $selectSkills, null,['class' => 'form-control w3-input w3-border-teal', 'placeholder' => '--- Choose an option ---']); !!}
            <br/>
            <label>Percentage</label>
            {!! Form::number('percentage_skill', null, ['class' => 'form-control w3-input w3-border-teal', 'required']) !!}
            <br/>
        @else
            @foreach($selectSkills as $key => $skill)
                <label>Skill </label>
                {!! Form::select('skill[]', [$key => $skill], $key, ['class' => 'form-control w3-input w3-border-teal']); !!}
                <br/>
                <label>Percentage</label>
                {!! Form::number('percentage_skill[]', $percentageSkills[$key], ['class' => 'form-control w3-input w3-border-teal', 'required']) !!}
                <br/>
            @endforeach
            {{--    ADD SKILL   --}}
            {{--<div id="skillsDiv">
                <div id="skillsHidden" style="display: none">
                    <label>Skill </label>
                    {!! Form::select('skill[]', $selectSkillsHidden, null,['class' => 'form-control w3-input w3-border-teal', 'placeholder' => '--- Choose an option ---']); !!}
                    <br/>
                    <label>Percentage</label>
                    {!! Form::number('percentage[]', null, ['class' => 'form-control w3-input w3-border-teal']) !!}
                    <br />
                </div>
                <a onclick="document.getElementById('skillsHidden').style.display = 'initial';"
                        class="w3-button w3-white w3-border w3-border-teal">Add Skill
                </a>
            </div>--}}
        @endif
    </fieldset>

    {{-- LANGUAGES --}}
    <fieldset>
        <legend>Languages:</legend>
        @if(empty($employee))
            <label>Language </label>
            {!! Form::select('language', $selectLanguages, null,['class' => 'form-control w3-input w3-border-teal', 'placeholder' => '--- Choose an option ---']); !!}
            <br/>
            <label>Percentage</label>
            {!! Form::number('percentage_lang', null, ['class' => 'form-control w3-input w3-border-teal', 'required']) !!}
        @else
            @foreach($selectLanguages as $key => $language)
                <label>Language </label>
                {!! Form::select('language[]', [$key => $language], $key, ['class' => 'form-control w3-input w3-border-teal']); !!}
                <br/>
                <label>Percentage</label>
                {!! Form::number('percentage_lang[]', $percentageLanguages[$key], ['class' => 'form-control w3-input w3-border-teal', 'required']) !!}
                <br/>
            @endforeach
        @endif
    </fieldset>
    <br/>

    {{-- EXPERCIENCES --}}
    <fieldset>
        <legend>Experiences:</legend>
        @if(empty($employee))
            <label>Experience </label>
            {!! Form::select('experience', $selectExperiences, null,['class' => 'form-control w3-input w3-border-teal', 'placeholder' => '--- Choose an option ---']); !!}
            <br/>
            <label>Company</label>
            {!! Form::text('company', null, ['class' => 'form-control w3-input w3-border-teal']) !!}
            <label>Description</label>
            {!! Form::text('description', null, ['class' => 'form-control w3-input w3-border-teal']) !!}
            <label>Start date</label>
            {!! Form::date('start_date', null, ['class' => 'form-control w3-input w3-border-teal']) !!}
            <label>End date</label>
            {!! Form::date('end_date', null, ['class' => 'form-control w3-input w3-border-teal']) !!}
        @else
            @foreach($selectExperiences as $key => $experience)
                <label>Experience </label>
                {!! Form::select('experience[]', [$key => $experience], $key, ['class' => 'form-control w3-input w3-border-teal']); !!}
                <br/>
                <label>Company</label>
                {!! Form::text('company[]', $experiences[$key]->company, ['class' => 'form-control w3-input w3-border-teal']) !!}
                <label>Description</label>
                {!! Form::text('description[]', $experiences[$key]->description, ['class' => 'form-control w3-input w3-border-teal']) !!}
                <label>Start date</label>
                {!! Form::date('start_date[]', $experiences[$key]->start_date, ['class' => 'form-control w3-input w3-border-teal']) !!}
                <label>End date</label>
                {!! Form::date('end_date[]', $experiences[$key]->end_date, ['class' => 'form-control w3-input w3-border-teal']) !!}
                <br/>
                <hr/>
            @endforeach
        @endif
    </fieldset>
    <br/>


    <p>
        {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary']) }}
    </p>
</div>