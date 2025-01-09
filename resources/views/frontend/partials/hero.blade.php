<section class="hero">
    <div class="container">
        <!-- Support image -->
        <div class="hero-left-card d-none d-sm-block">
            <img class="img-fluid hero-left-img" src="{{ asset('/') }}frontend/images/hero-left-card.svg"
                alt="" />

            <img class="spread" src="{{ asset('/') }}frontend/images/spread.svg" alt="" />
        </div>
        <!-- Support image -->
        <img class="hero-right-card img-fluid d-none d-sm-block"
            src="{{ asset('/') }}frontend/images/hero-right-card.svg" alt="" />

        <!-- Hero heading -->
        <div class="text-box flex-column gap-32 text-center position-relative">
            <!--Small heading -->
            <div class="">
                <p class="hero-small-heading rounded-100">

                    @if (session()->get('lang') == 'bangla')
                        # বিশ্বের ১ নং ইসলামিক অনলাইন প্ল্যাটফর্ম
                    @else
                        # World 01 Islamic Online platform
                    @endif
                </p>
            </div>

            <!-- heading -->
            <h1 class="position-relative w-100 mx-w-fit">
                @if (session()->get('lang') == 'bangla')
                    <img class="spread d-sm-none" src="{{ asset('/') }}frontend/images/spread.svg" alt="" />
                    তালিমুস
                    <span>সুন্নাহ
                        <img class="arrow-line d-none d-md-block"
                            src="{{ asset('/') }}frontend/images/arrow-line.svg" alt="" />
                    </span>
                @else
                    <img class="spread d-sm-none" src="{{ asset('/') }}frontend/images/spread.svg" alt="" />
                    Talimus
                    <span>Sunnah
                        <img class="arrow-line d-none d-md-block"
                            src="{{ asset('/') }}frontend/images/arrow-line.svg" alt="" />
                    </span>
                @endif

            </h1>
            <p>

                @if (session()->get('lang') == 'bangla')
                    বিশ্বস্ত আলেমদের দ্বারা পরিচালিত ইসলামী জ্ঞানের যাত্রা শুরু করুন
                    হৃদয়কে অনুপ্রাণিত করতে এবং <br />
                    মন, বিশ্বাস এবং বোঝার সমৃদ্ধি
                @else
                    Embark on a journey of Islamic knowledge, guided by trusted scholars
                    to inspire hearts and <br />
                    minds, enriching faith and understanding
                @endif
            </p>

            <div class="d-flex margin-auto">
                @if (session()->get('lang') == 'bangla')
                @else
                <button class="btn btn-lg btn-primary rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#insertModal">
                        Enroll For Free Class
                    </button>
                @endif
                @if (session()->get('lang') == 'bangla')
                @else
                <button data-bs-toggle="modal"
                data-bs-target="#insertModal" class="btn btn-p-18 btn-primary rounded-pill">
                    <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
                </button>
                @endif
            </div>
        </div>

        <img src="{{ asset('/') }}frontend/images/hero-image.svg" width="100%" alt="" />
    </div>

    <!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- First Form -->
                <div id="step1" class="card border-none padding-40 gap-32 mx-w-fit">
                    <h5 class="text-center">Personal details</h5>
                    <div class="gap-24">
                        <!-- Name -->
                        <div class="input-group">
                            <input type="text" name="name" id="_name"
                                class="form-control rounded-3 padding-12" placeholder="Name" />
                        </div>
                        <!-- Email -->
                        <div class="input-group">
                            <input type="email" name="email" id="_email"
                                class="form-control rounded-3 padding-12" placeholder="Email address" />
                        </div>
                        <!-- Phone -->
                        <div class="input-group">
                            <input type="text" name="phone" id="_phone"
                                class="form-control rounded-3 padding-12" placeholder="Phone" />
                        </div>

                        <!--country-->
                        <div class="input-group">
                            <input type="text" name="country" id="_country"
                                class="form-control rounded-3 padding-12" placeholder="Country" />
                        </div>
                    </div>
                    <button id="goToStep2" class="btn btn-primary bg-lg w-100">Next</button>
                </div>

                @php
                    $courses = App\Models\Course::where('status', 1)->select('id', 'title_en')->get();
                @endphp
                <!-- Second Form -->
                <div id="step2" class="card border-none padding-40 gap-32 date-picker d-none">
                    <h5>Select your desired course</h5>
                    <div class="row g-4">
                        @foreach ($courses as $course)
                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="_course{{ $course->id }}" name="_course_id" type="checkbox"
                                        value="{{ $course->id }}" />
                                    <label for="_course{{ $course->id }}"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        {{ $course->title_en }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row g-4">
                        <h5>Select Teacher Type You Prefer</h5>


                        <div class="col-4">
                            <div class="position-relative checkbox-box">
                                <input id="male" name="_teacher_type" type="checkbox" value="male" />
                                <label for="male"
                                    class="mb-0 position-absolute top-50 start-50 translate-middle">
                                    Male
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="position-relative checkbox-box">
                                <input id="female" name="_teacher_type" type="checkbox" value="female" />
                                <label for="female"
                                    class="mb-0 position-absolute top-50 start-50 translate-middle">
                                    Female
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="position-relative checkbox-box">
                                <input id="other" name="_teacher_type" type="checkbox" value="other" />
                                <label for="other"
                                    class="mb-0 position-absolute top-50 start-50 translate-middle">
                                    Other
                                </label>
                            </div>
                        </div>



                        <button id="goToStep3" class="btn btn-primary bg-lg w-100">Next</button>
                    </div>

                </div>

                <!--implement third form here-->
                <div id="step3" class="card border-none padding-40 gap-32 date-picker d-none">
                    <h5>Select your desired day</h5>
                    <div class="row g-4">
                        <div class="col-4">
                            <div class="position-relative checkbox-box">
                                <input id="Saturday" name="_day" type="checkbox" value="Saturday" />
                                <label for="Saturday"
                                    class="mb-0 position-absolute top-50 start-50 translate-middle">
                                    Saturday
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative checkbox-box">
                                <input id="Sunday" name="_day" type="checkbox" value="Sunday" />
                                <label for="Sunday"
                                    class="mb-0 position-absolute top-50 start-50 translate-middle">
                                    Sunday
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative checkbox-box">
                                <input id="Monday" name="_day" type="checkbox" value="Monday" />
                                <label for="Monday"
                                    class="mb-0 position-absolute top-50 start-50 translate-middle">
                                    Monday
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative checkbox-box">
                                <input id="Tuesday" name="_day" type="checkbox" value="Tuesday" />
                                <label for="Tuesday"
                                    class="mb-0 position-absolute top-50 start-50 translate-middle">
                                    Tuesday
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative checkbox-box">
                                <input id="Wednesday" name="_day" type="checkbox" value="Wednesday" />
                                <label for="Wednesday"
                                    class="mb-0 position-absolute top-50 start-50 translate-middle">
                                    Wednesday
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative checkbox-box">
                                <input id="Thursday" name="_day" type="checkbox" value="Thursday" />
                                <label for="Thursday"
                                    class="mb-0 position-absolute top-50 start-50 translate-middle">
                                    Thursday
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative checkbox-box">
                                <input id="Friday" name="_day" type="checkbox" value="Friday" />
                                <label for="Friday"
                                    class="mb-0 position-absolute top-50 start-50 translate-middle">
                                    Friday
                                </label>
                            </div>
                        </div>
                    </div>
                    <button id="insertForm" class="btn btn-primary bg-lg w-100">Submit</button>
                </div>
                <!--implement third form here end-->


            </div>
        </div>
    </div>
    <!--modal end-->
<!-- Modal -->


<!-- Include required scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Listen for changes on checkboxes with name="course_id"
    $('input[name="_course_id"]').on('change', function() {
        if ($(this).prop('checked')) {
            // Uncheck all other checkboxes when one is checked
            $('input[name="_course_id"]').not(this).prop('checked', false);
        }
    });
</script>
<script>
    // Listen for changes on checkboxes with name="teacher_type"
    $('input[name="_teacher_type"]').on('change', function() {
        if ($(this).prop('checked')) {
            // Uncheck all other checkboxes when one is checked
            $('input[name="_teacher_type"]').not(this).prop('checked', false);
        }
    });
</script>

<script>
    // Listen for changes on checkboxes with name="day"
    $('input[name="_day"]').on('change', function() {
        if ($(this).prop('checked')) {
            // Uncheck all other checkboxes when one is checked
            $('input[name="_day"]').not(this).prop('checked', false);
        }
    });
</script>

<script>
    $(document).ready(function() {
        let _userId = null; // To store the ID of the user.

        // Show the second form after saving the first form.
        $('#goToStep2').click(function(e) {
            e.preventDefault();
            const name = $('#_name').val();
            const email = $('#_email').val();
            const phone = $('#_phone').val();
            const country = $('#_country').val();

            if (!name) {
                alert('Please enter your name.');
                return;
            }
            if (!email) {
                alert('Please enter your email address.');
                return;
            }
            if (!phone) {
                alert('Please enter your phone number.');
                return;
            }
            if (!country) {
                alert('Please enter your country name.');
                return;
            }

            $.ajax({
                url: '/save-step1', // Laravel route
                method: 'POST',
                data: {
                    name,
                    email,
                    phone,
                    country,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    _userId = response.user_id; // Store the user ID from the response
                    $('#step1').addClass('d-none');
                    $('#step2').removeClass('d-none');
                    //console.log(response);
                },
                error: function(error) {
                    alert('Something went wrong.');
                },
            });
        });

        // Show the third form after saving the second form.
        $('#goToStep3').click(function(e) {
            e.preventDefault();

            // Get the selected course
            const selectedCourse = $('input[name="_course_id"]:checked').val();

            // Get the selected teacher type
            const selectedTeacherType = $('input[name="_teacher_type"]:checked').val();

            if (!selectedCourse) {
                alert('Please select a course.');
                return;
            }

            if (!selectedTeacherType) {
                alert('Please select a teacher type.');
                return;
            }

            $.ajax({
                url: '/save-step2', // Laravel route
                method: 'POST',
                data: {
                    user_id: _userId,
                    course_id: selectedCourse, // Pass the selected course
                    teacher_type: selectedTeacherType, // Pass the selected teacher type
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Assuming you want to handle the response or show some success message
                    //console.log(response); // Check response from server
                    $('#step2').addClass('d-none');
                    $('#step3').removeClass('d-none');

                },
                error: function() {
                    alert('Something went wrong.');
                },
            });
        });


        // Submit the final form and hide the modal.
        $('#insertForm').click(function(e) {
            e.preventDefault();

            const selectedDays = $('input[name="_day"]:checked').val();

            if (!selectedDays) {
                alert('Please select a day.');
                return;
            }

            $.ajax({
                url: '/save-step3', // Laravel route
                method: 'POST',
                data: {
                    user_id: _userId,
                    days: selectedDays,
                    _token: '{{ csrf_token() }}'
                },
                success: function() {
                    $('#insertModal').modal('hide');
                    //alert('Enrollment completed successfully!');

                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Enrollment completed successfully",
                        showConfirmButton: false,
                        timer: 3000 // Show for 5 seconds
                    }).then(() => {
                        // This will be executed after the timer finishes
                        window.location.reload(); // Reload the page after 5 seconds
                    });
                },
                error: function() {
                    alert('Something went wrong.');
                },
            });
        });
    });
</script>


</section>
