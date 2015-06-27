<?php include_once "head.php";
?>

<body>
<?php if (!isset($_COOKIE["id_usuario"]) && !isset($_COOKIE["nombre_usuario"])) { ?>
        <div class="pure-g pure-g center">
            <div class="pure-u-1 login center">
                <div class="login-form-div center">
                <img src="img/logo.png" width="250">
                <h2 class="capi login-form-title"><!--<i class="fa fa-power-off"></i> Iniciar Sesión--></h2>
                <form class="pure-form center login-form" method="post" action="login.php">
                    <fieldset class="pure-group">
                        <input type="text" name="usuario" class="pure-input-1" placeholder="<?php echo _("User");?>" required>
                        <input type="password" name="contrasena" class="pure-input-1" placeholder="<?php echo _("Password"); ?>" required>
                    </fieldset>
    <?php if (isset($_GET['err'])) { ?>
                        <fieldset>
                            <span class="err"><?php echo _("Verify your information login!"); ?></span>
                        </fieldset>
    <?php } ?>

                    <button type="submit" class="pure-button pure-input-1 pure-button-primary" name="login"><?php echo _("Login"); ?></button>
                </form>
                </div>

            </div>
        </div>
    <?php } else {
        ?>

        <div id="layout" class="content pure-g">

            <?php include_once "menu.php"; ?>
            <?php include_once "templates.php"; ?>
            
            
            <div id="list" class="pure-u-1"></div>        
            <div id="main" class="pure-u-1">
                <div class="cita-content" id="main-content"></div>
            </div>

            </div>
        </div>
    <?php } ?>

    <?php include_once "footer.php"; ?>