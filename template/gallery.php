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
            .img {
                max-width: 32%;
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
                <?php foreach ($images as $num => $img) { ?>

                <div class="img">
                    <a href="image?file=<?php echo $num ?>">
                        <img src="img/tumbs/<?php echo 'tumb-' . $img->imgName; ?>">
                    </a>
                </div>

                <?php } ?>
            </div>

            <form action="postimg" method="post" enctype="multipart/form-data">
                <input type="file" name="newimage">
                <input type="submit" value="Загрузить">
            </form>
        </div>

    </body>
</html>
