<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width minimum-scale=1.0 maximum-scale=1.0 user-scalable=no" />
        <title>My webpage</title>
        <link href="css/my-styles.css" rel="stylesheet" />
        <link href="js/mmenu.css" rel="stylesheet" />
    </head>
    <body>
        <div id="my-page">
            <div id="my-header">
                <a href="#my-menu">Open the menu</a>
                <nav id="my-menu">
                    <ul>
                        <li class="active"><a href="chat/handler.php?task=chat">chat</a></li>
                        <li><a href="chat/handler.php?task=contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div id="my-content">
                <h1>The title</h1>
                <p>Some content</p>
            </div>
        </div>

        <script src="path/to/mmenu.js"></script>
        <script>
            Mmenu.configs.classNames.selected = "active";
            Mmenu.configs.offCanvas.page.selector = "#my-page";

            document.addEventListener(
                "DOMContentLoaded", () => {
                    const menu = new Mmenu( "#my-menu", {
                        slidingSubmenus: false,
                        extensions: ["theme-dark"]
                    });
                }
            );
        </script>
    </body>
</html>