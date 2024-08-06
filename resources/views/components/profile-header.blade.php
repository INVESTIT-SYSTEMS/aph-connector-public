<ul id="progressbar">
    <a href="{{route('my-account.your-specialization')}}">
        <li id="step01" @if(request()->routeIs('my-account.your-specialization')) class="active" @endif><strong>{{__('common.your_specialization')}}</strong></li>
    </a>
    <a href="{{route('my-account.your-top-three')}}">
        <li id="step03" @if(request()->routeIs('my-account.your-top-three')) class="active" @endif><strong>{{__('common.top_three')}}</strong></li>
    </a>
    <a href="{{route('my-account.your-personal-data')}}">
        <li id="step02" @if(request()->routeIs('my-account.your-personal-data')) class="active" @endif><strong>{{__('common.your_personal_data')}}</strong></li>
    </a>
    <a href="{{route('my-account.your-experience')}}">
        <li id="step04" @if(request()->routeIs('my-account.your-experience')) class="active" @endif><strong>{{__('common.your_experience')}}</strong></li>
    </a>
    <a href="{{route('my-account.your-education')}}">
        <li id="step05" @if(request()->routeIs('my-account.your-education')) class="active" @endif><strong>{{__('common.your_education')}}</strong></li>
    </a>
    <a href="{{route('my-account.your-preferences')}}">
        <li id="step06" @if(request()->routeIs('my-account.your-preferences')) class="active" @endif><strong>{{__('common.your_preferences')}}</strong></li>
    </a>
</ul>
