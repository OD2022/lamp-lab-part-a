<!DOCTYPE html>
<html>
  <head>
    <title>Green Screen Forest</title>
    <script src="5-script.js"></script>
  </head>
  <style>

* {
  font-family: Arial, Helvetica, sans-serif;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  
}

body {
  padding: 10px;
  margin: 0;
  background: black;
}

/* (B) BOOKS */
#books {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  grid-gap: 20px;
}

.bookWrap {
  border: 1px solid #dbdbdb;
  background: #fff;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  transition: transform 0.3s;
}

.bookWrap:hover {
  transform: scale(1.05);
}

.bookImg {
  display: block;
  width: 100%;
}

.bookTitle,
.bookDesc {
  padding: 10px;
  text-align: justify;
}

.bookTitle {
  font-weight: 700;
  font-size: 16px;
  color: #333;
}

.bookDesc {
  padding-top: 0;
  font-size: 14px;
  color: #848484;
}

/* Responsive adjustments */
@media only screen and (max-width: 600px) {
  #books {
    grid-template-columns: 1fr;
  }
}

/* (C) NAVIGATION BAR */
nav {
  background: black;
  padding: 10px 0;
  margin-bottom: 2em; /* Added margin beneath the nav bar */
}

ul {
  list-style-type: none;
  display: flex;
  justify-content: space-between;
  margin: 0;
  padding: 0;
}

li {
  display: inline;
}

a {
  text-decoration: none;
  color: white;
  font-weight: bold;
  position: relative;
}

a::after {
  content: '';
  display: block;
  width: 0;
  height: 2px;
  background: white;
  position: absolute;
  bottom: -5px;
  transition: width 0.3s ease;
}

a:hover::after {
  width: 100%;
}

/* (D) BORROW BUTTON */
.borrowBtn {
  display: block;
  margin: 2em auto; 
  width: 80%; 
  padding: 2em;
  border: none;
  border-radius: 0.5em;
  background-color: #50C878;
  color: #fff;
  cursor: pointer;
  transition: background-color 0.3s;
}

.borrowBtn:hover {
  background-color: #009900; 
}

.otherDetails{
  color: green;
  font-size: 0.7em;
  text-align: justify;
  padding: 10px;
}

  </style>
  <body>
    <nav>
    <ul>
    <li><a href="./dashboard.php">Home</a></li>
        <li><a href="./login.php">Login</a></li>
        <li><a href="./pitchMovie.php">Pitch Movie</a></li>
        <li><a href="./sign_up.php">Sign Up</a></li>
        <li><a href="./logout.php">Log Out</a></li>
    </ul>
    </nav>
    <!-- (B) BOOKS LIST -->
    <div id="books"><?php
      require "2-movies.php";
      foreach ($movies as $p) { ?>
      <div class="bookWrap" data-id="<?=$p["id"]?>">
        <img class="bookImg" src="movie_posters/<?=$p["id"]?>.jpg">
        <div class="bookTitle"><?=$p["working_title"]?></div>
        <div class="bookDesc"><?=$p["storyline"]?></div>
        <div class="otherDetails">Themes: <?=$p["themes"]?></div>
        <div class="otherDetails">Budget: $<?=$p["budget_range"]?></div>
        <div class="otherDetails">Estimated Production Time: <?=$p["production-time"]?></div>
        <button class="borrowBtn">Fund Film</button>
      </div>
      <?php }
    ?></div>
  </body>
</html>
