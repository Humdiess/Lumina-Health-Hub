<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chat GPT Laravel | Code with Ross</title>
    <link rel="icon" href="https://assets.edlin.app/favicon/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @vite('resources/css/app.css')
    <!-- End JavaScript -->

    <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="./css/app.css">
    <!-- End CSS -->

</head>

<body class="font-sans">
    <div class="chat h-screen flex flex-col bg-gray-100">

        <!-- Header -->
        <div class="top-wrapper p-[1.3vw] bg-gray-100">
          <div class="top  p-[0.8vw] text-white flex items-center justify-center w-full bg-[#91FF7A] rounded-[0.7vw]">
            <img src="/assets/img/logo.svg" alt="Avatar"
                class="rounded-full w-[4vw] mr-4">
            <h1 class="text-[1.7vw] font-bold">Lumina AI</h1>
          </div>
        </div>
        <div class="disclaimer bg-red-500 p-[0.1VW] text-white flex items-center text-center justify-center 2-[6vw]">
                <small class="text-xs">Gunakan AI ini hanya untuk keperluan ILMU PENGETAHUAN, JANGAN DIGUNAKAN UNTUK KONSULTASI KESEHATAN</small>
        </div>
        <!-- End Header -->

        <!-- Chat -->
        <div class="messages overflow-auto flex-1 p-4 bg-gray-100 px-[3vw]">
            <div class="left message flex items-center mb-4 pb-[1vw]">
                <img src="/assets/img/logo.svg" alt="Avatar"
                    class="rounded-full w-12 h-12 mr-4">
                <p class="bg-white p-4 rounded shadow">Start chatting with Lumina Chat AI below!!</p>
            </div>
        </div>
        <!-- End Chat -->

        <!-- Footer -->
        <div class="bottoms bottom-0 fixed bg-gray-100 py-4 px-[5vw] w-full">
            <form class="flex" id="chatForm">
                <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off"
                    class="flex-1 p-2 border rounded">
                <button type="submit" class="bg-green-500 text-white p-2 ml-2 rounded">Send</button>
            </form>
        </div>
        <!-- End Footer -->

    </div>

    <script>
        // Broadcast messages
        $("form").submit(function (event) {
    event.preventDefault();

    //Stop empty messages
    if ($("form #message").val().trim() === '') {
      return;
    }

    //Disable form
    $("form #message").prop('disabled', true);
    $("form button").prop('disabled', true);

    $.ajax({
      url: "/chat",
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': "{{csrf_token()}}"
      },
      data: {
        "model": "gpt-3.5-turbo",
        "content": $("form #message").val()
      }
    }).done(function (res) {

      //Populate sending message
      $(".messages > .message").last().after('<div class="right message flex items-center my-[4vw] pb-[1vw] w-full justify-end pe-[1vw]">' +
        '<p class="bg-white p-4 rounded shadow">' + $("form #message").val() + '</p>' +
        '<img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" class="rounded-full w-12 h-12 ml-4" alt="Avatar">' +
        '</div>');

      //Populate receiving message
      $(".messages > .message").last().after('<div class="left message flex items-center my-[4vw] pb-[1vw]">' +
        '<img src="/assets/img/logo.svg" class="rounded-full w-12 h-12 mr-4" alt="Avatar">' +
        '<p class="bg-white p-4 rounded shadow">' + res + '</p>' +
        '</div>');

      //Cleanup
      $("form #message").val('');
      $(document).scrollTop($(document).height());

      //Enable form
      $("form #message").prop('disabled', false);
      $("form button").prop('disabled', false);
    });
  });
    </script>
</body>

</html>
