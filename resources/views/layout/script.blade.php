<script src="{{asset('js/jquery-3.6.0.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
<?=
'<script>
    const rests = '.json_encode(@$rests).';
    const hostUrl = "'.secure_url('/').'";
</script>';
?>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset("js/client/classMap.js")}}"></script>
<script src="{{asset('js/client/map.js')}}"></script>
<script src="{{asset('js/client/const.js')}}"></script>
<script src="{{asset('js/client/rest.js')}}"></script>
<script src="{{asset('js/client/menu.js')}}"></script>
<script src="{{asset('js/client/plato.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnmDwzHSfJwE3w4HQC5YXkyVOnQxC6mHM&callback=initMap"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    console.log(myMap);
</script>