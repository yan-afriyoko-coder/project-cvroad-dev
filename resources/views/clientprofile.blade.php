@extends('layouts.user_type.guest')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="profile-card col-md-4 ">
                <div class="p-4  text-center">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Profile Picture" class="img-fluid rounded-circle mb-3"
                        width="200">
                    <h4 class="mb-2">John Doe</h4>
                    <p class="text-muted mb-4">Software Developer</p>
                    <p class="text-muted">Jakarta, Indonesia</p>
                </div>
                <div class="mt-4 d-flex align-items-center border-top border-bottom border-success py-2">
                    <i class="fas fa-pencil-alt text-success mr-2"></i>
                    <h5 class="m-0">Summary</h5>
                </div>
                <p class="mt-3">Lörem ipsum doktiga povärunt. Kingen pons anarusade de astrojåbel. Anan tinade. Kvasifyra
                    dobel semimårade ultran så nide. Anasm nenöröna, sverka.Tredat uskap ifall triage, och ohägon oliga.</p>
                <div class="mt-4 d-flex align-items-center border-top border-bottom border-success py-2">
                    <i class="fas fa-user text-success mr-2"></i>
                    <h5 class="m-0">About</h5>
                </div>
                <ul class="list-unstyled mt-3">
                    <li>Dealer Group: Dummy Data</li>
                    <li>Current Job: Dummy Data</li>
                    <li>Experience: Dummy Data</li>
                    <li>Department: Dummy Data</li>
                    <li>Brand: Dummy Data</li>
                    <li>Salary: Dummy Data</li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="card profile-card mb-3">
                    <div class="mt-4 d-flex align-items-center border-top border-bottom border-success py-2">
                        <i class="fas fa-pencil-alt text-success mr-2"></i>
                        <h5 class="m-0">Work Experience</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h5 class="text-success">Sales Executive</h5>
                            <p>
                                BMW (Bayerische Motoren Werke)<br>
                                Dec 2023 - Present - 04 Months<br>
                                Full Time - Onsite
                            </p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <h5 class="text-success">HR Manager</h5>
                            <p>
                                Mitsubishi Motors Automobile manufacturer<br>
                                Jun 2023 - Dec 2023 - 07 Months<br>
                                Full Time - Onsite
                            </p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <h5 class="text-success">Sales Manager</h5>
                            <p>
                                Toyota Automotive manufacturer<br>
                                Mar 2022 - Jun 2023 - 01 Year 01 Month<br>
                                Full Time - Onsite
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card profile-card mb-3">
                    <div class="mt-4 d-flex align-items-center border-bottom border-success py-2">
                        <i class="fas fa-file-alt text-success mr-2"></i>
                        <h5 class="m-0"> Document</h5>
                    </div>
                    <div class="card-body">
                        <!-- Your file storage section here -->
                        <div class="row">
                            <!-- First row of files -->
                            <div class="col-md-4 mb-3">
                                <!-- Your file card here -->
                            </div>
                            <div class="col-md-4 mb-3">
                                <!-- Your file card here -->
                            </div>
                            <div class="col-md-4 mb-3">
                                <!-- Your file card here -->
                            </div>
                        </div>
                        <!-- Additional rows of files if needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
