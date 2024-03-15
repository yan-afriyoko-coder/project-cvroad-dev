@extends('layouts.user_type.user')
@section('content')
<div class="background">
    <div class="container">
        <div class="card">
            <div class="profile-picture">
                <img src="{{ asset('avatar/account.png') }}" alt="Profile Picture">
                <button class="edit-button">
                    <svg width="69" height="68" viewBox="0 0 69 68" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_1_71)">
                            <rect x="14.5" y="14" width="40" height="40" rx="20" fill="white"/>
                            <rect x="15" y="14.5" width="39" height="39" rx="19.5" stroke="#02CE65"/>
                            <path d="M26.3863 37.0629L31.1472 42.0691L24.5 44.0522L26.3863 37.0629ZM37.3471 25.5389L42.107 30.5441L31.622 41.5681L26.861 36.564L37.3471 25.5389ZM40.9649 23.3663L44.0975 26.66C44.9469 27.5526 44.188 28.3578 44.188 28.3578L42.587 30.042L37.825 25.0347L39.426 23.3516L39.447 23.3316C39.5723 23.2137 40.2628 22.6285 40.9649 23.3663Z" fill="#333333"/>
                        </g>
                        <defs>
                            <filter id="filter0_d_1_71" x="0.5" y="0" width="68" height="68" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                <feOffset/>
                                <feGaussianBlur stdDeviation="7"/>
                                <feComposite in2="hardAlpha" operator="out"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_71"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_71" result="shape"/>
                            </filter>
                        </defs>
                    </svg>
                </button>
            </div>
            <div class="content">
                <h2>Muhammad Ibrahim</h2>
                <ul>
                    <li>Phone: 9889079866</li>
                    <li>Race: White</li>
                    <li>Gender: Male</li>
                    <li>Language: English, Urdu, Zulu </li>
                    <li>Employment Status: Employed</li>
                </ul>
            </div>
                <div class="vertical-line"></div>
            <div class="data-list">
                <div class="data-item">Dealer Group: <span>Dummy Data</span></div>
                <div class="data-item">Current Job: <span>Dummy Data</span></div>
                <div class="data-item">Experience: <span>Dummy Data</span></div>
                <div class="data-item">Department: <span>Dummy Data</span></div>
                <div class="data-item">Brand: <span>Dummy Data</span></div>
                <div class="data-item">Salary: <span>Dummy Data</span></div>
            </div>
        </div>
        
        <div class="card">
            <h2>Card 2</h2>
            <p>Content for Card 2</p>
        </div>
        <div class="card">
            <h2>Card 3</h2>
            <p>Content for Card 3</p>
        </div>
    </div>
</div>
@endsection
