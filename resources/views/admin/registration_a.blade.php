<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN Registracija</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body >
    <section class="h-full gradient-form bg-red-900 md:h-screen">
        <div class="container py-12 px-6 m-auto h-full">
          <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <div class="xl:w-10/12">
              <div class="block bg-zinc-800 shadow-lg rounded-lg">
                <div class="lg:flex lg:flex-wrap g-0">
                  <div class="lg:w-6/12 px-4 md:px-0">
                    <div class="md:p-12 md:mx-6">
                      <div class="text-center">
                        <img
                          class="object-scale-down h-32 mt-3 cursor-pointer pb-2 pl-3"
                          src="{{ asset('storage/images/EventsNisLogo1.png') }}"
                          alt="logo"
                        />
                        
                      </div>

                      {{-- Forma --}}
                      <form action="{{ route('register-admin') }}" method="POST">
                        @if (Session::has('success'))
                            <div class="alert alert-success text-bookmark-pink">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger text-bookmark-pink">{{ Session::get('fail') }}</div>
                        @endif
                        @csrf
                        <p class="mb-4 text-red-500">Register an account</p>
                        <div class="mb-4">
                          <input
                            type="text"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput1"
                            name="username"
                            placeholder="Username"
                            value="{{ old('username') }}"
                          />
                          <span class="text-danger text-bookmark-pink">@error('username') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-4">
                            <input
                              type="text"
                              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                              id="exampleFormControlInput1"
                              name="email"
                              placeholder="Email"
                              value="{{ old('email') }}"
                            />
                            <span class="text-danger text-bookmark-pink">@error('email') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-4">
                            <input
                              type="text"
                              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                              id="exampleFormControlInput1"
                              name="phone"
                              placeholder="Phone Number | Example: +381691234567"
                              value="{{ old('phone') }}"
                            />
                            <span class="text-danger text-bookmark-pink">@error('phone') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-4">
                          <input
                            type="password"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput1"
                            name="password"
                            placeholder="Password"
                            value="{{ old('password') }}"
                          />
                          <span class="text-danger text-bookmark-pink">@error('password') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-4">
                            <input
                              type="password"
                              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                              id="exampleFormControlInput1"
                              name="password_confirmation"
                              placeholder="Repeat password"
                              value="{{ old('password_confirmation') }}"
                            />
                            <span class="text-danger text-bookmark-pink">@error('password_confirmation') {{ $message }} @enderror</span>
                          </div>
                        <div class="text-center pt-1 mb-12 pb-1">
                          <button
                            class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                            type="submit"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="light"
                            style="
                              background: linear-gradient(
                                to right,
                                #b91c1c, #ef4444
                              );
                            "
                          >
                            Register
                          </button>
                          {{-- <a class="text-bookmark-pink" href="#!">Forgot password?</a> --}}
                        </div>
                        <div class="flex items-center justify-start pb-6">
                          
                          <a href="adminlogin"><button
                            type="button"
                            class="inline-block px-6 py-2 border-2 border-red-500 text-red-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="light"
                          >
                          Already have an account?
                          </button></a>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div
                    class="lg:w-6/12 flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none"
                    style="
                      background: linear-gradient(to right, #b91c1c, #ef4444);
                    "
                  >
                    <div class="text-white px-4 py-6 md:p-12 md:mx-6">
                      <h4 class="text-xl font-semibold mb-6">Kreirajte admin nalog</h4>
                      <p class="text-sm">
                        Kreirajte admin nalog kako bi mogli da vrsite kontrolu nad sajtom  <br>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>