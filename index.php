<?php
session_start();
$nik=$_SESSION['nik'];
$nama=$_SESSION['nama'];

$page=@$_GET['page'];
if(!empty($_SESSION['nik'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bs/css/bootstrap.cs">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="data_table/datatable.css">
    <link rel="icon" type="image/x-icon" href="math.png">
    <title>Calculator Scientific Indonesia</title>
</head>

<body>

    <div class="container">
        <div class="display">
            <input id="screen" type="text" placeholder="0">
        </div>

        <div class="btns">
            <div class="row">
                <button id="ce" onclick="backspc()">CE</button>
                <button onclick="fact()">x!</button>
                <button class="btn">(</button>
                <button class="btn">)</button>
                <button class="btn">%</button>
                <button id="ac" onclick="screen.value=''">AC</button>
            </div>

            <div class="row">
                <button onclick="sin()">sin</button>
                <button onclick="pi()">π</button>
                <button class="btn">7</button>
                <button class="btn">8</button>
                <button class="btn">9</button>
                <button class="btn">÷</button>
            </div>

            <div class="row">
                <button onclick="cos()">cos</button>
                <button onclick="log()">log</button>
                <button class="btn">4</button>
                <button class="btn">5</button>
                <button class="btn">6</button>
                <button class="btn">×</button>
            </div>

            <div class="row">
                <button onclick="tan()">tan</button>
                <button onclick="sqrt()">√</button>
                <button class="btn">1</button>
                <button class="btn">2</button>
                <button class="btn">3</button>
                <button class="btn">-</button>
            </div>

            <div class="row">
                <button onclick="e()">e</button>
                <button onclick="pow()">x <span style="position: relative; bottom: .4em; right: .1em;">y</span>
                </button>
                <button class="btn">0</button>
                <button class="btn">.</button>
                <button id="eval" onclick="screen.value=eval(screen.value)">=</button>
                <button class="btn">+</button>
            </div>
            <?php include"navigasi.php"; ?>
            <?php 
                if ($page=='calculator'){
                    include"calculator.php";
                }
                    elseif($page=='logout'){
                        unset($_SESSION['nik']);
                        unset($_SESSION['nama']);
                        header("location:login.php");
                    }
                ?>
        </div>
    </div>
</body>
<script>
    var screen = document.querySelector('#screen');
    var btn = document.querySelectorAll('.btn');

    /*============ For getting the value of btn, Here we use for loop ============*/
    for (item of btn) {
        item.addEventListener('click', (e) => {
            btntext = e.target.innerText;

            if (btntext == '×') {
                btntext = '*';
            }

            if (btntext == '÷') {
                btntext = '/';
            }
            screen.value += btntext;
        });
    }

    function sin() {
        screen.value = Math.sin(screen.value);
    }

    function cos() {
        screen.value = Math.cos(screen.value);
    }

    function tan() {
        screen.value = Math.tan(screen.value);
    }

    function pow() {
        screen.value = Math.pow(screen.value, 2);
    }

    function sqrt() {
        screen.value = Math.sqrt(screen.value, 2);
    }

    function log() {
        screen.value = Math.log(screen.value);
    }

    function pi() {
        screen.value = 3.14159265359;
    }

    function e() {
        screen.value = 2.71828182846;
    }

    function fact() {
        var i, num, f;
        f = 1
        num = screen.value;
        for (i = 1; i <= num; i++) {
            f = f * i;
        }

        i = i - 1;

        screen.value = f;
    }

    function backspc() {
        screen.value = screen.value.substr(0, screen.value.length - 1);
    }
</script>

</html>
<?php
}
else{
    header("location:login.php");
}
?>