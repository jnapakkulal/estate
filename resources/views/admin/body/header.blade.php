{{-- <style>
    #weather {
        color: #f8f0f0;
        font-weight: 500;
        font-size: 0.8rem;
        display: none;
        background: #022344;
    }

    #weather p {
        margin: 0;
        padding: 5px 0;
        line-height: 1.5;
    }

    #weatherInput {
        margin-bottom: 10px;
    }
</style> --}}

<style>
    .weather-info {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        white-space: nowrap;
        color: #888
    }

    .weather-icon {
        font-size: 24px;
        white-space: nowrap;
    }
</style>

{{-- <style>
    .weather-info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
        white-space: nowrap;
        color: #bbaeae;
    }

    .weather-info p,
    .weather-info h5 {
        margin: 0;
    }

    .weather-icon {
        font-size: 24px;
        cursor: pointer;
        color: #ab8919;
        margin-top: 10px;
    }

    /* Hide the weather info by default */
    .weather-info-content {
        display: none;
    }
</style> --}}




<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <form class="search-form">
            <div class="input-group">
                <div class="input-group-text">
                    <i data-feather="search"></i>
                </div>
                <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
            </div>
        </form>
        <ul class="navbar-nav">

            {{-- <li class="nav-item">
                <div id="weather">Loading..</div>
            </li> --}}


            @php
                $weather = getWeather();
            @endphp

            <div class="weather-info">
                <div class="d-flex align-items-center">
                    <i class="weather-icon"></i>
                    <div>
                        <p class="mb-0">{{ $weather['description'] }},{{ $weather['temperature'] }}°C</p>
                    </div>
                </div>
            </div>



            {{-- <div class="weather-info">
                <div class="d-flex align-items-center">
                    <i class="weather-icon"></i>
                    <div>
                        <p class="mb-0">{{ $weather['cityName'] }}</p>
                        <p class="mb-0">{{ $weather['description'] }}</p>
                        <p class="mb-0">{{ $weather['sunrise'] }}</p>
                        <p class="mb-0">{{ $weather['sunset'] }}</p>
                        <p class="mb-0">{{ $weather['rain'] }}</p>
                        <h5>{{ $weather['temperature'] }}°C</h5>
                    </div>
                </div>
            </div> --}}


            {{-- 
            <div class="weather-info">
                <!-- Weather Icon with Click Event -->
                <div class="weather-icon" id="weatherIcon">
                    <i class="feather-icon " data-feather="sun"></i> <!-- Example icon -->
                </div>

                <!-- Weather Info (hidden by default) -->
                <div id="weatherInfoContent" class="weather-info-content">
                    <p><strong>City:</strong> {{ $weather['cityName'] }}</p>
                    <p><strong>Description:</strong> {{ $weather['description'] }}</p>
                    <p><strong>Sunrise:</strong> {{ $weather['sunrise'] }}</p>
                    <p><strong>Sunset:</strong> {{ $weather['sunset'] }}</p>
                    <p><strong>Expected Rain:</strong> {{ $weather['rain'] }}</p>
                    <h5><strong>Temperature:</strong> {{ $weather['temperature'] }}°C</h5>
                </div>
            </div> --}}



            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="grid"></i>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p class="mb-0 fw-bold">Web Apps</p>
                        <a href="javascript:;" class="text-muted">Edit</a>
                    </div>
                    <div class="row g-0 p-1">
                        <div class="col-3 text-center">
                            <a href="pages/apps/chat.html"
                                class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i
                                    data-feather="message-square" class="icon-lg mb-1"></i>
                                <p class="tx-12">Chat</p>
                            </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="pages/apps/calendar.html"
                                class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i
                                    data-feather="calendar" class="icon-lg mb-1"></i>
                                <p class="tx-12">Calendar</p>
                            </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="pages/email/inbox.html"
                                class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i
                                    data-feather="mail" class="icon-lg mb-1"></i>
                                <p class="tx-12">Email</p>
                            </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="pages/general/profile.html"
                                class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i
                                    data-feather="instagram" class="icon-lg mb-1"></i>
                                <p class="tx-12">Profile</p>
                            </a>
                        </div>
                    </div>
                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                        <a href="javascript:;">View all</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="mail"></i>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="messageDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p>9 New Messages</p>
                        <a href="javascript:;" class="text-muted">Clear all</a>
                    </div>
                    <div class="p-1">
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div class="me-3">
                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30"
                                    alt="userr">
                            </div>
                            <div class="d-flex justify-content-between flex-grow-1">
                                <div class="me-4">
                                    <p>Leonardo Payne</p>
                                    <p class="tx-12 text-muted">Project status</p>
                                </div>
                                <p class="tx-12 text-muted">2 min ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div class="me-3">
                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30"
                                    alt="userr">
                            </div>
                            <div class="d-flex justify-content-between flex-grow-1">
                                <div class="me-4">
                                    <p>Carl Henson</p>
                                    <p class="tx-12 text-muted">Client meeting</p>
                                </div>
                                <p class="tx-12 text-muted">30 min ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div class="me-3">
                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30"
                                    alt="userr">
                            </div>
                            <div class="d-flex justify-content-between flex-grow-1">
                                <div class="me-4">
                                    <p>Jensen Combs</p>
                                    <p class="tx-12 text-muted">Project updates</p>
                                </div>
                                <p class="tx-12 text-muted">1 hrs ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div class="me-3">
                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30"
                                    alt="userr">
                            </div>
                            <div class="d-flex justify-content-between flex-grow-1">
                                <div class="me-4">
                                    <p>Amiah Burton</p>
                                    <p class="tx-12 text-muted">Project deatline</p>
                                </div>
                                <p class="tx-12 text-muted">2 hrs ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div class="me-3">
                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30"
                                    alt="userr">
                            </div>
                            <div class="d-flex justify-content-between flex-grow-1">
                                <div class="me-4">
                                    <p>Yaretzi Mayo</p>
                                    <p class="tx-12 text-muted">New record</p>
                                </div>
                                <p class="tx-12 text-muted">5 hrs ago</p>
                            </div>
                        </a>
                    </div>
                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                        <a href="javascript:;">View all</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="bell"></i>
                    <div class="indicator">
                        <div class="circle"></div>
                    </div>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p>6 New Notifications</p>
                        <a href="javascript:;" class="text-muted">Clear all</a>
                    </div>
                    <div class="p-1">
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div
                                class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <i class="icon-sm text-white" data-feather="gift"></i>
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>New Order Recieved</p>
                                <p class="tx-12 text-muted">30 min ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div
                                class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <i class="icon-sm text-white" data-feather="alert-circle"></i>
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>Server Limit Reached!</p>
                                <p class="tx-12 text-muted">1 hrs ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div
                                class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30"
                                    alt="userr">
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>New customer registered</p>
                                <p class="tx-12 text-muted">2 sec ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div
                                class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <i class="icon-sm text-white" data-feather="layers"></i>
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>Apps are ready for update</p>
                                <p class="tx-12 text-muted">5 hrs ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div
                                class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <i class="icon-sm text-white" data-feather="download"></i>
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>Download completed</p>
                                <p class="tx-12 text-muted">6 hrs ago</p>
                            </div>
                        </a>
                    </div>
                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                        <a href="javascript:;">View all</a>
                    </div>
                </div>
            </li>
            @php
                $id = Auth::user()->id;
                $profileData = App\Models\User::find($id);
                // $weather = App\Models\User::find('city');
            @endphp

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle"
                        src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                        alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle"
                                src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                alt="">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{ $profileData->name }}</p>
                            <p class="tx-12 text-muted">{{ $profileData->email }}</p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                            <a href="{{ route('admin.profile') }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="{{ route('admin.change.password') }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="edit"></i>
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="javascript:;" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="repeat"></i>
                                <span>Switch User</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="{{ route('admin.logout') }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
{{-- <script>
    // Define the city and your API key
    const apiKey = '3c53eef123e7c5f775e8cc644ab7c6d0';

    // Fetch weather data
    function fetchWeather(city) {
        fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}`)
            .then(response => response.json())
            .then(data => {
                if (data.cod === 200) {
                    const temperature = data.main.temp - 273.15; // Convert from Kelvin to Celsius
                    const weatherDescription = data.weather[0].description;
                    const rain = data.rain ? `${data.rain["1h"] || "0"} mm` : "No rain expected";
                    const sunriseTimestamp = data.sys.sunrise;
                    const sunsetTimestamp = data.sys.sunset;
                    const sunrise = new Date(sunriseTimestamp * 1000).toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    const sunset = new Date(sunsetTimestamp * 1000).toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });

                    document.getElementById('weather').innerHTML = `
                    <p><strong>City:</strong> ${city}</p>
                    <p><strong>Temperature:</strong> ${temperature.toFixed(1)} °C</p>
                    <p><strong>Condition:</strong> ${weatherDescription}</p>
                    <p><strong>Rain:</strong> ${rain}</p>
                    <p><strong>Sunrise:</strong> ${sunrise}</p>
                    <p><strong>Sunset:</strong> ${sunset}</p>
                `;
                } else {
                    document.getElementById('weather').innerHTML = `<p class="text-danger">${data.message}</p>`;
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                document.getElementById('weather').innerHTML =
                    `<p class="text-danger">Error loading weather data.</p>`;
            });
    }

    // Add event listener to the button
    document.getElementById('fetchWeatherBtn').addEventListener('click', () => {
        const city = document.getElementById('weatherInput').value.trim();
        if (city) {
            document.getElementById('weather').style.display = 'block';
            document.getElementById('weather').innerHTML = '<p>Loading...</p>';
            fetchWeather(city);
        } else {
            document.getElementById('weather').style.display = 'block';
            document.getElementById('weather').innerHTML =
                '<p class="text-warning">Please enter a city name.</p>';
        }
    });

    // Ensure dropdown toggles properly
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
        menu.addEventListener('click', (e) => e.stopPropagation());
    });
</script> --}}



{{-- 
<script>
    document.getElementById('weatherIcon').addEventListener('click', function() {
        var weatherInfoContent = document.getElementById('weatherInfoContent');
        if (weatherInfoContent.style.display === "none" || weatherInfoContent.style.display === "") {
            weatherInfoContent.style.display = "block"; // Show the weather info
        } else {
            weatherInfoContent.style.display = "none"; // Hide the weather info
        }
    });
</script> --}}
