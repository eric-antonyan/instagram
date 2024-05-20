<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Կապ մեզ հետ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="contact_us/assets/styles/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <nav>
        <a href="?page=general" class="navItems general">Գլխավոր</a>
        <a href="?page=about_us" class="navItems about_us">Մեր մասին</a>
        <a href="?page=contact_us" class="navItems contact__us">Կապ մեզ հետ</a>
    </nav>

    <section class="contact">
        <div class="container">
            <h2>Կապ մեզ հետ</h2>
            <div class="contact__wrapper">
                <div class="contact__form">
                    <h3>Ուղարկեք մեզ նամակ</h3>
                    <form action="../get-php/contact.php" method="post" enctype="multipart/form-data">
                        <div class="form__group">
                            <input id="name" type="text" name="name" placeholder="Ձեր անունը">
                        </div>
                        <div class="form__group">
                            <input id="email" type="email" name="email" placeholder="Ձեր Էլ․ հասցեն">
                        </div>
                        <div class="form__group">
                            <textarea id="message" name="message" placeholder="Ձեր հաղորդագրությունը (Պետք է պարունակկի 10 բառ կամ ավելին)"></textarea>
                        </div>
                        <div class="message">

                        </div>
                        <button id="submit" type="submit">Ուղարկել</button>
                    </form>
                </div>
                <div class="contact__info">
                    <h3>Մեր մասին</h3>
                    <p><i class="fas fa-phone"></i>+374 58 45 325</p>
                    <p><i class="fas fa-envelope"></i>something@gmail.com</p>
                    <p><i class="fas fa-map-marker-alt"></i>street 1 city New York</p>
                </div>
            </div>
        </div>
    </section>

    <script src="contact_us/assets/script.js"></script>
</body>

</html>