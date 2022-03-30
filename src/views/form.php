<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <form action="" method="post">
        <a href="/">home</a>
        <h1>Fill the recipe</h1>

        <div>
            <label for="title">Title</label><br>
            <input type="text" id="title" name="title"><br>
        </div>


        <label for="description">Description</label>
        <textarea id="description" name="description" placeholder="Your content"></textarea>
        </div>
        <button>Insérer</button>
        <?php if (!empty($errors)) : ?>
            <ul> <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
            </ul>
        <?php endforeach; ?>
    <?php endif; ?>
    </form>

</body>

</html>