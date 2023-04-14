<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>SE7EN | Enhancement</title>
    <link rel="stylesheet" href="styles/style.css" >
  </head>
  <body>
    <?php include_once 'menu.inc';?>


    <div class="body-container">
      <h1 class="heading-pro enhancement-header">Enhancement Part 1</h1>
      <img src="images/x.png" class="x-img" id="x1" alt="X shape" >
      <img src="images/x.png" class="x-img" id="x2" alt="X shape" >
      <img src="images/x.png" class="x-img" id="x3" alt="X shape" >
      <img src="images/x.png" class="x-img" id="x4" alt="X shape" >
      <img src="images/x.png" class="x-img" id="x5" alt="X shape" >

      <img src="images/stop.png" class="stop-img" id="stop1" alt="Square shape">
      <img src="images/stop.png" class="stop-img" id="stop2" alt="Square shape">
      <img src="images/stop.png" class="stop-img" id="stop3" alt="Square shape">
      <img src="images/stop.png" class="stop-img" id="stop4" alt="Square shape">
      <img src="images/stop.png" class="stop-img" id="stop5" alt="Square shape">
      <img src="images/triangle.png" class="triangle-img" id="triangle1" alt="Triangle shape">
      <img src="images/triangle.png" class="triangle-img" id="triangle2" alt="Triangle shape">
      <img src="images/triangle.png" class="triangle-img" id="triangle3" alt="Triangle shape">
      <img src="images/triangle.png" class="triangle-img" id="triangle4" alt="Triangle shape">
      <img src="images/sparkle.png" class="sparkle-img" id="sparkle1" alt="Sparkle">
      <img src="images/sparkle.png" class="sparkle-img" id="sparkle2" alt="Sparkle">
      <img src="images/sparkle.png" class="sparkle-img" id="sparkle3" alt="Sparkle">
      <img src="images/sparkle.png" class="sparkle-img" id="sparkle4" alt="Sparkle">
      <img src="images/sparkle.png" class="sparkle-img" id="sparkle5" alt="Sparkle">
      <img src="images/sparkle.png" class="sparkle-img" id="sparkle6" alt="Sparkle">
      <img src="images/sparkle.png" class="sparkle-img" id="sparkle7" alt="Sparkle">
      <img src="images/record.png" class="record-img" id="record1" alt="Circle shape">
      <img src="images/record.png" class="record-img" id="record2" alt="Circle shape">
      <div class="item">
        <a href="product.php#val" class="enhancement-name"
          >Enhancement 1: Game Card</a
        >
        <div class="enhancement-text">
          <p>
            Using the <span>flex</span> and
            <span>justify-content</span> properties of the
            <span>.game-card</span> class enables greater flexibility over the
            game card's layout, resulting in a more visually pleasing design.
          </p>
          <p>
            The implement of <span>linear-gradient</span> background styles in
            the <span>#lol</span>, <span>#val</span>, and <span>#fifa</span> IDs
            results in a more dynamic and visually engaging background for each
            game card.
          </p>
          <p>
            The utilization of the <span>transform</span> property with
            <span>translateX(-50%)</span> in the
            <span>.game-card img</span> class adds a professional touch by
            horizontally centering the image within the game card.
          </p>
          <p>
            When hovering over the game card, the use of the
            <span>transition</span> property in both the
            <span>.game-card img</span> and
            <span>.game-card:hover.content</span> classes generates a seamless
            and elegant animation effect. The use of the
            <span>opacity</span> and <span>visibility</span> properties in the
            <span>.game-card.content</span> class generates a smooth, invisible
            overlay effect that emerges while hovering over the game card.
          </p>
          <p>
            Copyright &copy;:
            <a
              href="https://www.youtube.com/watch?v=MnMxRkX7DvU&pp=ygUTaG92ZXIgY3NzIGdhbWUgY2FyZA%3D%3D"
              >Hover Effects</a
            >
          </p>
        </div>
        <img id="img-2" src="images/img2.png" alt="Gaming Figure" >
      </div>
      <div class="item">
        <a href="index.php#home-header" class="enhancement-name"
          >Enhancement 2: Navigation Bar</a
        >
        <div class="enhancement-text">
          <p>
            The <span>position: sticky</span> property is used to keep the
            navbar fixed at the top of the page while scrolling, so enhancing
            the user experience by ensuring constant access to the navigation
            menu.
          </p>
          <p>
            The <span>transform: scale(1.1)</span> property is used in the
            <span>.navbar-li:hover</span> selector to slightly enlarge the
            navbar link when the mouse cursor is over it, providing the user
            with subtle visual feedback.
          </p>
          <p>
            These <span>:before</span> and <span>:after</span> pseudo-elements
            are utilized to generate the diagonal border effect while hovering
            over the navbar links. To produce the appearance, they are
            positioned absolutely and stylized with various border colors
          </p>
        </div>
      </div>
      <img id="img-1" src="images/img1.png" alt="Gaming Figure" >
      <div class="copyright-block">
        <p>
          Copyright &#169;:
          <a href="https://www.youtube.com/watch?v=qx7pSLjLNQA">Animation</a>
        </p>
      </div>
    </div>

    <a href="enhancements2.php" class="linkback" id="change">View Enhancements Assign 1 part 2</a>

    <?php include_once 'footer.inc';?>

  </body>
</html>
