<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chat GPT Laravel | Code with Ross</title>
  <link rel="icon" href="https://assets.edlin.app/favicon/favicon.ico"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <!-- End JavaScript -->

  <!-- CSS -->
  <link rel="stylesheet" href="/style.css">
  <!-- End CSS -->
  {{-- <link rel="stylesheet" href="./css/app.css"> --}}
  {{-- @vite('resources/css/app.css') --}}
  <title>Document</title>
  {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>

<body style="margin: 0; padding: 0;">
<div class="chat h-screen">

  <!-- Header -->
  <div class="flex fixed bg-[#1a1a1a] w-full px-[4vw] py-[1vw] mt-0 top-0" style="display: flex; align-items: center; position: fixed; top-0; right: 0; left: 0; z-index: 999; box-shadow: 0px 0px 17.9px 0px rgba(0, 0, 0, 0.25);">
    <img src="https://picsum.photos/200" class="w-[4vw] h-[4vw] rounded-full" style="border-radius: 22vw; " alt="Avatar">
    <div>
      <p>Masyhudi Affandi</p>
      <small>Online</small>
    </div>
  </div>
  <!-- End Header -->

  <!-- Chat -->
  <div class="messages mt-[8vw] ms-[6vw]">
    <div class="left message flex items-center gap-[2vw]">
      <img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" class="rounded-full w-[4vw]" alt="Avatar">
      <p class="bg-white px-[1vw] py-[1vw] rounded-[2vw] text-[black]">Start chatting with Chat GPT AI below!!</p>
    </div>
  </div>
  <!-- End Chat -->

  <!-- Footer -->
  <div class="bottom" style="position: fixed; bottom: 0; left: 0; right: 0;">
    <form class="w-full">
      <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off" class="w-[94vw]">
      <button type="submit"></button>
    </form>
  </div>
  <!-- End Footer -->

</div>
</body>

<script>
  //Broadcast messages
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
      $(".messages > .message").last().after('<div class="right message">' +
        '<p>' + $("form #message").val() + '</p>' +
        '<img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">' +
        '</div>');

      //Populate receiving message
      $(".messages > .message").last().after('<div class="left message">' +
        '<img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">' +
        '<p>' + res + '</p>' +
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
</html>
