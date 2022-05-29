<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body >
    <section class="h-full gradient-form bg-login-purple md:h-screen">
        <div class="container py-12 px-6 m-auto h-full">
          <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <div class="xl:w-10/12">
              <div class="block bg-bookmark-blue shadow-lg rounded-lg">
                <div class="lg:flex lg:flex-wrap g-0">
                  <div class="lg:w-6/12 px-4 md:px-0">
                    <div class="md:p-12 md:mx-6">
                      <div class="text-center">
                        <h1 class="text-bookmark-pink text-2xl">Welcome to your dashboard!</h1>
                        <hr>
                        <table class="text-bookmark-pink">
                            <thead class="w-16">
                                <th class="px-6">Name</th>
                                <th class="px-6">Email</th>
                                <th class="px-6">Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $data->username }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td><a href="logout">Logout</a></td>
                                </tr>
                            </tbody>
                            
                        </table>
                      </div>
                      
                    </div>
                  </div>
                  <div
                    class="lg:w-6/12 flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none"
                    style="
                      background: linear-gradient(to right, #964ae3, #fe06ef);
                    "
                  >
                    <div class="text-white px-4 py-6 md:p-12 md:mx-6">
                      <h4 class="text-xl font-semibold mb-6">Prednosti korišćenja naloga</h4>
                      <p class="text-sm">
                        - Lakše vršenje rezervacija <br>
                        - Mogućnost ostavljanja komentara <br>
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