<!-- php code by IT20206482 D.G.B.M.H.K Basnayaka-->
<?php
session_start();
session_destroy();
?>
<html>

<style>
    h1{
        align-items: center;
        margin: 50px;
        font-family: 'Berlin Sans FB';
        color: yellow;
        text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
        font-size: 50px;">
    }
</style>
<h1>Logged Out!</h1>
<h2>You will be redirected in <span id="counter">5</span> second(s).</h2>
<script type="text/javascript">
function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=0) {
        location.href = '../html/home.html';
    }
    if (parseInt(i.innerHTML)!=0) {
        i.innerHTML = parseInt(i.innerHTML)-1;
    }
}
setInterval(function(){ countdown(); },1000);
</script>
</html>