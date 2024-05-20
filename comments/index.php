<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <nav class="navBar">
        <div class="logo">
            <h3>LOGO</h3>
        </div>
        <button id="openLoginWindowBtn" class="loginReg">LOGIN</button>
    </nav>
    <section class="comments">
        <div class="wrapper">
            <div class="comment">
                <div class="profileImg">
                    <img class="profileImage" src="https://images.unsplash.com/photo-1511367461989-f85a21fda167?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D" alt="">
                </div>
                <div class="commentText">
                    <p><b>Erik Antonyan</b></p>
                    <p>My first comment</p>
                    <div class="time">
                        7 hour ago
                    </div>
                </div>
            </div>
            <div class="comment">
                <div class="profileImg">
                    <img class="profileImage" src="https://images.unsplash.com/photo-1511367461989-f85a21fda167?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D" alt="">
                </div>
                <div class="commentText">
                    <p><b>Erik Antonyan</b></p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur velit minus, non tenetur laboriosam ratione fugiat maxime beatae necessitatibus quod nobis alias illum illo quidem recusandae debitis, cupiditate veniam aut. Hic natus sequi dolorem neque facere aliquid tempore sit. In excepturi harum quisquam porro minima quam ipsum praesentium, corporis aperiam tenetur impedit, provident veniam sint voluptas libero unde fugiat dolores, maiores deserunt itaque aspernatur sit. Consequuntur possimus voluptatum, quod, quos quasi exercitationem nisi magni labore excepturi mollitia explicabo in voluptate quis placeat ipsum nulla. Aut hic cupiditate ratione eligendi velit magni sunt incidunt enim excepturi nesciunt asperiores, architecto officia sapiente?</p>
                    <div class="time">
                        1 day ago
                    </div>
                </div>
            </div>
        </div>
        <div class="group">
            <form id="newComment">
                <input id="commentText" placeholder="Say something..." type="text">
                <button id="addComment">SEND</button>
            </form>
        </div>
    </section>
    <div class="loginWindow">
        <div id="closeLoginWindowBtn" class="close">
            <i class="fa fa-xmark"></i>
        </div>
        <div class="wrapper">
            <h1>Login</h1>
            <div class="form">
                <input placeholder="Enter your username" class="form-control" type="text">
                <input placeholder="Enter your password" class="form-control" type="pasword">
                <button class="button-control">Login</button>
                <button id="showCreateAccountWindowBtn" class="show-create__account__window__btn">Create new account</button>
            </div>
        </div>
    </div>
    <div class="registerWindow show">
        <div id="closeRegisterWindowBtn" class="close">
            <i class="fa fa-xmark"></i>
        </div>
        <div class="wrapper show">
            <h1>Create New Account</h1>
            <form method="post" enctype="multipart/form-data" action="get-php/actions.php?setuser" class="form">
                <div class="change-profile_container">
                    <div id="changeStartImage" class="change-profile__image">
                        <img class="img-cover" src="uploads/default_profile.avif" alt="">
                        <div class="change-profile-image__overlay">
                            <p><i class="fa fa-image"></i> change</p>
                        </div>
                        <input name="picture" id="changeImageForm" accept="image/png, image/jpg, image/jpeg, image/gif" type="file">
                    </div>
                </div>
                <input enctype="multipart/form-data" id="regUsername" name="reg_username" placeholder="Create username" class="form-control" type="text">
                <input id="regFname" name="reg_fname" placeholder="Eneter full name(First and Last name)" class="form-control" type="text">
                <input id="regPassword" name="reg_password" placeholder="Create password" class="form-control" type="password">
                <button id="register" class="button-control">Register</button>
                <button id="showAlreadyAccountWindowBtn" class="show-already_account__window__btn">Already account?</button>
            </form>
        </div>
    </div>

    <script src="app.js"></script>
</body>

</html>