<html>
    <head>
        <title>Галлерея</title>
        <style>
            * {
                box-sizing: border-box;
            }
            .container {
                width: 1400px;
                margin: 0 auto;
            }
            .row {
               display: flex;
                /*justify-content: space-between;*/
                flex-wrap: wrap;
            }
            .grid-6 {
                display: flex;
                flex-basis: 700px;
                flex-wrap: wrap;

            }
            .big-img {
                width: 500px;
            }

            .img {
                max-width: 100%;
                /*flex-grow:1;*/
                border: 2px solid #949494;
                margin-bottom: 15px;
                margin-right: 10px;

            }
            .img img {
                max-width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Галлерея</h1>
                <div class="row">
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
