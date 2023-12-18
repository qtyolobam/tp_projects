<?php
// require_once "../includes/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../assets/fav.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performing Arts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


</head>

<style>
    .divide {
        display: flex;
    }

    body {
        background: url(../assets/bg.jpg);
        background-repeat: none;
        background-size: cover;
        background-attachment: fixed;

    }

    .container-manual {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;

    }

    .card {
        margin: 10px 10px;
        filter: drop-shadow(7px 7px 4px #000000);
    }

    h1 {
        text-align: center;
    }

    @media only screen and (max-width: 600px) {
        body {
            scroll-behavior: smooth;
        }

        .divide {
            display: flex;
            flex-direction: column;
            background-repeat: none;
            background-size: cover;
            background-attachment: fixed;
            text-align: center;
        }

        p {
            font-size: 15px;
        }

        .container-manual {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 20px 20px;
            border-radius: 10px;
        }

        input {
            width: 100%;
        }

        h1 {
            font-size: 45px;
        }

        input {
            padding: 6px 10px;
        }

        .form-label {
            font-size: 15px;
        }

        header {
            width: 100%;
        }

        a {
            text-align: left;
            /* float:left; */
        }

        .align {
            text-align: left;
        }
    }
</style>

<body>
    <div class="divide">
        <header>
            <?php

            if (!isset($_SESSION['ncploggedin']) && !isset($_SESSION['ccloggedin'])) {
                header("location:https://mithibaikshitij.com/");
                exit;
            }
            if (isset($_SESSION['ncploggedin'])) {
                include "../global/ncp_sidebar.php";
            }
            if (isset($_SESSION['ccloggedin'])) {
                include "../global/cc_sidebar.php";
            }
            ?>
        </header>

        <div class="container-manual">

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/Mashup Singing.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">MASHUP SINGING</h5>
                    <p class="card-text">Here is an event where we give the participants a chance to sing their favourite stanzas from their best-loved songs into one ultimate mashup!</p>

                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/Blended.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">BLENDED</h5>
                    <p class="card-text">Blended is a duo event like no other as the participants have to blend in their abilities of singing and dancing into a single performance /one of the participants will sing while the other dances to the tunes</p>

                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/Fashion Styling Event.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">FASHION</h5>
                    <p class="card-text">The participants have to put together three outfits for three different locations. </p>

                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/duo play.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">DUO PLAY</h5>
                    <p class="card-text">dynamic duo of some of the most abstract television characters shall be given to the participants, revolving around which they shall create a situational comedy. </p>

                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/Panache.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">PANACHE</h5>
                    <p class="card-text">This fashion event shall put to test not only the participants’ outfits but also their ramp walking skills</p>

                </div>

            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/rapping.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">RAPPING</h5>
                    <p class="card-text">Did watching gully boy ignite a spark in you? well then don't let it burn out. instead participate in this event and burn the stage!
                    </p>

                </div>

            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/Solo Singing.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">BOLLYWOOD SOLO SINGING</h5>
                    <p class="card-text">In this event we are giving a chance to children,who might not have studied music but can surely sing, by letting them perform a Bollywood song of their choice. </p>

                </div>

            </div>


            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/Classical Singing.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">CLASSICAL SINGING</h5>
                    <p class="card-text"> No matter where the music industry goes, it will always find its roots in the history of this land. so if you have an ear for Indian classical music then this event is just for you!</p>

                </div>

            </div>


            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/Western Duet Singing.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">WESTERN DUET SINGING</h5>
                    <p class="card-text">Can you and your partner intertwine with each other's tunes and create a western masterpiece? Then participate in our event and prove your worth!
                    </p>

                </div>

            </div>


            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/Mono Acting.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">MONO ACTING</h5>
                    <p class="card-text">Enacting multiple characters at the same time by the same person is unimaginable. but, if you are someone who can ace this mind blowing task, then this event is perfect for you!
                    </p>

                </div>

            </div>


            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/Classical dance.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">SOLO CLASSICAL DANCE</h5>
                    <p class="card-text">Here is an event for those who have kept Indian culture alive in themselves. so, if you are someone who takes pride in your land then what are you waiting for! register now!

                    </p>

                </div>

            </div>




            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/Western Solo Dance.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">WESTERN SOLO DANCE</h5>
                    <p class="card-text">Here is an event for all of those dance lovers out there that can mindlessly groove to any and every song. and if you consider yourself one of them then register now!
                    </p>

                </div>

            </div>


            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/Short Film Making.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">SHORT VIDEO CHOREOGRAPHY</h5>
                    <p class="card-text">does the tiktok world fascinate you? Do you picture yourself in the shoes of famous tiktok dancers? Well then this event gives you a chance to enhance your inner dance lover!

                    </p>

                </div>

            </div>

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/Street dance.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">STREET DANCE</h5>
                    <p class="card-text">Did watching the ABCD sequel make you and your team realise your worth? Well then welcome to this event where you get a chance to showcase your street dancing skills!

                    </p>

                </div>

            </div>

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/Hindi Band Event.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">HINDI BAND EVENT</h5>
                    <p class="card-text">Can you and your band intertwine with each other's tunes and create a hindi masterpiece? Then participate in our event and prove your worth!

                    </p>

                </div>

            </div>

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/BGD.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">BOLLYWOOD DANCE GROUP</h5>
                    <p class="card-text">Here is an event for all of those dance lovers out there that can mindlessly groove to any and every song. and if you consider yourself one of them then register now

                    </p>

                </div>

            </div>



        </div>
    </div>
</body>

</html>