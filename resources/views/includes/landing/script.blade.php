<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js') }}"></script>
<script src="{{ url('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js') }}" defer></script>
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.js') }}"
    integrity="sha512-UU0D/t+4/SgJpOeBYkY+lG16MaNF8aqmermRIz8dlmQhOlBnw6iQrnt4Ijty513WB3w+q4JO75IX03lDj6qQNA=="
    crossorigin="anonymous"></script>
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/dragscroll/0.0.8/dragscroll.min.js') }}"
    integrity="sha512-/ncZdOhQm5pgj5KHy720Ck7XF5RzYK6rtUsLNnGcitXrKT3wUYzTrPlOSG7SdL2kDzkuLEOFvrQRyllcZkeAlg=="
    crossorigin="anonymous"></script>
<script src="{{ asset('/js/toggleModal.js')}}""></script>
<script>
    $(document).ready(function() {
        $(".modal").on('click', ':not(.relative)', function (e) {
            e.stopPropagation();
        });
        $("#loginModal").on('click', function (e) {
            toggleModal('loginModal');
        });
        $("#registerModal").on('click', function (e) {
            toggleModal('registerModal');
        });
    });
</script>