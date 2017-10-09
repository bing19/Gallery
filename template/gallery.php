<html>
    <head>
        <title>Галлерея</title>
        <style>
            * {
                box-sizing: border-box;
            }
            .container {
                width: 90%;
                margin: 0 auto;
            }
            .row {
               display: block;
                /*justify-content: space-between;*/
                flex-wrap: wrap;
                flex-direction: column;
            }
            .grid-6 {
                display:flex;
                margin-bottom: 20px;
                flex-wrap: wrap;
            }
            .big-img {
                width:100%;
                text-align: center;
            }

            .img {
                /*flex-grow:1;*/
                border: 2px solid #949494;
                margin-bottom: 15px;
                margin-right: 10px;
                width: 10%;
                flex-basis: 110px;

            }
            img {
                max-width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Галлерея</h1>

                    <div class="grid-6"><?php foreach ($images as $num => $img) { ?>

                            <div class="img">
                                <a href="image?file=<?php echo $num ?>">
                                    <img src="img/tumbs/<?php echo 'tumb-' . $img->imgName; ?>">
                                </a>
                            </div>

                        <?php } ?></div>
                    <div class="grid-6">
                        <div class="big-img" id="big"></div>
                    </div>



            <form action="postimg" method="post" enctype="multipart/form-data">
                <input type="file" name="newimage">
                <input type="submit" value="Загрузить">
            </form>
        </div>
        <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>
        <script
            src="js/main.js"></script>
    </body>
</html>
