@extends('layouts.app')

@section('content')
    <!-- Page Container -->
    @if(Auth::user()->name == "Admin")
        <div class="w3-content w3-margin-top" style="max-width:1400px;">

            <!-- The Grid -->
            <div class="w3-row-padding">

                <!-- Left Column -->
                <div class="w3-third">

                    <div class="w3-white w3-text-grey w3-card-4">
                        <div class="w3-display-container">
                            <img src="../avatars/{{$employee->avatar}}" style="width:100%" alt="Avatar">
                            <div class="w3-display-bottomleft w3-container w3-text-black">
                                <h2>{{$employee->name ." ". $employee->lastname}}</h2>
                            </div>
                        </div>
                        <br>
                        <div class="w3-container">
                            <p>
                                <i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>{{$employeeExperiences[0]->position}}
                            </p>
                            <p>
                                <i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>{{$employee->address}}
                            </p>
                            <p>
                                <i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>{{$employee->email}}
                            </p>
                            <p>
                                <i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>{{$employee->phone}}
                            </p>
                            <hr>

                            <p class="w3-large"><b><i
                                            class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>
                            @foreach($employeeSkills as $employeeSkill)
                                <p>{{$employeeSkill->skill}}</p>
                                <div class="w3-light-grey w3-round-xlarge w3-small">
                                    <div class="w3-container w3-center w3-round-xlarge w3-teal"
                                         style="width:{{$employeeSkill->pivot->percentage}}%">{{$employeeSkill->pivot->percentage}}
                                        %
                                    </div>
                                </div>
                            @endforeach
                            <br>

                            <p class="w3-large w3-text-theme"><b><i
                                            class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Languages</b></p>
                            @foreach($employeeLanguages as $employeeLanguage)
                                <p>{{$employeeLanguage->language}}</p>
                                <div class="w3-light-grey w3-round-xlarge">
                                    <div class="w3-round-xlarge w3-teal"
                                         style="height:24px;width:{{$employeeLanguage->pivot->percentage}}%"></div>
                                </div>

                            @endforeach
                            <br>
                        </div>
                    </div>
                    <br>

                    <!-- End Left Column -->
                </div>

                <!-- Right Column -->
                <div class="w3-twothird">

                    <div class="w3-container w3-card w3-white w3-margin-bottom">
                        <h2 class="w3-text-grey w3-padding-16"><i
                                    class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Work
                            Experience
                        </h2>
                        @foreach($employeeExperiences as $key => $experience)
                            <div class="w3-container">
                                <h5 class="w3-opacity"><b>{{$experience->position}} / {{$experience->job->company}}</b>
                                </h5>

                                <h6 class="w3-text-teal"><i
                                            class="fa fa-calendar fa-fw w3-margin-right"></i>{{$experience->job->start_date}}
                                    @if($key < 1)
                                        - <span
                                                class="w3-tag w3-teal w3-round">Current</span>
                                    @else
                                        - {{$experience->job->end_date}}
                                    @endif
                                </h6>
                                <p>{{$experience->job->description}}</p>
                                <hr>
                            </div>
                        @endforeach

                    </div>

                    <div class="w3-container w3-card w3-white">
                        <h2 class="w3-text-grey w3-padding-16"><i
                                    class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education
                        </h2>
                        <div class="w3-container">
                            <h5 class="w3-opacity"><b>W3Schools.com</b></h5>
                            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Forever</h6>
                            <p>Web Development! All I need to know in one place</p>
                            <hr>
                        </div>
                        <div class="w3-container">
                            <h5 class="w3-opacity"><b>London Business School</b></h5>
                            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2013 - 2015
                            </h6>
                            <p>Master Degree</p>
                            <hr>
                        </div>
                        <div class="w3-container">
                            <h5 class="w3-opacity"><b>School of Coding</b></h5>
                            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2010 - 2013
                            </h6>
                            <p>Bachelor Degree</p><br>
                        </div>
                    </div>

                    <!-- End Right Column -->
                </div>

                <!-- End Grid -->
            </div>
            @else
                <h4>You don't have admin permission</h4>
        @endif
        <!-- End Page Container -->
        </div>

        <footer class="w3-container w3-teal w3-center w3-margin-top">
            <p>Find me on social media.</p>
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
            <p>Powered by <a href="" target="_blank">cvpro</a></p>
        </footer>

@endsection