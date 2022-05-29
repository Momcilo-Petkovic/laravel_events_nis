<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body class="bg-red-900">
    {{-- ADMIN HEADER --}}
    <nav class="flex items-center justify-between flex-wrap bg-teal p-6">
        <div class="flex items-center flex-no-shrink text-white mr-6">
          <svg class="h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg>
          <span class="font-semibold text-xl tracking-tight">Admin Dashboard</span>
        </div>

          <div>
            <a href="admin-logout" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-black hover:bg-white mt-4 lg:mt-0">Log out</a>
          </div>
        </div>
    </nav>

    {{-- Content --}}
    <h1 class="text-6xl text-center justify-center">Unos podataka</h1>  


    {{-- INSERT PLACE --}}
    <div class="flex justify-center pt-16 ">
      <section class="border-4 p-20 border-gray-700">
        <h2 class="text-2xl text-center">Kreacija mesta</h2>
        <br>
        <form action="{{ route('insert-place') }}" method="POST" class="grid grid-cols-3 gap-4">
                        @if (Session::has('success'))
                            <div class="alert alert-success text-black">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger text-black">{{ Session::get('fail') }}</div>
                        @endif
                        @csrf
          <span class="text-danger text-bookmark-pink">@error('name') {{ $message }} @enderror</span>
          <span class="text-danger text-bookmark-pink">@error('adress') {{ $message }} @enderror</span>
          <span class="text-danger text-bookmark-pink">@error('work_time') {{ $message }} @enderror</span>
          <span class="text-danger text-bookmark-pink">@error('max_number_people') {{ $message }} @enderror</span>
          <span class="text-danger text-bookmark-pink">@error('allowed_age') {{ $message }} @enderror</span>
          <span class="text-danger text-bookmark-pink">@error('phone_number') {{ $message }} @enderror</span>
          <span class="text-danger text-bookmark-pink">@error('image_url') {{ $message }} @enderror</span>
          <span class="text-danger text-bookmark-pink">@error('about') {{ $message }} @enderror</span>
          <span class="text-danger text-bookmark-pink">@error('prices') {{ $message }} @enderror</span>
          <input
            type="text"
            class="w-96 mb-2"
            id="name"
            name="name"
            placeholder="Name"
            value="{{ old('name') }}"
          />
          
          <input
            type="text"
            class="w-96 mb-2"
            id="adress"
            name="adress"
            placeholder="Adress"
            value="{{ old('adress') }}"
          />
          
          <input
            type="text"
            class="w-96 mb-2"
            id="work_time"
            name="work_time"
            placeholder="Work time | Example: 08h-24h"
            value="{{ old('work_time') }}"
          />
          
          <input
            type="text"
            class="w-96 mb-2"
            id="max_number_people"
            name="max_number_people"
            placeholder="Maximum number of people"
            value="{{ old('max_number_people') }}"
          />
          
          <input
            type="text"
            class="w-96 mb-2"
            id="allowed_age"
            name="allowed_age"
            placeholder="Allowed age | Example: 18+"
            value="{{ old('allowed_age') }}"
          />
          
          <input
            type="text"
            class="w-96 mb-2"
            id="phone_number"
            name="phone_number"
            placeholder="Phone Number | Example: +381691234567"
            value="{{ old('phone_number') }}"
          />
          
          <input
            type="text"
            class="w-96 mb-2"
            id="image_url"
            name="image_url"
            placeholder="Image URL"
            value="{{ old('image_url') }}"
          />
          
          <input
            type="text-area"
            class="w-96 h-32 mb-2 text-center"
            id="about"
            name="about"
            placeholder="About"
            value="{{ old('about') }}"
          />
          
          <input
            type="text-area"
            class="w-96 h-32 mb-2 text-center "
            id="prices"
            name="prices"
            placeholder="Prices"
            value="{{ old('prices') }}"
          />

          <select name="type_id" id="type_id">
            @foreach ($datat as $row)
              <option value="{{ $row->id }}">{{ $row->type_name }}</option>
            @endforeach
          </select>
          
          

          <button type="submit" class="bg-gray-500 rounded text-white p-2 mt-2 hover:bg-gray-700">Create</button>
        </form>
      </section>

    </div>

    {{-- INSERT PERFORMANCE --}}
    <div class="flex justify-center pt-16 ">
      <section class="border-4 p-20 border-gray-700">
        <h2 class="text-2xl text-center">Kreacija nastupa</h2>
        <br>
        <form action="{{ route('insert-performance') }}" method="POST" class="grid grid-cols-3 gap-4">

          @if (Session::has('success'))
                            <div class="alert alert-success text-black">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger text-black">{{ Session::get('fail') }}</div>
                        @endif
                        @csrf
          <span class="text-danger text-bookmark-pink">@error('name') {{ $message }} @enderror</span>
          <span class="text-danger text-bookmark-pink">@error('date') {{ $message }} @enderror</span>
          <span class="text-danger text-bookmark-pink">@error('starts_at') {{ $message }} @enderror</span>
          <span class="text-danger text-bookmark-pink">@error('ends_at') {{ $message }} @enderror</span>
          <span class="text-danger text-bookmark-pink">@error('place_id') {{ $message }} @enderror</span>
          <span class="text-danger text-bookmark-pink">@error('genre_id') {{ $message }} @enderror</span>

          <input
            type="text"
            class="w-96 mb-2"
            id="name"
            name="name"
            placeholder="Name"
            value="{{ old('name') }}"
          />
  
          <input
            type="date"
            class="w-96 mb-2"
            id="date"
            name="date"
            placeholder="{{ strtotime("today") }}"
            value="{{ old('date') }}"
          />
          <input
            type="text"
            class="w-96 mb-2"
            id="starts_at"
            name="starts_at"
            placeholder="Starts at | Examples: 8h , 16h, 23h, 0h"
            value="{{ old('starts_at') }}"
          />
          <input
            type="text"
            class="w-96 mb-2"
            id="ends_at"
            name="ends_at"
            placeholder="Ends at | Examples: 8h , 16h, 23h, 0h"
            value="{{ old('ends_at') }}"
          />
          {{-- <input
            type="text"
            class="w-96 mb-2"
            id="place_id"
            name="place_id"
            placeholder="Place ID"
            value="{{ old('place_id') }}"
          /> --}}
          
          <select name="place_id" id="place_id">
            @foreach ($datap as $row)
              <option value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
          </select>

          <select name="genre_id" id="genre_id">
            @foreach ($data as $row)
              <option value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
          </select>
          
          

          <button type="submit" class="bg-gray-500 rounded text-white p-2 mt-2 hover:bg-gray-700">Create</button>
        </form>
      </section>

    </div>


    {{-- INSERT GENRE --}}
    <div class="flex justify-center pt-16 ">
      <section class="border-4 p-20 border-gray-700">
        <h2 class="text-2xl text-center">Kreacija zanra</h2>
        <br>
        <form action="{{ route('insert-genre') }}" method="POST" class="grid grid-cols-3 gap-4">

          @if (Session::has('success'))
                            <div class="alert alert-success text-black">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger text-black">{{ Session::get('fail') }}</div>
                        @endif
                        @csrf
          <span class="text-danger text-bookmark-pink">@error('name') {{ $message }} @enderror</span>

          <input
            type="text"
            class="w-96 mb-2"
            id="name"
            name="name"
            placeholder="Genre name"
            value="{{ old('name') }}"
          />

          </select>
          
          

          <button type="submit" class="bg-gray-500 rounded text-white p-2 mt-2 hover:bg-gray-700">Create</button>
        </form>
      </section>

    </div>

    {{-- INSERT TYPE --}}
    <div class="flex justify-center pt-16 ">
      <section class="border-4 p-20 border-gray-700">
        <h2 class="text-2xl text-center">Kreacija tipa</h2>
        <br>
        <form action="{{ route('insert-type') }}" method="POST" class="grid grid-cols-3 gap-4">

          @if (Session::has('success'))
                            <div class="alert alert-success text-black">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger text-black">{{ Session::get('fail') }}</div>
                        @endif
                        @csrf
          <span class="text-danger text-bookmark-pink">@error('name') {{ $message }} @enderror</span>

          <input
            type="text"
            class="w-96 mb-2"
            id="type_name"
            name="type_name"
            placeholder="Type name"
            value="{{ old('type_name') }}"
          />

          </select>
          
          

          <button type="submit" class="bg-gray-500 rounded text-white p-2 mt-2 hover:bg-gray-700">Create</button>
        </form>
      </section>

    </div>
</body>
</html>