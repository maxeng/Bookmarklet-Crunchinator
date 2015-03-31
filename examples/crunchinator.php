<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>bookmarklet Crunchinator - PHP script to convert Javascript into bookmarklet links</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <a href="https://github.com/maxeng/Bookmarklet-Crunchinator">
        <img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/652c5b9acfaddf3a9c326fa6bde407b87f7be0f4/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6f72616e67655f6666373630302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_orange_ff7600.png">
    </a>

    <div class="container">
    <h1>bookmarklet Crunchinator</h1>
    <h2>PHP script to convert Javascript into bookmarklet links</h2>

    <?php 
        $post = isset( $_POST['code'] ) ? $_POST['code'] : '';
    ?>

    <hr/>
    <form role="form" method="post">
        <div class="form-group">
            <p>Enter Javascript text to crunch into a bookmarklet link</p>
            <textarea class="form-control" cols="80" rows="10" name="code"></textarea>
        </div>
        <button type="reset" class="btn">Clear</button>
        <button type="submit" class="btn btn-success">Crunch</button>
    </form>

    <?php if( $post ) { ?>

        <hr/>

        <?php
		include __DIR__ . '/src/BookmarkletGen.php'; // for php5.3+
        $book = new BookmarkletGen;
        $link = $book->crunch( $post );
        printf( '<p>Test your bookmarklet: <a href="%s">bookmarklet</a></p>', $link );
        ?>

    <?php } ?>
    
    </div>

</body>
</html>
