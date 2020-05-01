<?php $this->loadFragment("head"); ?>
<body>
<img style="border-radius: 10%;" class = "mb-4" src= "https://www.pngitem.com/pimgs/m/35-352596_crossed-swords-png-hd-transparent-crossed-swords-hd.png" alt="swordsIco" width="300" height="300" >
<h1>Arena</h1>
<input type="button" value="Cerrar sesion" name="close" onclick="logout()" >
    <script>
        function logout(){
            location.href='<?php echo URL; ?>logout';
        }
    </script>
</body>
</html>