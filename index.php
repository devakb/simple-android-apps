<?php



    function bytesToSize($bytes) {
        $units = ['byte', 'KB', 'MB', 'GB', 'TB'];
    
        $unit = floor(log($bytes, 1024));
    
        return number_format($bytes / 1024 ** $unit, 2) . ' ' . $units[$unit];
    }

    $files = glob(__DIR__ . '/apks/*.apk');

    $apps = [];

    foreach ($files as $file) {

        if (is_file($file)) {
            $fileName = basename($file);
            $fileSize = filesize($file);


            $apps[] = [
                'name' => ucwords(pathinfo($fileName, PATHINFO_FILENAME)),
                'size' => bytesToSize($fileSize),
                'file_name' => $fileName,
                'icon' => './apks/icons/' . pathinfo($fileName, PATHINFO_FILENAME) . '.png',
            ];
        }

    }
    
?>  




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Android Apps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="./css/style.min.css">
</head>
<body>

    <nav class="navbar bg-light py-3 shadow">
        <div class="container">
            <a class="navbar-brand" href="#" class="d-inline-flex align-items-center">
                <img src="./india-flag-icon.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top me-2">
                Simple Android Apps - India
            </a>
        </div>
    </nav>

    <div class="container mt-5">

        <div class="row">
            <?php foreach($apps as $app): ?>
            <div class="col-md-4">
                <div class="card sm-apps-card">
                    <div class="card-body d-flex">
                        <img src="<?= $app['icon'] ?>" class="card-img" alt="">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <div>
                            <h4><?= $app['name'] ?></h4>
                            <h6>Size: <?= $app['size'] ?></h6>

                            <a href="./apks/<?= $app['file_name'] ?>" class="mt-2 btn btn-primary rounded-full">Download</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>



        <footer class="mt-5 text-muted d-flex justify-content-between">
            <div>
                <h6>Developer Contact</h6>
                <p class="m-0">Amit Kumar Biswas</p>
                <p class="m-0">akbdeveloper01@gmail.com</p>
                <p class="m-0">West Bengal, India</p>
            </div>

            <div>
                <p class="text-muted">Made with ❤️ in INDIA</p>
            </div>
        </footer>

    </div>

</body>
</html>