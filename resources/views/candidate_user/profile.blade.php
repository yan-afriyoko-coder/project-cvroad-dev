@extends('layouts.user_type.user')
@section('content2')
    <div class="background">
        <div class="container">
            <div class="cardd">
                <button class="edit-button">
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.9166 8.75L17.2482 10.0817L4.3849 22.9167H3.08156V21.6133L15.9166 8.75ZM21.0166 0.25C20.6624 0.25 20.2941 0.391667 20.0249 0.660833L17.4324 3.25333L22.7449 8.56583L25.3374 5.97333C25.8899 5.42083 25.8899 4.5 25.3374 3.97583L22.0224 0.660833C21.7391 0.3775 21.3849 0.25 21.0166 0.25ZM15.9166 4.76917L0.24823 20.4375V25.75H5.56073L21.2291 10.0817L15.9166 4.76917Z"
                            fill="#333333" />
                    </svg>
                </button>
                <div class="profile-picture">
                    <img src="{{ asset('avatar/account.png') }}" alt="Profile Picture">
                    <button class="edit-profile">
                        <svg width="69" height="68" viewBox="0 0 69 68" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d_1_71)">
                                <rect x="14.5" y="14" width="40" height="40" rx="20" fill="white" />
                                <rect x="15" y="14.5" width="39" height="39" rx="19.5" stroke="#02CE65" />
                                <path
                                    d="M26.3863 37.0629L31.1472 42.0691L24.5 44.0522L26.3863 37.0629ZM37.3471 25.5389L42.107 30.5441L31.622 41.5681L26.861 36.564L37.3471 25.5389ZM40.9649 23.3663L44.0975 26.66C44.9469 27.5526 44.188 28.3578 44.188 28.3578L42.587 30.042L37.825 25.0347L39.426 23.3516L39.447 23.3316C39.5723 23.2137 40.2628 22.6285 40.9649 23.3663Z"
                                    fill="#333333" />
                            </g>
                            <defs>
                                <filter id="filter0_d_1_71" x="0.5" y="0" width="68" height="68"
                                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                    <feOffset />
                                    <feGaussianBlur stdDeviation="7" />
                                    <feComposite in2="hardAlpha" operator="out" />
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" />
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_71" />
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_71"
                                        result="shape" />
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
                    <ul>
                        <li class="data-item">Dealer Group: <span>Dummy Data</span></li>
                        <li class="data-item">Current Job: <span>Dummy Data</span></li>
                        <li class="data-item">Experience: <span>Dummy Data</span></li>
                        <li class="data-item">Department: <span>Dummy Data</span></li>
                        <li class="data-item">Brand: <span>Dummy Data</span></li>
                        <li class="data-item">Salary: <span>Dummy Data</span></li>
                    </ul>
                </div>
            </div>

            <div class="cards">
                <div class="card-add">
                    <div>
                        <h2>Work Experience</h2>
                    </div>
                    <div>
                        <button>
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.4183 2.45801C16.4183 1.89442 16.1944 1.35392 15.7959 0.955406C15.3974 0.556891 14.8569 0.333008 14.2933 0.333008C13.7297 0.333008 13.1892 0.556891 12.7907 0.955406C12.3922 1.35392 12.1683 1.89442 12.1683 2.45801V11.6663H2.95996C2.39638 11.6663 1.85587 11.8902 1.45736 12.2887C1.05884 12.6873 0.834961 13.2278 0.834961 13.7913C0.834961 14.3549 1.05884 14.8954 1.45736 15.2939C1.85587 15.6925 2.39638 15.9163 2.95996 15.9163H12.1683V25.1247C12.1683 25.6883 12.3922 26.2288 12.7907 26.6273C13.1892 27.0258 13.7297 27.2497 14.2933 27.2497C14.8569 27.2497 15.3974 27.0258 15.7959 26.6273C16.1944 26.2288 16.4183 25.6883 16.4183 25.1247V15.9163H25.6266C26.1902 15.9163 26.7307 15.6925 27.1292 15.2939C27.5277 14.8954 27.7516 14.3549 27.7516 13.7913C27.7516 13.2278 27.5277 12.6873 27.1292 12.2887C26.7307 11.8902 26.1902 11.6663 25.6266 11.6663H16.4183V2.45801Z"
                                    fill="#333333" />
                            </svg>
                        </button>
                        <button>
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.9166 8.75L17.2482 10.0817L4.3849 22.9167H3.08156V21.6133L15.9166 8.75ZM21.0166 0.25C20.6624 0.25 20.2941 0.391667 20.0249 0.660833L17.4324 3.25333L22.7449 8.56583L25.3374 5.97333C25.8899 5.42083 25.8899 4.5 25.3374 3.97583L22.0224 0.660833C21.7391 0.3775 21.3849 0.25 21.0166 0.25ZM15.9166 4.76917L0.24823 20.4375V25.75H5.56073L21.2291 10.0817L15.9166 4.76917Z"
                                    fill="#333333" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <table class="table">
                        <thead>
                            <th>
                                Company
                            </th>
                            <th>
                                Job Title
                            </th>
                            <th>
                                Start Date
                            </th>
                            <th>
                                End Date
                            </th>
                            <th>
                                Manager Name
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ABC Company</td>
                                <td>Software Developer</td>
                                <td>2021-01-01</td>
                                <td>Present</td>
                                <td>John Doe</td>
                                <td>123-456-7890</td>
                                <td>
                                    <button class="delete">
                                        <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3 18C2.45 18 1.97933 17.8043 1.588 17.413C1.19667 17.0217 1.00067 16.5507 1 16V3H0V1H5V0H11V1H16V3H15V16C15 16.55 14.8043 17.021 14.413 17.413C14.0217 17.805 13.5507 18.0007 13 18H3ZM13 3H3V16H13V3ZM5 14H7V5H5V14ZM9 14H11V5H9V14Z"
                                                fill="#F62B54" />
                                        </svg>
                                        Delete
                                    </button>
                                    {{-- <section>
                                        <form action="{{ route('experience.delete', [$exp->id]) }}" method="POST">
                                            @csrf
                                        </form>
                                        <button type="button" class="btn btn-main btn-confirm-div-form btn-sm">
                                            <i class="fas fa-trash"></i> Delete</button>
                                    </section> --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="cards">
                <div class="card-add">
                    <div>
                        <h2>Documents</h2>
                    </div>
                    <div>
                        <button>
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.4183 2.45801C16.4183 1.89442 16.1944 1.35392 15.7959 0.955406C15.3974 0.556891 14.8569 0.333008 14.2933 0.333008C13.7297 0.333008 13.1892 0.556891 12.7907 0.955406C12.3922 1.35392 12.1683 1.89442 12.1683 2.45801V11.6663H2.95996C2.39638 11.6663 1.85587 11.8902 1.45736 12.2887C1.05884 12.6873 0.834961 13.2278 0.834961 13.7913C0.834961 14.3549 1.05884 14.8954 1.45736 15.2939C1.85587 15.6925 2.39638 15.9163 2.95996 15.9163H12.1683V25.1247C12.1683 25.6883 12.3922 26.2288 12.7907 26.6273C13.1892 27.0258 13.7297 27.2497 14.2933 27.2497C14.8569 27.2497 15.3974 27.0258 15.7959 26.6273C16.1944 26.2288 16.4183 25.6883 16.4183 25.1247V15.9163H25.6266C26.1902 15.9163 26.7307 15.6925 27.1292 15.2939C27.5277 14.8954 27.7516 14.3549 27.7516 13.7913C27.7516 13.2278 27.5277 12.6873 27.1292 12.2887C26.7307 11.8902 26.1902 11.6663 25.6266 11.6663H16.4183V2.45801Z"
                                    fill="#333333" />
                            </svg>
                        </button>
                        <button>
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.9166 8.75L17.2482 10.0817L4.3849 22.9167H3.08156V21.6133L15.9166 8.75ZM21.0166 0.25C20.6624 0.25 20.2941 0.391667 20.0249 0.660833L17.4324 3.25333L22.7449 8.56583L25.3374 5.97333C25.8899 5.42083 25.8899 4.5 25.3374 3.97583L22.0224 0.660833C21.7391 0.3775 21.3849 0.25 21.0166 0.25ZM15.9166 4.76917L0.24823 20.4375V25.75H5.56073L21.2291 10.0817L15.9166 4.76917Z"
                                    fill="#333333" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <table class="table">
                        <thead>
                            <th>
                                Document
                            </th>
                            <th>
                                Document Type
                            </th>
                            <th>
                                Uploaded Date
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cover Latter</td>
                                <td>Pdf</td>
                                <td>2021-01-01</td>
                                <td class="actin">
                                    <button class="delete">
                                        <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3 18C2.45 18 1.97933 17.8043 1.588 17.413C1.19667 17.0217 1.00067 16.5507 1 16V3H0V1H5V0H11V1H16V3H15V16C15 16.55 14.8043 17.021 14.413 17.413C14.0217 17.805 13.5507 18.0007 13 18H3ZM13 3H3V16H13V3ZM5 14H7V5H5V14ZM9 14H11V5H9V14Z"
                                                fill="#F62B54" />
                                        </svg>
                                    </button>
                                    <button class="delete">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M23.2047 11.745C22.3226 9.46324 20.7912 7.48996 18.7998 6.06906C16.8084 4.64817 14.4443 3.84193 11.9997 3.75C9.55507 3.84193 7.19097 4.64817 5.19958 6.06906C3.20819 7.48996 1.6768 9.46324 0.794681 11.745C0.735106 11.9098 0.735106 12.0902 0.794681 12.255C1.6768 14.5368 3.20819 16.51 5.19958 17.9309C7.19097 19.3518 9.55507 20.1581 11.9997 20.25C14.4443 20.1581 16.8084 19.3518 18.7998 17.9309C20.7912 16.51 22.3226 14.5368 23.2047 12.255C23.2643 12.0902 23.2643 11.9098 23.2047 11.745ZM11.9997 18.75C8.02468 18.75 3.82468 15.8025 2.30218 12C3.82468 8.1975 8.02468 5.25 11.9997 5.25C15.9747 5.25 20.1747 8.1975 21.6972 12C20.1747 15.8025 15.9747 18.75 11.9997 18.75Z"
                                                fill="#20B15A" />
                                            <path
                                                d="M12 7.5C11.11 7.5 10.24 7.76392 9.49994 8.25839C8.75991 8.75285 8.18314 9.45566 7.84254 10.2779C7.50195 11.1002 7.41283 12.005 7.58647 12.8779C7.7601 13.7508 8.18869 14.5526 8.81802 15.182C9.44736 15.8113 10.2492 16.2399 11.1221 16.4135C11.995 16.5872 12.8998 16.4981 13.7221 16.1575C14.5443 15.8169 15.2471 15.2401 15.7416 14.5001C16.2361 13.76 16.5 12.89 16.5 12C16.5 10.8065 16.0259 9.66193 15.182 8.81802C14.3381 7.97411 13.1935 7.5 12 7.5ZM12 15C11.4067 15 10.8266 14.8241 10.3333 14.4944C9.83994 14.1648 9.45543 13.6962 9.22836 13.148C9.0013 12.5999 8.94189 11.9967 9.05765 11.4147C9.1734 10.8328 9.45912 10.2982 9.87868 9.87868C10.2982 9.45912 10.8328 9.1734 11.4147 9.05764C11.9967 8.94189 12.5999 9.0013 13.1481 9.22836C13.6962 9.45542 14.1648 9.83994 14.4944 10.3333C14.8241 10.8266 15 11.4067 15 12C15 12.7956 14.6839 13.5587 14.1213 14.1213C13.5587 14.6839 12.7957 15 12 15Z"
                                                fill="#20B15A" />
                                        </svg>

                                    </button>
                                    {{-- <section>
                                        <form action="{{ route('experience.delete', [$exp->id]) }}" method="POST">
                                            @csrf
                                        </form>
                                        <button type="button" class="btn btn-main btn-confirm-div-form btn-sm">
                                            <i class="fas fa-trash"></i> Delete</button>
                                    </section> --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
