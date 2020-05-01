<?php $this->loadFragment("head"); ?>
<body class="text-center">

  <form class="form-signin" method = "POST" action="<?php echo URL; ?>login">
  <img style="border-radius: 10%;
              position:static;"
    class = "mb-4" src= "https://www.pngitem.com/pimgs/m/35-352596_crossed-swords-png-hd-transparent-crossed-swords-hd.png" alt="swordsIco" width="300" height="300" >
    <h1 class="h2 mb-3 font-weight-normal" style= "color:white;" >Missions & Fusions:</h1>
    <h3 class="h3 mb-3 font-weight-normal" style= "color:white;"> Missifus RPG</h3>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">
      <label style= "color:white;">
        <input type="checkbox" value="remember-me" > Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in/Login</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
     <video autoplay muted loop style="
        position: fixed;
        z-index: -1;
        right:0;
        bottom:-80px;
        min-width: 100%;
        min-height: 100%;
      ">
        <source src=".\src\backgroundVideo1.mp4" type=video/mp4>
</video>   
  </form>
</body>
</html>