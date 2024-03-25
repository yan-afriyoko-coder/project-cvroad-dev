@extends('layouts.user_type.auth')
@section('content')

    <main>
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="underscore mb-5">Search <span class="green">Candidates</span></h2>
                        <div class="line"></div>
                    </div>
                </div>
                <!-- Newsletter -->
                <div class="update-news mb-5">
                    <form action="{{ route('candidate.all') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-md-2 job-filter">

                                <select name="category_id" class="form-control mt-2">
                                    <option value="" selected disabled>Choose Department</option>
                                    @foreach ($cats as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 job-filter">
                                <select name="province" class="form-control mt-2">
                                    <option value="" selected disabled>Choose Province</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->name }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 job-filter">
                                <select name="brand_id" class="form-control mt-2">
                                    <option value="" selected disabled>Choose Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 job-filter">
                                <select name="dealer_experience" class="form-control mt-2">
                                    <option value="" selected disabled>Choose Experience</option>
                                    <option value="0">None</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="col-md-2 ">
                                <input type="text" name="address" placeholder="Location" class="form-control mt-2">
                            </div>
                            <div class="col-md-2 job-filter">
                                <button type="submit" class="btn btn-main form-control mt-2"> <i class="fas fa-search"></i>
                                    Search </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!--candidates-->
                <!--Jobs-->
                <div class="row job-offers">
                    <div class="team text-center mt-5">
                        <div class="team-person py-3">
                            <div class="row">
                                @if (count($candidates) > 0)
                                    @foreach ($candidates as $candidate)
                                        @php
                                          $employerGroup = auth()->user()->dealership->group_id;
                                          $candidateGroup = $candidate->group_id; 
                                        @endphp
                                        @if ($candidateGroup != $employerGroup)
                                            <div class="col-md-2 col-xs-6 mt-2">
                                                <div class="person"
                                                    style="background-color: #d9fcea; padding:10px; border-radius:15%">
                                                    <div class="photo">
                                                        @if ($candidate->avatar)
                                                            <img src="{{ asset('uploads/avatar/' . $candidate->avatar) }}"
                                                                style="max-width: 40%">
                                                        @else
                                                            <img src="{{ asset('uploads/avatar/account.png') }}"
                                                                alt="" style="max-width: 40%">
                                                        @endif
                                                    </div>
                                                    <span class="name">{{ $candidate->name }}
                                                        {{ $candidate->surname }}</span>
                                                    <span> <strong>{{ $candidate->title }}</strong></span>
                                                    <small><strong>Group:</strong>{{ $candidate->group->name ?? '' }}
                                                    </small>
                                                    <small><strong>Deprtment:</strong>{{ $candidate->department->name ?? '' }}
                                                    </small><br>
                                                    <small> <i class="fas fa-phone"></i> : {{ $candidate->phone_number }}
                                                    </small><br>
                                                    <a href="{{ route('dealer_job_candidate', [$candidate->user_id]) }}"
                                                        class="btn btn-sm btn-main">profile</a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="text-center">
                                        <h4 class="underscore mb-5">No Candidates <span class="green">Found...</span></h4>
                                    </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <nav aria-label="blog navigation">
                                        <ul class="pagination">
                                            <li class="page-item ">
                                                <a class="page-link" href="{{ $candidates->previousPageUrl() }}"
                                                    aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <!--loop through candidates available pages -->
                                            @for ($i = 1; $i <= $candidates->lastPage(); $i++)
                                                <li
                                                    class="page-item{{ $candidates->currentPage() == $i ? ' active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $candidates->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $candidates->nextPageUrl() }}"
                                                    aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
