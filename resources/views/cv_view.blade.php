<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $user->name }}-CV</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <!-- FontAwesome JS-->
    <script defer src="assets/fontawesome/js/all.min.js"></script>

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <div class="main-wrapper">
        <div class="container px-3 px-lg-5">
            <article class="resume-wrapper mx-auto theme-bg-light p-5 mb-5 my-5 shadow-lg">

                <div class="resume-header">
                    <div class="row align-items-center">
                        <div class="resume-title col-12 col-md-6 col-lg-8 col-xl-9">
                            <h2 class="resume-name mb-0 text-uppercase">{{ $user->name }} {{ $user->surname }}</h2>
                            <div class="resume-tagline mb-3 mb-md-0"></div>
                        </div>
                        <!--//resume-title-->
                        <div class="resume-contact col-12 col-md-6 col-lg-4 col-xl-3">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="fas fa-phone-square fa-fw fa-lg me-2 "></i><a
                                        class="resume-link" href="tel:#">{{ $user->phone_number }}</a></li>
                                <li class="mb-2"><i class="fas fa-envelope-square fa-fw fa-lg me-2"></i><a
                                        class="resume-link" href="mailto:#">{{ $user->email }}</a></li>
                                <li class="mb-2"><i class="fas fa-globe fa-fw fa-lg me-2"></i><a
                                        class="resume-link" href="#">www.yourwebsite.com</a></li>
                                <li class="mb-0"><i class="fas fa-map-marker-alt fa-fw fa-lg me-2"></i></li>
                            </ul>
                        </div>
                        <!--//resume-contact-->
                    </div>
                    <!--//row-->

                </div>
                <!--//resume-header-->
                <hr>
                <div class="resume-intro py-3">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-3 col-xl-2 text-center">
                            <img class="resume-profile-image mb-3 mb-md-0 me-md-5  ms-md-0 rounded mx-auto"
                                src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="image">
                        </div>

                        <div class="col text-start">
                            <p class="mb-0">{{$user->additional_info}}</p>
                        </div>
                        <!--//col-->
                    </div>
                </div>
                <!--//resume-intro-->
                <hr>
                <div class="resume-body">
                    <div class="row">
                        <div class="resume-main col-12 col-lg-8 col-xl-9   pe-0   pe-lg-5">
                            <section class="work-section py-3">
                                <h3 class="text-uppercase resume-section-heading mb-4">Work Experiences</h3>
                                @foreach ($jobs as $work)
                                    <div class="item mb-3">
                                        <div class="item-heading row align-items-center mb-2">
                                            <h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0">
                                                {{ $work->job_title }}</h4>
                                            <div
                                                class="item-meta col-12 col-md-6 col-lg-4 text-muted text-start text-md-end">
                                                {{ $work->company_name }} | {{ $work->work_from }} -
                                                {{ $work->work_to }}</div>

                                        </div>
                                        <div class="item-content">
                                            <p>{{ $work->work_description }}</p>
                                            <p>Hours per day: {{ $work->working_hours }}</p>
                                        </div>
                                    </div>
                                    <!--//item-->
                                @endforeach

                                <section class="project-section py-3">
                                    <h3 class="text-uppercase resume-section-heading mb-4">Education</h3>
                                    <div class="item mb-3">
                                        @foreach ($educations as $education)
                                            <div class="item mb-3">
                                                <div class="item-heading row align-items-center mb-2">
                                                    <h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0">
                                                        {{ $education->education_level }}</h4>
                                                    <div
                                                        class="item-meta col-12 col-md-6 col-lg-4 text-muted text-start text-md-end">
                                                        {{ $education->school_name }} |
                                                        {{ $education->education_from }} -
                                                        {{ $education->education_to }}
                                                    </div>
                                                    <div class="item-content">
                                                        <p>Course name: {{ $education->course_name }}</p>
                                                        <p>{{ $education->education_description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--//item-->
                                        @endforeach
                                    </div>
                                    <!--//item-->
                                </section>
                                <!--//project-section-->
                        </div>
                        <!--//resume-main-->
                        <aside class="resume-aside col-12 col-lg-4 col-xl-3 px-lg-4 pb-lg-4">
                            <section class="skills-section py-3">
                                <h3 class="text-uppercase resume-section-heading mb-4">Skills</h3>
                                <div class="item">
                                    <ul class="list-unstyled resume-skills-list">
                                        {{ $user->skills }}
                                    </ul>
                                </div>
                                <!--//item-->
                            </section>
                            <!--//skills-section-->
                            <section class="skills-section py-3">
                                <h3 class="text-uppercase resume-section-heading mb-4">Languages</h3>
                                <ul class="list-unstyled resume-lang-list">
                                    {{ $user->languages }}
                                </ul>
                            </section>
                            <!--//certificates-section-->
                            <section class="skills-section py-3">
                                <h3 class="text-uppercase resume-section-heading mb-4">Interests</h3>
                                {{ $user->interests }}
                                </ul>
                            </section>
                            <!--//certificates-section-->

                        </aside>
                        <!--//resume-aside-->
                    </div>
                    <!--//row-->
                </div>
                <!--//resume-body-->
                <hr>
                <div class="resume-footer text-center">
                    <ul class="resume-social-list list-inline mx-auto mb-0 d-inline-block text-muted">
                        <li class="list-inline-item mb-lg-0 me-3"><a class="resume-link" href="#"><i
                                    class="fab fa-github-square fa-2x me-2" data-fa-transform="down-4"></i><span
                                    class="d-none d-lg-inline-block text-muted">github.com/username</span></a></li>
                        <li class="list-inline-item mb-lg-0 me-3"><a class="resume-link" href="#"><i
                                    class="fab fa-linkedin fa-2x me-2" data-fa-transform="down-4"></i><span
                                    class="d-none d-lg-inline-block text-muted">linkedin.com/in/username</span></a></li>
                        <li class="list-inline-item mb-lg-0 me-lg-3"><a class="resume-link" href="#"><i
                                    class="fab fa-twitter-square fa-2x me-2" data-fa-transform="down-4"></i><span
                                    class="d-none d-lg-inline-block text-muted">@twittername</span></a></li>
                    </ul>
                </div>
                <!--//resume-footer-->
            </article>

        </div>
        <!--//container-->

        <footer class="footer text-center py-4">
        </footer>

    </div>
    <!--//main-wrapper-->


</body>

</html>
