<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article test</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        .wid {
            padding: 0;
            margin: 0;
            width: 100vw;

            margin: 5rem 0rem

        }

        .widg {
            width: 50vw;
            margin: 0 auto;
        }



        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        :root {

            --orange: #FF7619;
            --white: #ffffff;
            --titre-1: #F6CB0C;
            --khaki: #DDD9B9;
            --titre-stat: 1.2rem
        }

        h1 {
            color: var(--titre-1);
        }

        .pied_page {
            height: 10rem;
            width: 70%;

        }

        .pied_nav {
            width: 90%;
            margin-inline: auto;
        }

        header {
            position: fixed;
            z-index: 1;
            right: 0;
            left: 0;
        }

        footer {
            height: 13rem;
        }

        .logo_pied {
            position: relative;
            top: 1.75rem;
            right: 30rem;
        }

        .logo_pied img {
            height: 5rem;
        }

        footer .media_sociaux {
            position: relative;
            top: 3.5rem;
            left: 35rem;
        }

        .progress-container {
            width: 100%;
            height: 2px;
            background-color: black;
        }

        .progress-bar {
            height: 2px;
            background: var(--titre-1);
            width: 0%;
        }

        .welcom_title {
            height: 80vh;
            background-image: url(../../public/images/giraffe.jpeg);
            background-size: cover;
            position: relative;
            background-repeat: no-repeat;
            background-position: 0 -11.7rem;
            box-shadow: 0 0 5px 0px #333;

        }

        .welcom_title>h1 {
            position: absolute;
            bottom: 3rem;
            left: 2rem
        }

        .mouse {
            display: block;
            margin: 0 auto;
            width: 26px;
            height: 46px;
            border-radius: 13px;
            border: 2px solid #F6CB0C;
            bottom: 40px;
            position: absolute;
            left: 50%;
            margin-left: -14px;

        }

        .div_article_img {
            position: relative;
            left: 10rem;

        }

        .secteur {
            position: relative;
            left: -8rem;
        }

        .div_article_img>img {
            position: absolute;
            right: 4rem;
            top: 1.5rem
        }

        .bande_stat {
            background-color: var(--orange);
        }

        .bande_secteur {
            background: linear-gradient(-45deg, #dfd692, #fcb346, #f7d691, #dff60c);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .ville_bande {
            background: linear-gradient(-45deg, #FF7619, #e73c7e, #23a6d5, #F6CB0C);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        .bandeau_ville {
            display: grid;
            width: 80%;
            padding: 5rem;
            color: var(--white);
            margin-inline: auto;
        }

        .div_article_img {
            transition: 0.2s;
            transform: translateX(1rem);
        }


        .stats,
        .secteur {
            width: 80%;
            display: grid;
            margin-inline: auto;
            grid-template-columns: auto auto auto auto auto;
            padding: 10px;
        }

        .secteur {
            width: 40%;
        }

        .chiffres {
            border-right: 0.2rem solid var(--white);
            padding: 20px;
            font-size: var(--titre-stat);
            text-align: center;
            color: var(--white);
            text-align: center;
        }

        .secteur_item {

            padding: 20px;
            font-size: var(--titre-stat);
            text-align: center;
            color: black;
            text-align: center;
        }

        .chiffres:last-child {
            border: none;
        }

        .action {
            display: grid;
            grid-template-columns: auto auto;
            width: 50%;
            margin-inline: auto;
            gap: 1rem;
        }

        .action_item {
            margin-inline: auto;
            border: 0.2rem solid #DDD9B9;
            padding: 2rem;
            width: 95%;
        }

        .action_item>svg {
            width: 10rem;

        }

        #Calque_1 {
            fill: var(--titre-1);
            margin-inline: auto;
        }

        .ville {
            padding: 2rem;
            border: #DDD9B9 solid 0.1rem;
            width: 20%;
        }

        .implantation_item>img {
            width: 40rem
        }

        .ville {
            margin-inline: auto;
            border: 0.2rem solid #DDD9B9;
            padding: 2rem;
            width: 95%;
        }

        .implantation_titre {
            width: 80%;
            margin-inline: auto;
            padding-inline: 10rem;

        }

        .actu_article {
            margin-inline: auto;
            width: 50%;
        }

        .absent {
            opacity: 0;
            transition: all 1s;
            filter: blur(1px);
            transform: translateY(20%);
        }

        .show {
            opacity: 1;
            filter: blur(0);
            transform: translateY(0);

        }

        .article {
            width: 90%;
            margin-inline: 1rem;
            border: 0.2rem solid var(--orange);
            border-radius: 1rem;
            padding: 1rem;
            background-color: var(--white);
        }

        .actualite {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            padding-block: 2rem;
            background-color: var(--khaki);
        }

        .newsletter {
            margin: 2rem;
        }

        .titre_actualite {
            background-image: url(../../public/images/lion.jpg);
            background-position: center;
            background-size: cover;
            height: 15rem;
            padding: 10rem;

        }

        .pagination {
            margin-inline: auto;
            width: 15%;
        }

        @keyframes scroll {
            0% {
                transform: translateY(0%);
            }

            100% {
                transform: translate(100%);
            }
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* .carte{
   
    </style>
</head>

<body>


    <!-- <div class="widg"> -->
    <div class="wid">
        <div class="widg">

            <?php
            echo $post;
            ?>
        </div>

    </div>
</body>

</html>
