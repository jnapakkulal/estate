@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('add.amenities') }}" class="btn btn-inverse-info">Add Amenities</a>

            </ol>
            {{-- <div id="weather">Loading..</div> --}}
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Amenities All</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SI No</th>
                                        <th>Amenities Name</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($amenities as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->amenities_name }}</td>

                                            <td>
                                                <a href="{{ route('edit.amenities', $item->id) }}"
                                                    class="btn btn-inverse-warning">Edit</a>
                                                <a href="{{ route('delete.amenities', $item->id) }}" id="delete"
                                                    class="btn btn-inverse-danger">Delete</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- @push('weather-scripts')
        <script>
            // Define the city and your API key
            const city = 'London';
            const apiKey = '3c53eef123e7c5f775e8cc644ab7c6d0';

            // Fetch weather data
            fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}`)
                .then(response => response.json())
                .then(data => {
                    // Handle and display the data
                    console.log(data); // Check the data structure

                    // Example: Display temperature and weather
                    const temperature = data.main.temp - 273.15; // Convert from Kelvin to Celsius
                    const weatherDescription = data.weather[0].description;
                    document.getElementById('weather').innerHTML =
                        `Temperature: ${temperature.toFixed(1)} °C, ${weatherDescription}`;
                })
                .catch(error => console.error('Error fetching data:', error));
        </script>
    @endpush --}}
@endsection
