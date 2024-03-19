<p>There would normally be a login page here. There is not one here so you can see what the admin screens look like</p>
<p>The date you put into these forms will not be added to the site</p>
<p>You will be redirected in <span id="num">5</span> seconds, if not click <span style="text-decoration:underline;color:blue;cursor:pointer;" onclick="redir()">here</span></p>
<script>
    var num = 5;
    const num_elm=document.getElementById("num");
    const interval = setInterval(function() {
        if(num == 0){
            window.location.replace("https://www.baileydawson.uk/portfolio/shop/admin/main.php");
        }else{
            num -=1;
            num_elm.innerHTML = num;
        }
    }, 1000);
    function redir(){
        window.location.replace("https://www.baileydawson.uk/portfolio/shop/admin/main.php");
    }
</script>