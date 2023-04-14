<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Assignment 1 part 1">
    <meta name="author" content="Duc Thinh Pham">
    <meta
      name="keywords"
      content="COS10026, Assignment 1, Creating Web Applications"
   >
    <link rel="stylesheet" href="styles/style.css">
    <title>SE7EN | Product</title>
  </head>
  <body id="product">
    <!-- Navbar and Headings -->
    <?php 
      include_once 'menu.inc';
    ?>

    <h1 class="heading-pro">Game Products <br>"Get your games on!"</h1>
    <!--Game Cards-->
    <section class="game-list">
      <!-- League of Lengends info -->
      <div class="game-card" id="lol">
        <div class="content">
          <h2 class="product-h2">League of Legends</h2>
          <p>
            League of Legends is a multiplayer online battle arena game
            developed and published by Riot Games. Players assume the role of a
            "champion" with unique abilities and battle against a team of other
            players or computer-controlled champions. The game is played in a
            three-dimensional isometric perspective and features fast-paced
            gameplay, team-based strategy, and a wide range of champions to
            choose from. The objective of the game is to destroy the opposing
            team's "Nexus," a structure located at the heart of their base while
            defending your own Nexus.
          </p>
          <br>
          <p>
            Copyright &copy;
            <a
              href="https://www.pngitem.com/middle/iRhiwhJ_league-of-legends-yasuo-png-2-png/"
              >image source</a
            >
          </p>
          <a href="enquiry.html">Enquiry Now</a>
        </div>
        <img src="images/yasuo.png" alt="League of Legends">
      </div>

      <!-- Valorant info -->
      <div class="game-card" id="val">
        <div class="content">
          <h2 class="product-h2">Valorant</h2>
          <p>
            Valorant is a tactical FPS game developed by Riot Games. The game
            features two teams, the attackers and the defenders, battling it out
            in a round-based format. Each player chooses a unique agent with
            special abilities, such as teleportation or wall creation, to help
            their team achieve their objective. Valorant requires strategy,
            precise aim, and quick reflexes to outsmart and outgun the opposing
            team. With its intense gameplay and competitive scene, Valorant has
            become a popular choice for esports players and fans alike.
          </p>
          <br>
          <p>
            Copyright &copy;
            <a
              href="https://www.citypng.com/photo/6002/hd-jett-agent-valorant-character-png"
              >image source</a
            >
          </p>
          <a href="enquiry.html">Enquiry Now</a>
        </div>
        <img src="images/jett.png" alt="Valorant">
      </div>

      <!-- FIFA 23 info -->
      <div class="game-card" id="fifa">
        <div class="content">
          <h2 class="product-h2">EA SPORTS FIFA 23</h2>
          <p>
            FIFA 23 is a popular sports simulation game that allows players to
            control and manage their own football team. It features realistic
            graphics, authentic player and team data, and various gameplay modes
            such as career mode, ultimate team, and online multiplayer. The game
            also include_onces various leagues, tournaments, and international
            competitions from around the world.
          </p>
          <br>
          <p>
            Copyright &copy;
            <a
              href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fstore.steampowered.com%2Fapp%2F1811260%2FEA_SPORTS_FIFA_23%2F%3Fl%3Dvietnamese&psig=AOvVaw2ytx5Pe5bNV1lIXYV4UA4c&ust=1677257601168000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCJD1186NrP0CFQAAAAAdAAAAABAE"
              >image source</a
            >
          </p>
          <a href="enquiry.html">Enquiry Now</a>
        </div>
        <img src="images/fifa23.png" alt="League of Legends">
      </div>
    </section>

    <!-- Table of System Requirements -->
    <aside class="aside-table">
      <h2 class="aside-h2">System Requirements</h2>
      <br>
      <ol class="ol-games">
        <li><a href="product.html#lol">League of Legends</a></li>
        <li><a href="product.html#val">Valorant</a></li>
        <li><a href="product.html#fifa">EA SPORTS FIFA23</a></li>
      </ol>
      <br>
      <p>
        Without meeting the minimum system requirements, gamers may experience
        lag, slow performance, crashes, or other technical issues that can ruin
        the gaming experience.
      </p>
      <table class="sys-require-table">
        <tr>
          <th>Game</th>
          <th>Operating System</th>
          <th>CPU</th>
          <th>RAM</th>
          <th>GPU</th>
        </tr>
        <tr>
          <td>League of Legends</td>
          <td>Windows 7/8/10 or macOS</td>
          <td>3 GHz processor</td>
          <td>2 GB</td>
          <td>GeForce 8800 or Radeon HD 5670 or Intel HD Graphics 4000</td>
        </tr>
        <tr>
          <td>Valorant</td>
          <td>Windows 7/8/10</td>
          <td>Intel Core 2 Duo E8400</td>
          <td>4 GB</td>
          <td>NVIDIA GeForce GT 730 or Radeon R7 240</td>
        </tr>
        <tr>
          <td>EA SPORTS FIFA 23</td>
          <td>Windows 10</td>
          <td>AMD Phenom II X4 965 or Intel i3 6300T</td>
          <td>8 GB</td>
          <td>NVIDIA GTX 460 or Radeon R7</td>
        </tr>
      </table>
    </aside>

    <!----------------FOOTER SECTION--------------->

    <!----------------FOOTER SECTION--------------->
    <!-- TOP FOOTER -->
      <?php 
        include_once 'footer.inc';
      ?>
  </body>
</html>
