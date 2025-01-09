@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();
@endphp

<section class="container pricing gap-60">
    <!-- heading -->
    <div class="gap-16 flex-column">
        <!-- Button -->
        <button class="small-btn gap-8 flex-row align-items-center mx-auto">
            <div class="circle-8"></div>

            @if (session()->get('lang') == 'bangla')
                প্রাইসিং
            @else
                Pricing
            @endif
        </button>

        <!-- Heading -->
        <h3 class="section-heading mx-auto">

            @if (session()->get('lang') == 'bangla')
                মেম্বারশিপ
            @else
                Membership
            @endif
            <span class="title-container">
                <span class="highlight">
                    @if (session()->get('lang') == 'bangla')
                        প্রাইসিং
                    @else
                        Pricing
                    @endif
                    <img class="svg-underline" src="{{ asset('/') }}frontend/images/Vector.svg" alt="" />
                </span>
            </span>
        </h3>
    </div>

    <!-- cards -->

    {{-- fetch package --}}
    @php
        $packages = App\Models\Package::get();
    @endphp

    <div class="row g-4">
        <!-- card -->
        @foreach ($packages as $package)
            <div class="col-12 col-lg-4">
                <div class="pricing-card gap-32 gradient-border">
                    <!-- heanding -->
                    <div class="gap-12 pricing-card-heading">
                        <button class="small-btn">
                            @if (session()->get('lang') == 'bangla')
                                {{ $package->name_bn }}
                            @else
                                {{ $package->name_en }}
                            @endif
                        </button>
                        <p class="fs-6 color-text">
                            @if (session()->get('lang') == 'bangla')
                                {{ $package->description_bn }}
                            @else
                                {{ $package->description_en }}
                            @endif
                        </p>
                        <div class="gap-24 flex-row align-items-center">
                            <h4>
                                @if (session()->get('lang') == 'bangla')
                                    {{ $numto->bnNum($package->price_bn) }} ৳/মা
                                @else
                                    {{ $package->price_en }} $/m
                                @endif
                            </h4>
                            {{-- <p class="fs-6 d-flex flex-row gap-1 color-gray">
                Currency
                <img src="{{asset('/')}}frontend/images/i-arrow-down.svg" alt="" />
              </p> --}}
                        </div>
                        <div class="line"></div>
                    </div>

                    <!-- feature -->
                    <div class="gap-20 pricing-card-detailes">
                        <p class="p-20">
                            @if (session()->get('lang') == 'bangla')
                                আপনার কেন এটা নেওয়া উচিত?
                            @else
                                Why should you take this?
                            @endif
                        </p>

                        @if (!empty($package->feature1_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature1_status))
                                    @if ($package->feature1_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature1_bn))
                                        {{ $package->feature1_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature1_en))
                                        {{ $package->feature1_en }}
                                    @endif
                                @endif
                            </div>
                        @endif


                        @if (!empty($package->feature2_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature2_status))
                                    @if ($package->feature2_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature2_bn))
                                        {{ $package->feature2_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature2_en))
                                        {{ $package->feature2_en }}
                                    @endif
                                @endif
                            </div>
                        @endif


                        @if (!empty($package->feature3_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature3_status))
                                    @if ($package->feature3_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature3_bn))
                                        {{ $package->feature3_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature3_en))
                                        {{ $package->feature3_en }}
                                    @endif
                                @endif
                            </div>
                        @endif


                        @if (!empty($package->feature4_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature4_status))
                                    @if ($package->feature4_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature4_bn))
                                        {{ $package->feature4_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature4_en))
                                        {{ $package->feature4_en }}
                                    @endif
                                @endif
                            </div>
                        @endif


                        @if (!empty($package->feature5_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature5_status))
                                    @if ($package->feature5_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature5_bn))
                                        {{ $package->feature5_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature5_en))
                                        {{ $package->feature5_en }}
                                    @endif
                                @endif
                            </div>
                        @endif


                        @if (!empty($package->feature6_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature6_status))
                                    @if ($package->feature6_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature6_bn))
                                        {{ $package->feature6_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature6_en))
                                        {{ $package->feature6_en }}
                                    @endif
                                @endif
                            </div>
                        @endif


                        @if (!empty($package->feature7_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature7_status))
                                    @if ($package->feature7_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature7_bn))
                                        {{ $package->feature7_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature7_en))
                                        {{ $package->feature7_en }}
                                    @endif
                                @endif
                            </div>
                        @endif

                        @if (!empty($package->feature8_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature8_status))
                                    @if ($package->feature8_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature8_bn))
                                        {{ $package->feature8_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature8_en))
                                        {{ $package->feature8_en }}
                                    @endif
                                @endif
                            </div>
                        @endif

                        @if (!empty($package->feature9_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature9_status))
                                    @if ($package->feature9_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature9_bn))
                                        {{ $package->feature9_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature9_en))
                                        {{ $package->feature9_en }}
                                    @endif
                                @endif
                            </div>
                        @endif

                        @if (!empty($package->feature10_en))
                            <div class="gap-8 flex-row">
                                @if (!empty($package->feature10_status))
                                    @if ($package->feature10_status == 'yes')
                                        <img src="{{ asset('/') }}frontend/images/complete.svg" alt="" />
                                    @else
                                        <img src="{{ asset('/') }}frontend/images/i-x.svg" alt="" />
                                    @endif
                                @endif

                                @if (session()->get('lang') == 'bangla')
                                    @if (!empty($package->feature10_bn))
                                        {{ $package->feature10_bn }}
                                    @endif
                                @else
                                    @if (!empty($package->feature10_en))
                                        {{ $package->feature10_en }}
                                    @endif
                                @endif
                            </div>
                        @endif

                        @if (session()->get('lang') == 'bangla')
                        @else
                        <h5>Enroll now for three free classes</h5>
                        @endif


                    </div>
                    <!-- buttons -->
                    <div class="d-flex mt-5">
                        @if (session()->get('lang') == 'bangla')
                            <a href="{{ route('package.checkout', $package->id) }}"
                                class="btn btn-lg btn-outline-success w-100 rounded-pill">

                                এনরোল করুন
                            </a>
                        @else
                            <button class="btn btn-lg btn-outline-success w-100 rounded-pill" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">

                                Enrole For Free
                            </button>
                        @endif

                        @if (session()->get('lang') == 'bangla')
                        <a href="{{ route('package.checkout', $package->id) }}" class="btn btn-p-18 btn-primary rounded-pill">
                            <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
                        </a>
                        @else
                        <button data-bs-toggle="modal"
                        data-bs-target="#exampleModal" class="btn btn-p-18 btn-primary rounded-pill">
                            <img src="{{ asset('/') }}frontend/images/arrow.svg" alt="" />
                        </button>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!--Pricing bottom card -->

    {{-- <div
      class="card pricing--bottom-card d-flex flex-column flex-md-row justify-content-between align-items-center"
    >
      <div class="gap-16">
        <h5>Need a custom prizing ?</h5>
        <p class="fs-6">
          Looking for a Custom Pricing Plan? We’re Here to Tailor the Perfect
          Solution <br />
          Just for You!
        </p>
      </div>

      <div class="d-flex justify-content-between pricing--bottom-card-btn">
        <button class="btn btn-lg btn-primary rounded-pill w-100 text-nowrap">
          Read All Books
        </button>
        <button class="btn btn-p-18 btn-primary rounded-pill">
          <img src="{{asset('/')}}frontend/images/arrow.svg" alt="" />
        </button>
      </div>
    </div> --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- First Form -->
                    <div id="formStep1" class="card border-none padding-40 gap-32">
                        <h5 class="text-center">Personal details</h5>
                        <div class="gap-24">
                            <!-- Name -->
                            <div class="input-group">
                                <input type="text" name="name" id="name"
                                    class="form-control rounded-3 padding-12" placeholder="Name" />
                            </div>
                            <!-- Email -->
                            <div class="input-group">
                                <input type="email" name="email" id="email"
                                    class="form-control rounded-3 padding-12" placeholder="Email address" />
                            </div>
                            <!-- Phone -->
                            <div class="input-group">
                                <input type="text" name="phone" id="phone"
                                    class="form-control rounded-3 padding-12" placeholder="Phone" />
                            </div>

                            <!--country-->
                            <div class="input-group">
                                <input type="text" name="country" id="country"
                                    class="form-control rounded-3 padding-12" placeholder="Country" />
                            </div>
                        </div>
                        <button id="nextToStep2" class="btn btn-primary bg-lg w-100">Next</button>
                    </div>

                    @php
                        $courses = App\Models\Course::where('status', 1)->select('id', 'title_en')->get();
                    @endphp
                    <!-- Second Form -->
                    <div id="formStep2" class="card border-none padding-40 gap-32 date-picker d-none">
                        <h5>Select your desired course</h5>
                        <div class="row g-4">
                            @foreach ($courses as $course)
                                <div class="col-4">
                                    <div class="position-relative checkbox-box">
                                        <input id="course{{ $course->id }}" name="course_id" type="checkbox"
                                            value="{{ $course->id }}" />
                                        <label for="course{{ $course->id }}"
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
                                    <input id="male" name="teacher_type" type="checkbox" value="male" />
                                    <label for="male"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Male
                                    </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="female" name="teacher_type" type="checkbox" value="female" />
                                    <label for="female"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Female
                                    </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="other" name="teacher_type" type="checkbox" value="other" />
                                    <label for="other"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Other
                                    </label>
                                </div>
                            </div>



                            <button id="nextToStep3" class="btn btn-primary bg-lg w-100">Next</button>
                        </div>

                    </div>

                    <!--implement third form here-->
                    <div id="form3" class="card border-none padding-40 gap-32 date-picker d-none">
                        <h5>Select your desired day</h5>
                        <div class="row g-4">
                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="Saturday" name="day" type="checkbox" value="Saturday" />
                                    <label for="Saturday"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Saturday
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="Sunday" name="day" type="checkbox" value="Sunday" />
                                    <label for="Sunday"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Sunday
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="Monday" name="day" type="checkbox" value="Monday" />
                                    <label for="Monday"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Monday
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="Tuesday" name="day" type="checkbox" value="Tuesday" />
                                    <label for="Tuesday"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Tuesday
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="Wednesday" name="day" type="checkbox" value="Wednesday" />
                                    <label for="Wednesday"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Wednesday
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="Thursday" name="day" type="checkbox" value="Thursday" />
                                    <label for="Thursday"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Thursday
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="position-relative checkbox-box">
                                    <input id="Friday" name="day" type="checkbox" value="Friday" />
                                    <label for="Friday"
                                        class="mb-0 position-absolute top-50 start-50 translate-middle">
                                        Friday
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button id="submitForm" class="btn btn-primary bg-lg w-100">Submit</button>
                    </div>
                    <!--implement third form here end-->


                </div>
            </div>
        </div>
    </div>
    <!--modal end-->



        <script>
            // Listen for changes on checkboxes with name="course_id"
            $('input[name="course_id"]').on('change', function() {
                if ($(this).prop('checked')) {
                    // Uncheck all other checkboxes when one is checked
                    $('input[name="course_id"]').not(this).prop('checked', false);
                }
            });
        </script>
        <script>
            // Listen for changes on checkboxes with name="teacher_type"
            $('input[name="teacher_type"]').on('change', function() {
                if ($(this).prop('checked')) {
                    // Uncheck all other checkboxes when one is checked
                    $('input[name="teacher_type"]').not(this).prop('checked', false);
                }
            });
        </script>

        <script>
            // Listen for changes on checkboxes with name="day"
            $('input[name="day"]').on('change', function() {
                if ($(this).prop('checked')) {
                    // Uncheck all other checkboxes when one is checked
                    $('input[name="day"]').not(this).prop('checked', false);
                }
            });
        </script>



        <script>
            $(document).ready(function() {
                let userId = null; // To store the ID of the user.

                // Show the second form after saving the first form.
                $('#nextToStep2').click(function(e) {
                    e.preventDefault();
                    const name = $('#name').val();
                    const email = $('#email').val();
                    const phone = $('#phone').val();
                    const country = $('#country').val();

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
                            userId = response.user_id; // Store the user ID from the response
                            $('#formStep1').addClass('d-none');
                            $('#formStep2').removeClass('d-none');
                            //console.log(response);
                        },
                        error: function(error) {
                            alert('Something went wrong.');
                        },
                    });
                });

                // Show the third form after saving the second form.
                $('#nextToStep3').click(function(e) {
                    e.preventDefault();

                    // Get the selected course
                    const selectedCourse = $('input[name="course_id"]:checked').val();

                    // Get the selected teacher type
                    const selectedTeacherType = $('input[name="teacher_type"]:checked').val();

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
                            user_id: userId,
                            course_id: selectedCourse, // Pass the selected course
                            teacher_type: selectedTeacherType, // Pass the selected teacher type
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Assuming you want to handle the response or show some success message
                            //console.log(response); // Check response from server
                            $('#formStep2').addClass('d-none');
                            $('#form3').removeClass('d-none');

                        },
                        error: function() {
                            alert('Something went wrong.');
                        },
                    });
                });


                // Submit the final form and hide the modal.
                $('#submitForm').click(function(e) {
                    e.preventDefault();

                    const selectedDays = $('input[name="day"]:checked').val();

                    if (!selectedDays) {
                        alert('Please select a day.');
                        return;
                    }

                    $.ajax({
                        url: '/save-step3', // Laravel route
                        method: 'POST',
                        data: {
                            user_id: userId,
                            days: selectedDays,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            $('#exampleModal').modal('hide');
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
