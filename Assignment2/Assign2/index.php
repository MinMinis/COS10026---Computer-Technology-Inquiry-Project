<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>SE7EN | Home</title>
    <link rel="stylesheet" href="styles/style.css" >
  </head>
  <body>
    <div class="home-body">
      <div class="home-container">
        <header id="home-header">
          <!------------- NAVBAR -------------->
          <!-- NAVBAR -->
            <?php 
              include_once 'menu.inc';
            ?>
        </header>

        <!------------- CONTENT HOMEPAGE -------------->
        <div class="content-wrapper">
          <div class="content-desc">
            <!-- TITLE -->
            <h1 class="title">SE7EN</h1>

            <!-- DESCRIPTION -->
            <p class="description">
              Find your ally and prepare the most advanced equipment to<span>
                join </span
              >the battlefield. <br >
              <br >
              <span>Practice</span> and <span>Try Hard</span> in everyday, every
              game, eventually you will come out on top. The only easy day was
              yesterday. <br >
              <br >
              Copyright &copy;
              <a href="https://unsplash.com/photos/-8FjVl5OXfA"
                ><span>Background</span></a
              >,
              <a
                href="https://github.com/Almarex-Web-Dev/my-gaming-website/blob/master/images/cube2.png"
                ><span>Cube 1</span></a
              >,
              <a
                href="https://github.com/Almarex-Web-Dev/my-gaming-website/blob/master/images/cube3.png"
                ><span>Cube 2</span></a
              >
              and
              <a href="https://www.citypng.com/png-download/stock/5375"
                ><span>Character</span></a
              >
              image.
            </p>

            <!-- PRODUCT BUTTON -->
            <a class="btn2" href="product.php">
              Product
            </a>

            <!-- VIDEO BUTTON -->
            <a class="btn3" href="https://youtu.be/UJa-xS61quk">
              Watch Video
            </a>
          </div>

          <!-- CHARACTER IMAGE -->
          <div class="char"></div>
        </div>
      </div>

      <?php 
        include_once 'footer.inc';
      ?>
    </div>
  </body>
</html>
