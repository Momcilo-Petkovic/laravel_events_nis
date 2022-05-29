<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/ff576f6e96.js" crossorigin="anonymous"></script>
    <title>Events Nis</title>
</head>

<?php 
    
    function dan($d){
        if(strval(date("D", $d)) == "Mon"){
            return "Ponedeljak";
        }
        elseif (strval(date("D", $d)) == "Tue"){
            return "Utorak";
        }
        elseif(strval(date("D", $d)) == "Wed"){
            return "Sreda";
        }
        elseif(strval(date("D", $d)) == "Thu"){
            return "Cetvrtak";
        }
        elseif(strval(date("D", $d)) == "Fri"){
            return "Petak";
        }
        elseif(strval(date("D", $d)) == "Sat"){
            $x = "Subota";
            echo "$x";
        }
        elseif(strval(date("D", $d)) == "Sun"){
            $x = "Nedelja";
            echo "$x";
        }
    }
?>

<body class="font-Poppins bg-bookmark-purple-dark">
    <!-- Header -->
    <header class = "bg-bookmark-blue pt-0">
        @if (Route::has('login-user'))
        <nav class="container flex items-start py-4 mt-4 sm:mt-12">

            <div class="py-1"><img
                class="object-scale-down h-32 mt-3 cursor-pointer pb-2 pl-3"
                src="{{ asset('storage/images/EventsNisLogo1.png') }}"
                alt="logo"
              /></div>
            <ul class="hidden sm:flex flex-1 justify-end items-center gap-12 text-logo-inner uppercase text-2xl pt-14">
                <li class="cursor-pointer">Najaktuelnije</li>
                @if(Auth::check())
                     <a href="{{ route('dashboard') }}"> <li class="cursor-pointer">Dashboard</li></a>
                @endif
            
                @guest
                    <a href="{{ route('login') }}"><li class="cursor-pointer">Login</li></a>
                    <a href="{{ route('registration') }}"><li class="cursor-pointer">Register</li></a>
                @endguest
            </ul>
            <div class="flex sm:hidden flex-1 justify-end">
                <i class="text-2xl fa-solid fa-bars pt-14"></i>
            </div>
        </nav>
        @endif

        {{ $userorguest }}
    </header>


    <!-- Hero -->
    <section class="relative">
        <div class="container flex flex-col-reverse lg:flex-row items-start gap-12 mt-14 lg:mt-10">
            <!-- Content -->
            <div class="flex flex-initial flex-col items-center lg:items-start w-100">
                <h2 class="text-bookmark-blue text-3xl md:text-4 lg:text-5xl text-center lg:text-left mb-6">
                    Kada idemo?
                </h2>
                <p class="text-bookmark-purple text-lg text-center lg:text-left mb-6">
                    Odaberite dan koji vam odgovara, a mi ćemo vam pružiti ponudu dešavanja u gradu
                </p>
                
                <!-- Datum -->

                <div class="flex justify-center flex-wrap gap-10">
                    <?php $d = strtotime("today")?>
                    <button type="button" class="btn btn-purple"><?php $x = dan($d); echo $x?> <br> <?php echo date("Y/m/d"); ?></button>
                    <?php $d = strtotime("tomorrow")?>
                    <button type="button" class="btn btn-purple"><?php $x = dan($d); echo $x?> <br> <?php echo date("Y/m/d", $d); ?></button>
                    <?php $d = strtotime("+2 Days")?>
                    <button type="button" class="btn btn-purple"><?php $x = dan($d); echo $x?> <br> <?php echo date("Y/m/d", $d); ?></button>
                    <?php $d = strtotime("+3 Days")?>
                    <button type="button" class="btn btn-purple"><?php $x = dan($d); echo $x?> <br> <?php echo date("Y/m/d", $d); ?></button>
                    <?php $d = strtotime("+4 Days")?>
                    <button type="button" class="btn btn-purple"><?php $x = dan($d); echo $x?> <br> <?php echo date("Y/m/d", $d); ?></button>
                    <?php $d = strtotime("+5 Days")?>
                    <button type="button" class="btn btn-purple"><?php $x = dan($d); echo $x?> <br> <?php echo date("Y/m/d", $d); ?></button>
                    <?php $d = strtotime("+6 Days")?>
                    <button type="button" class="btn btn-purple"><?php $x = dan($d); echo $x?> <br> <?php echo date("Y/m/d", $d); ?></button>
                    <!-- <button type="button" class="btn btn-white">Get it on Firefox</button> -->
                </div>


                {{-- Tipovi Lokacija --}}
                <div class="flex pt-8 w-full text-black">
                    <form action="{{ URL::current() }}" method="GET" class="flex justify-evenly flex-wrap gap-6 text-lg"> {{--  iskljuci padding za fon --}}

                        <div class="">
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                            <label for="vehicle1"> Klubovi</label><br>
                        </div>
                        <div class="">
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                            <label for="vehicle1"> Barovi</label><br>
                        </div>
                        <div class="">
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                            <label for="vehicle1"> Pubovi</label><br>
                        </div>
                        <div class="">
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                            <label for="vehicle1"> Kafane</label><br>
                        </div>
                        <div class="">
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                            <label for="vehicle1"> Restorani</label><br>
                        </div>
                        <div class="">
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                            <label for="vehicle1"> Svirke</label><br>
                        </div>
                        <div class="">
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                            <label for="vehicle1"> Kafici</label><br>
                        </div>

                  </form>
                </div>
                <!-- Mesta -->

                <div class="grid grid-cols-4 mt-5" >
                    @for ($i=0; $i<10; $i++)
                        <div class="m-6 ml-0 bg-bookmark-blue rounded shadow text-center text-white overflow-hidden">
                            <img src="{{ URL::to('/images/Klubovi/BOX.jpg') }}" alt="" class="object-scale-down h-48 w-96 mt-3 cursor-pointer"/>
                            <div class="p-4">
                                <div>Klub BOX</div>
                                <div>Mlvden od 22:00</div>
                            </div>
                            <div class="pb-4"> <button type="button" class="btn btn-purple">Rezerviši</button></div>
                        </div>
                    @endfor
                </div>
                
            </div>



            {{-- <!-- Top Mesec -->
            <div class="flex flex-1/2 flex-col items-center justify-end mt-32 lg:items-start">
                <h2 class="text-bookmark-blue text-3xl md:text-4 lg:text-5xl text-center lg:text-left mb-6 ">
                    Top 5 <br> Maj 2022
                </h2>
                <p class="text-bookmark-grey text-lg text-center lg:text-left mb-6">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, reiciendis!
                </p>
                <div class="flex justify-center flex-wrap gap-6 ">
                    <button type="button" class="btn btn-purple">Bani na zurku</button>
                    <button type="button" class="btn btn-white">Get it on Firefox</button>
                </div>

            </div>  --}}

            {{-- Tabelarno resenje za slider --}}
            {{-- <table class="text-center w-100 bg-white mt-32">
                
                  <th colspan="2" class=" bg-bookmark-blue text-white"><div class="float-left text-xl pl-10 pt-2"><</div>Top 5 - Klubovi<div class="float-right text-xl pr-10 pt-2">></div> <br> Maj 2022 </th>
                </tr>
                <tr>
                    <td class="px-20"></td>
                    <td class="px-20"></td>
                </tr>
                <tr>
                  <td class="pl-10"><img src="{{ URL::to('/images/Klubovi/BOX.jpg') }}" alt="" class="object-scale-down h-16 mt-3 cursor-pointer pb-2"/></td>
                  <td>BOX</td>
                </tr>
                <tr>
                  <td class="pl-10"><img src="{{ URL::to('/images/Klubovi/BOX.jpg') }}" alt="" class="object-scale-down h-16 mt-3 cursor-pointer pb-2"/></td>
                  <td>BOX</td>
                </tr>
                <tr>
                  <td class="pl-10"><img src="{{ URL::to('/images/Klubovi/BOX.jpg') }}" alt="" class="object-scale-down h-16 mt-3 cursor-pointer pb-2"/></td>
                  <td>BOX</td>
                </tr>
                <tr>
                  <td class="pl-10"><img src="{{ URL::to('/images/Klubovi/BOX.jpg') }}" alt="" class="object-scale-down h-16 mt-3 cursor-pointer pb-2"/></td>
                  <td>BOX</td>
                </tr>
                <tr>
                  <td class="pl-10"><img src="{{ URL::to('/images/Klubovi/BOX.jpg') }}" alt="" class="object-scale-down h-16 mt-3 cursor-pointer pb-2"/></td>
                  <td>BOX</td>
                </tr>
                <tr>
                  <td class="pl-10"><img src="{{ URL::to('/images/Klubovi/BOX.jpg') }}" alt="" class="object-scale-down h-16 mt-3 cursor-pointer pb-2"/></td>
                  <td>BOX</td>
                </tr>
            </table> --}}



            {{-- <div class="flex justify-end bg-white">
                <div class="flex flex-row">
                    <div class="p-4"><</div>
                    <div class="">Top 5 - Klubovi</div>
                    <div class="p-4">></div>
                </div>
                
            </div> --}}



            <div class="flex-auto text-center container basis-1/2 mt-28 rounded shadow overflow-hidden bg-purple-800 pb-4 text-violet-200">
                <div class="flex text-center ">
                    <div class="flex-none w-14 h-14 pt-3">
                       <a href="#"><i class="fa-solid fa-angle-left text-2xl"></i></a> 
                    </div>
                    <div class="grow h-14 w-100 whitespace-nowrap overflow-hidden text-ellipsis">
                    Maj 2022 <br> Top 5 - Klubovi
                    </div>
                    <div class="flex-none w-14 h-14 pt-3">
                        <a href="#"><i class="fa-solid fa-angle-right text-2xl "></i></a>
                    </div>
                </div>


                @for ($i = 0; $i < 5; $i++)
                    <div class="flex text-center bg-bookmark-blue text-violet-200 hover:bg-bookmark-blue-hover cursor-pointer">
                        <div class="flex-none w-14 h-20 basis-1/5 ">
                            <img
                          class="object-scale-down h-32 mt-3 cursor-pointer pb-2 pl-3"
                          src="{{ asset('storage/images/Klubovi/Box.jpg') }}"
                          alt="logo"
                        />
                        </div>

                        <div class="flex-none w-14 h-14 basis-4/5 text-left pt-7 pl-2">
                            BOX
                        </div>
                    </div>
                @endfor
                
            </div>


        </div>
    </section>

    {{-- Neki Tekst --}}


    {{-- Footer --}}
    <footer class="p-4 bg-white mt-20 bg-bookmark-blue sm:p-6">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="#" class="flex items-center">
                    <img src="{{ URL::to('/images/EventsNisLogo1.png') }}" alt="" class="h-32 cursor-pointer"/>
                </a>
            </div>
            <div class="grid gap-8 pr-4 sm:gap-6">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="#" class="hover:underline">Events Niš™</a>. All Rights Reserved.
            </span>
            <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                </a>

            </div>
        </div>
    </footer>

</body>
</html>